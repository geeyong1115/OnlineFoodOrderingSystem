<?php

/**
 * @author YapYoonEn
 */

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;

class MenuController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        include(app_path() . '/Http/QRSecurityClass/QRExpired.php');
        include(app_path() . '/Http/XML/OrderXMLGenerator.php');
        return view('menu.start');
    }

    public function menu_di() {
        session(['method' => 'di']);
        include(app_path() . '/Http/XML/FoodXMLGenerator.php');
        $o = session()->get('orderId');
        $cart = session()->get($o);
        if ($cart == null) {
            $cart = [];
        }
        $xml = simplexml_load_file(storage_path().'/app/foodBeverage.xml');
        $food_beverages = $xml->xpath('/foodbeverages/foodbeverage[status="Available"]');
        
        return view('menu.view')->with('food_beverages', $food_beverages)->with($o, $cart);
    }

    public function menu_ta() {
        session(['method' => 'ta']);
        include(app_path() . '/Http/XML/createOrderXML.php');
        $o = session()->get('orderId');
        $cart = session()->get($o);
        if ($cart == null) {
            $cart = [];
        }
        $xml = simplexml_load_file(storage_path().'/app/foodBeverage.xml');
        $food_beverages = $xml->xpath('/foodbeverages/foodbeverage[status="Available"]');

        return view('menu.view')->with('food_beverages', $food_beverages)->with($o, $cart);
    }

    public function cart() {
        return view('cart.view');
    }

    public function addToCart($id) {
        $xml = simplexml_load_file(storage_path().'/app/foodBeverage.xml');
        $food_beverages = $xml->xpath('/foodbeverages/foodbeverage[id="'.$id.'"]');
        foreach($food_beverages as $f){
            $name = $f->name;
            $price = $f->price;
        }
        $o = session()->get('orderId');
        $cart = session()->get($o);
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => "$name",
                    "quantity" => 1,
                    "price" => "$price"
                ]
            ];
            session()->put($o, $cart);

            return redirect()->back();
        }

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put($o, $cart);
            return redirect()->back();
        }
        
        $cart[$id] = [
            "name" => "$name",
            "quantity" => 1,
            "price" => "$price"
        ];
        session()->put($o, $cart);
        return redirect()->back();
    }

    public function decrease($id) {
        $o = session()->get('orderId');
        $cart = session()->get($o);
        if ($cart[$id]["quantity"] == 1) {
            unset($cart[$id]);
        } else
            $cart[$id]["quantity"]--;
        session()->put($o, $cart);
        return redirect()->back();
    }

    public function increase($id) {
        $o = session()->get('orderId');
        $cart = session()->get($o);
        $cart[$id]["quantity"]++;
        session()->put($o, $cart);
        return redirect()->back();
    }

    public function remove($id) {
        $o = session()->get('orderId');
        $cart = session()->get($o);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put($o, $cart);
        }
        return redirect()->back();
    }

    public function placeOrder($price) {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $method = session()->get('method');
        $t = session()->get('tableNo');
        $o = session()->get('orderId');
        $updateTotal = 0;
        $cart = session()->get($o);
        foreach ($cart as $id => $details) {
            $orderdetails = new OrderDetails();
            $orderdetails->order_id = $o;
            $orderdetails->food_id = $id;
            $orderdetails->quantity = $details['quantity'];
            $subtotal = $details['price'] * $details['quantity'];
            $orderdetails->price = $subtotal;
            $updateTotal += $subtotal;
            $orderdetails->created_at = date('d-m-Y H:i:s');
            $orderdetails->updated_at = date('d-m-Y H:i:s');
            $orderdetails->save();
        }
        if (!Order::find($o)) {
            $order = new Order();
            $order->id = $o;
            $order->total_price = $price;
            if ($method == "di") {
                $order->table_no = $t;
            }
            $order->status = 0;
            $order->created_at = date('d-m-Y H:i:s');
            $order->updated_at = date('d-m-Y H:i:s');
            $order->save();
        } else {
            $update = Order::find($o);
            $update->total_price += $updateTotal;
            $update->updated_at = date('d-m-Y H:i:s');
            $update->save();
        }
        session()->forget($o);
        include(app_path() . '/Http/XML/OrderXMLGenerator.php');
        return redirect('bill');
    }

    public function bill() {
        session()->forget('billname');
        $billname = [];
        $xml = simplexml_load_file(storage_path().'/app/foodBeverage.xml');
        $o = session()->get('orderId');
        $order = Order::where('id', $o)->value('table_no');
        include(app_path() . '/Http/StrategyDesignPattern/TotalPriceContext.php');
        if (Order::find($o)) {
            $bill = Order::find($o)->details;
                $i = 0;
            foreach($bill as $b){
                $id = $b->food_id;
                $food_beverages = $xml->xpath('/foodbeverages/foodbeverage[id="'.$id.'"]');
                foreach($food_beverages as $f){
                    $name = $f->name;
                    $billname[$i] = "$name";
                    session()->put('billname', $billname);
                    $i++;
                }
            }
            return view('bill.view')->with('bill', $bill)->with('order', $order)->with('billname', $billname);
        } else {
            return view('bill.view');
        }
    }

    public function invalid() {
        return view('menu.invalid');
    }
    
    public function rest1() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (Order::find($id)) {
                $post_arr = array();
                $order = Order::find($id);
                $post_item = array(
                    'id' => $id,
                    'total_price' => $order->total_price,
                    'table_no' => $order->table_no,
                    'status' => $order->status,
                    'created_at' => $order->created_at,
                    'updated_at' => $order->updated_at
                );
                array_push($post_arr, $post_item);
                echo json_encode($post_arr);
            } else {
                echo json_encode(
                        array('message' => 'No Record Found.')
                );
            }
        } else {
            echo json_encode(
                    array('message' => 'No Record Found.')
            );
        }
    }

    public function rest2() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (Order::find($id)) {
                $post_arr = array();
                $order = Order::find($id)->details;
                foreach ($order as $o) {
                    $post_item = array(
                        'id' => $o->id,
                        'order_id' => $id,
                        'food_id' => $o->food_id,
                        'quantity' => $o->quantity,
                        'price' => $o->price,
                        'created_at' => $o->created_at,
                        'updated_at' => $o->updated_at
                    );
                    array_push($post_arr, $post_item);
                }
                echo json_encode($post_arr);
            } else {
                echo json_encode(
                        array('message' => 'No Record Found.')
                );
            }
        } else {
            echo json_encode(
                    array('message' => 'No Record Found.')
            );
        }
    }

}

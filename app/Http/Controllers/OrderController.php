<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Models\OrderDetails;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('status','0')->get();
        return view('orders.index',compact('orders'));
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $order_details =DB::connection('mysql2')->table('order_details')
                ->join('onlinefoodorderingsystem.food_beverages as fb', 'order_details.food_id', '=', 'fb.id')
                ->join('orders', 'order_details.order_id', '=', 'orders.id')
                ->select('orders.status','fb.name','order_details.quantity','order_details.price')
                ->where('order_details.order_id','=',$id)
                ->get();
        
        return view('orders.view',compact('order_details'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('orders.show',compact('order'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $orders = Order::find($id);
       $orders->status = $request->input('order_status');
       $orders->update();
       
       return redirect('orders')->with('status','Order Updated Successfully');
    }

    public function orderHistory(){
        $orders = Order::where('status','1')
       
        ->get();
        return view('orders.order_history',compact('orders'));
    }
}
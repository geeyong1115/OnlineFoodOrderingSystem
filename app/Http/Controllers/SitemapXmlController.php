<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\FoodBeverages;
use Illuminate\Support\Facades\DB;

class SitemapXmlController extends Controller
{
    public function xml_foodBeverages() {
        $foodBeverages = FoodBeverages::all();
        return response()->view('xml.foodBeverages', [
            'foodBeverages' => $foodBeverages
        ])->header('Content-Type', 'text/xml');
      }

      public function xml_orderDetails() {

        $order_details =DB::connection('mysql2')->table('order_details')
        ->join('onlinefoodorderingsystem.food_beverages as fb', 'order_details.food_id', '=', 'fb.id')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->get();

        return response()->view('xml.orderDetails', [
            'order_details' => $order_details
        ])->header('Content-Type', 'text/xml');
      }
    
}
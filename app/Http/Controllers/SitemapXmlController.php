<?php

namespace App\Http\Controllers;

use App\Models\FoodBeverage;

class SitemapXmlController extends Controller
{
    public function index() {
        $foodBeverages = FoodBeverage::all();
        return response()->view('xml.foodBeverages', [
            'foodBeverages' => $foodBeverages
        ])->header('Content-Type', 'text/xml');
      }

    
}
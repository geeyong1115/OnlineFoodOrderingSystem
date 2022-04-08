<?php

namespace App\Http\Controllers;

use App\Models\FoodBeverages;
use Illuminate\Http\Request;

class FoodBeverageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodBeverages = FoodBeverages::latest()->paginate(5);
    
        return view('foodBeverages.index',compact('foodBeverages'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foodBeverages.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'desc' => 'required',
            'instock_qty' => 'required',
            'status' => 'required',
        ]);
        FoodBeverages::create($request->all());
     
        return redirect()->route('foodBeverages.index')
                        ->with('success','Food and Beverages created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodBeverages  $foodBeverage
     * @return \Illuminate\Http\Response
     */
    public function show(FoodBeverages $foodBeverage)
    {
        return view('foodBeverages.show',compact('foodBeverage'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodBeverages  $foodBeverage
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodBeverages $foodBeverage)
    {
        return view('foodBeverages.edit',compact('foodBeverage'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoodBeverages  $foodBeverage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodBeverages $foodBeverage)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'desc' => 'required',
            'instock_qty' => 'required',
            'status' => 'required',
        ]);
    
        $foodBeverage->update($request->all());
    
        return redirect()->route('foodBeverages.index')
                        ->with('success','Food and beverage updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodBeverages  $foodBeverage
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodBeverages $foodBeverage)
    {
        $foodBeverage->delete();
    
        return redirect()->route('foodBeverages.index')
                        ->with('success','Food and beverage deleted successfully');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodBeverages;

class FoodBeverageAPIController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $foodBeverages = FoodBeverages::all();

        return response()->json($foodBeverages);
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
        return FoodBeverages::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodBeverages  $foodBeverage
     * @return \Illuminate\Http\Response
     */
    public function find($id)
    {
        $foodBeverage = FoodBeverages::find($id);
        return response()->json($foodBeverage);
    }
    public function findByName($name)
    {
        return FoodBeverages::where('name','like','%'.$name)->get();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodBeverages  $foodBeverage
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req, $id)
    {

        $foodBeverage = FoodBeverages::find($id);
        $foodBeverage->update($req->all());
        return $foodBeverage;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoodBeverages  $foodBeverage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $foodBeverage = FoodBeverages::find($id);

        $foodBeverage->update($request->all());
        return $foodBeverage;
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodBeverages  $foodBeverage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foodBeverage = FoodBeverages::destroy($id);

        return response()->json($foodBeverage);

    }
}
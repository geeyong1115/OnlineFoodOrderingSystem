<?php

namespace App\Models;

use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Model;

class FoodBeverage extends Model
{

    protected $fillable = [
        'name', 'price','instock_qty','status','desc'
    ];

    public function foodDetails(){
        return $this->belongsTo('App\Model\OrderDetails');

    }
}
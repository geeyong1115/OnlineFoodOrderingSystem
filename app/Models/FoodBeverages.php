<?php

namespace App\Models;

use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Model;

class FoodBeverages extends Model
{

    protected $fillable = [
        'name', 'price','instock_qty','status','desc'
    ];

    public function foodDetails(){
        return $this->belongsTo('App\Model\OrderDetails');

    }
}
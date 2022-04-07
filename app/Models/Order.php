<?php

namespace App\Models;

use App\Models\FoodBeverage;
use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'status',
    ];

    public function orderfoods()
    {
        return $this->morphTo();
    }

    public function orderdetails(){
        return $this->hasMany(OrderDetails::class,'order_id');
    }

    public function foodBeverages(){
        return $this->hasMany(FoodBeverage::class,'food_id');
    }
}
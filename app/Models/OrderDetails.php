<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    //
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
        'order_id',
        'food_id',
        'price',
        'quantity',

    ];

    public function orderdetails(){
        return $this->hasMany(OrderDetails::class,'order_id');
    }

}

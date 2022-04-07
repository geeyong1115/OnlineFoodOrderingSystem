<?php
/**
 * @author YapYoonEn
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $connection = "mysql2";
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

    
    public function order() {
        return $this->belongTo('App\Models\Order','id', 'order_id');
    }

    function set_id($id) {
        $this->id = $id;
    }
    
    function set_order_id($order_id) {
        $this->order_id = $order_id;
    }
    
    function set_food_id($food_id) {
        $this->food_id = $food_id;
    }
    
    function set_quantity($quantity) {
        $this->quantity = $quantity;
    }

    function set_price($price) {
        $this->price = $price;
    }

    function set_created_at($created_at) {
        $this->created_at = $created_at;
    }

    function set_updated_at($updated_at) {
        $this->updated_at = $updated_at;
    }

    function get_id() {
        return $this->id;
    }

    function get_order_id() {
        return $this->order_id;
    }
    
    function get_food_id() {
        return $this->food_id;
    }
    
    function get_quantity() {
        return $this->quantity;
    }

    function get_price() {
        return $this->price;
    }

    function get_created_at() {
        return $this->created_at;
    }

    function get_updated_at() {
        return $this->updated_at;
    }
}
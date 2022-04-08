<?php
/**
 * @author YapYoonEn
 */
namespace App\Models;

use App\Models\FoodBeverage;
use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Order extends Model {

    protected $connection = "mysql2";
    public $incrementing = false;
    protected $keyType = 'string';
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
    
    public function details() {
        return $this->hasMany('App\Models\OrderDetails','order_id','id');
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_total_price($total_price) {
        $this->total_price = $total_price;
    }

    function set_status($status) {
        $this->status = $status;
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

    function get_total_price() {
        return $this->total_price;
    }

    function get_status() {
        return $this->status;
    }

    function get_created_at() {
        return $this->created_at;
    }

    function get_updated_at() {
        return $this->updated_at;
    }

}

class dineIn extends Order {

    private $table_no;

    function set_table_no($table_no) {
        $this->table_no = $table_no;
    }

    function get_table_no() {
        return $this->table_no;
    }

    function string() {
        echo "Id : {$this->id} <br>Total Price : RM {$this->total_price} <br>Date Time : {$this->created_at} <br>Status : {$this->status} <br>Table No : {$this->table_no} <br><br>";
    }

}

class takeAway extends Order {
    function string() {
        echo "Id : {$this->id} <br>Total Price : RM {$this->total_price} <br>Date Time : {$this->created_at} <br>Status : {$this->status} <br><br>";
    }
}

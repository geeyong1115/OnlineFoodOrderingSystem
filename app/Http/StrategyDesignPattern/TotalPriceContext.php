<?php
/**
 * @author YapYoonEn
 */
use App\Models\Order;
use App\Http\StrategyDesignPattern\TakeAwayPrice as TA;
use App\Http\StrategyDesignPattern\DineInPrice as DI;

class TotalPriceContext {
    private $method;
    
    public function getOrderMethod($id){
        $order = Order::where('id', $id)->value('table_no');
        if($order == null){
            $this->method = new TA;
        } else {
            $this->method = new DI;
        }
    }
    
    public function callCalTotal($subtotal){
        $this->method->calTotalPrice($subtotal);
    }
}

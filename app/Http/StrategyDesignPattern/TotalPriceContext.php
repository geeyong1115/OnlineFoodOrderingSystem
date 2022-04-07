<?php
/**
 * @author YapYoonEn
 */
use App\Models\Order;
use App\Http\StrategyDesignPattern\TakeAwayPrice as TA;
use App\Http\StrategyDesignPattern\DineInPrice as DI;

class TotalPriceContext {
    private $sub;
    
    public function initInstance($id){
        $order = Order::where('id', $id)->value('table_no');
        if($order == null){
            $this->sub = new TA;
        } else {
            $this->sub = new DI;
        }
    }
    
    public function sub($subtotal){
        $this->sub->calTotalPrice($subtotal);
    }
}

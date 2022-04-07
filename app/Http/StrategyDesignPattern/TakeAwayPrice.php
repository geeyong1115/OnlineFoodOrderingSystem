<?php
/**
 * @author YapYoonEn
 */
namespace App\Http\StrategyDesignPattern;
require_once 'TotalPriceInterface.php';

class TakeAwayPrice implements TotalPriceInterface{
    
    public function calTotalPrice($subtotal) {
        $total = $subtotal + ($subtotal * 6 / 100);
        echo number_format($total, 2);
    }

}

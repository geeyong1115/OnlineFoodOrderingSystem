<?php
/**
 * @author YapYoonEn
 */
namespace App\Http\StrategyDesignPattern;

interface TotalPriceInterface {
    public function calTotalPrice($subtotal);
}

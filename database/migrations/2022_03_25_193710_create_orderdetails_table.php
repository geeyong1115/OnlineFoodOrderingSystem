<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id');
            $table->unsignedBigInteger('food_id');
            $table->integer('quantity');
            $table->float('price');
            
            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->foreign('food_id')->references('food_id')->on('foodbeverages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderdetails');
    }
}

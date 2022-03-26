<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD:database/migrations/2022_03_26_010204_create_orders_table.php
class CreateOrdersTable extends Migration
=======
class CreateFoodbeveragesTable extends Migration
>>>>>>> 2ba661371145db1f377a8342f4f4758665decc47:database/migrations/2022_03_25_193637_create_foodbeverages_table.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2022_03_26_010204_create_orders_table.php
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('total_price',9,3);
            $table->string('status');
            $table->timestamps();
=======
        Schema::create('foodbeverages', function (Blueprint $table) {
            $table->bigIncrements('food_id');
            $table->string('name');
            $table->float('price');
            $table->integer('instock_qty');
            $table->string('status');
>>>>>>> 2ba661371145db1f377a8342f4f4758665decc47:database/migrations/2022_03_25_193637_create_foodbeverages_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD:database/migrations/2022_03_26_010204_create_orders_table.php
        Schema::dropIfExists('orders');
=======
        Schema::dropIfExists('foodbeverages');
>>>>>>> 2ba661371145db1f377a8342f4f4758665decc47:database/migrations/2022_03_25_193637_create_foodbeverages_table.php
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodBeveragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2022_03_26_013400_create_food_beverages_table.php
        Schema::create('food_beverages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('price',9,3);
            $table->string('instock_qty');
            $table->string('status');
            $table->timestamps();
=======
        Schema::create('users', function (Blueprint $table) {
            $table->string('user_id')->unique();
            $table->string('password')->nullable();
>>>>>>> 2ba661371145db1f377a8342f4f4758665decc47:database/migrations/2022_03_25_195141_create_users_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_beverages');
    }
}
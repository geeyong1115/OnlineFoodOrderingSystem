<?php
/**
 * @author YapYoonEn
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->integer('food_id');
            $table->integer('quantity');
            $table->decimal('price',9,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('order_details');
    }
}
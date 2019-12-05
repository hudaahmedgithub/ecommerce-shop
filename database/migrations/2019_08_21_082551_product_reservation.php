<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductReservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('product_reservation')){
            Schema::create('product_reservation', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('reservation_id');

                $table->unsignedInteger('product_id');
                $table->string('product_currency');
                $table->string('tax');
                $table->string('quantity');

                $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_reservation');
    }
}

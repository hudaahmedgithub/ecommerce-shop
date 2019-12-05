<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReservationInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('reservation_info')){
            Schema::create('reservation_info', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('reservation_id');

                $table->string('payment_method')->default('paypal');
                $table->string('payment_id')->nullable();
                $table->string('payment_cart')->nullable();

                $table->string('payer_first_name');
                $table->string('payer_last_name');
                $table->string('payer_email');
                $table->string('payer_country_code');

                $table->string('shipping_recipient_name');
                $table->string('shipping_line1');
                $table->string('shipping_city');
                $table->string('shipping_state')->nullable();
                $table->string('shipping_postal_code')->nullable();
                $table->string('shipping_country_code')->nullable();

                $table->string('total')->default('0');
                $table->string('subtotal')->default('0');
                $table->string('currency')->nullable();
                $table->string('tax')->default('0');
                $table->string('shipping')->default('0');
                $table->string('discount')->default('0');

                $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');

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
        //
    }
}

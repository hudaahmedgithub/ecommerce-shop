<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');

            $table->enum('type', ['percentage', 'flat_rate']);
            $table->string('amount')->default(0);
            $table->string('code')->unique();
            $table->enum('duration', ['once', 'multi_times']);
            $table->integer('multi_times_count')->default(1);
            $table->date('expires_at');

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
        Schema::dropIfExists('coupons');
    }
}

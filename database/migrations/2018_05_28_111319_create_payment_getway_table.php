<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentGetwayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('payment_getway', function (Blueprint $table) {
        //     $table->increments('pg_id');
        //     $table->integer('user_id')->unsigned();
        //     $table->foreign('user_id')->references('user_id')->on('users');
        //     $table->integer('product_id')->unsigned();
        //     $table->foreign('product_id')->references('product_id')->on('product');
        //     $table->integer('price');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_getway');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('pcity')->unsigned();
            $table->foreign('pcity')->references('city_id')->on('city');
            $table->integer('procategory')->unsigned();
            $table->foreign('procategory')->references('category_id')->on('category');
            $table->integer('field_id')->default(0);
            $table->string('Coordinates')->default(0);
            $table->integer('pprice');
            $table->string('title_product');
            $table->string('body_product');
            $table->integer('expiration')->default(2);
            $table->boolean('confirm_manager')->default(0);
            $table->boolean('reject_manager')->default(0);
            $table->boolean('sale_goods')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('product');
    }
}

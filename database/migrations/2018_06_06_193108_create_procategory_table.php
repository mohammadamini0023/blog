<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procategory', function (Blueprint $table) {
            $table->increments('procategory_id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('category_id')->on('category');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('product_id')->on('product');
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
        Schema::dropIfExists('procategory');
    }
}

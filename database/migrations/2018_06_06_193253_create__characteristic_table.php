<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacteristicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characteristic', function (Blueprint $table) {
            $table->increments('characteristic_id');
            $table->string('sizex')->nullable();
            $table->string('sizey')->nullable();
            $table->string('material')->nullable();
            $table->string('shape')->nullable();
            $table->string('made')->nullable();
            $table->integer('procategory_id')->unsigned();
            $table->foreign('procategory_id')->references('procategory_id')->on('procategory');
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
        Schema::dropIfExists('_characteristic');
    }
}

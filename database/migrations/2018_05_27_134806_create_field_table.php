<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field', function (Blueprint $table) {
            $table->increments('field_id');
            $table->integer('area')->nullable();
            $table->boolean('suburb')->default(0);
            $table->integer('number_rooms')->nullable();
            $table->integer('Build')->nullable();
            $table->boolean('Official_document')->default(0);
            $table->string('brand')->nullable();
            $table->string('color')->nullable();
            $table->integer('Function')->nullable();
            $table->string('type_sim')->nullable();
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
        Schema::dropIfExists('field');
    }
}

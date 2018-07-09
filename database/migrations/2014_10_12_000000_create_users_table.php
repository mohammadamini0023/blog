<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('family');
            $table->string('email')->unique();
            $table->boolean('roule')->default(0);
            $table->boolean('verify_email')->default(0);
            $table->string('token',254)->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('adress')->nullable();
            $table->tinyInteger('coin')->default(5);
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
        Schema::dropIfExists('users');
    }
}

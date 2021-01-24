<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('login')->nullable();
            $table->string('email');
            $table->string('ville')->nullable();
            $table->string('password');
            $table->string('confirmpassword');
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
        Schema::drop('membres');
    }
}

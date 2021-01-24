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
            $table->timestamps();
            $table->string('nom')->nullable();
            $table->text('prenom')->nullable();
            $table->string('login')->nullable();
            $table->string('email')->nullable();
            $table->string('ville')->nullable();
            $table->string('password')->nullable();
            $table->string('confirmpassword')->nullable();
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

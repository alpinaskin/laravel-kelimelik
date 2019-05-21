<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOgrenilecekKelimelerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ogrenilecek_kelimeler', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kelime_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
        });

        Schema::table('ogrenilecek_kelimeler', function($table){
            $table->foreign('kelime_id')->references('id')->on('kelime');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ogrenilecek_kelimeler');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSorularTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sorular', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('test_id')->unsigned();
            $table->foreign('test_id')->references('id')->on('testler');
            $table->integer('kelime_id')->unsigned();
            $table->foreign('kelime_id')->references('id')->on('ogrenilecek_kelimeler');
            $table->integer('cevaplar_id')->unsigned();
            $table->foreign('cevaplar_id')->references('id')->on('cevaplar');
            $table->integer('soru_tip_id')->unsigned();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sorular', function (Blueprint $table) {
            Schema::dropIfExists('sorular');
        });
    }
}

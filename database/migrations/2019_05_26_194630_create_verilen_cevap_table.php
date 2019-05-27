<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerilenCevapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verilen_cevaplar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cevap',50);
            $table->integer('soru_id')->unsigned();
        });

        Schema::table('verilen_cevaplar', function (Blueprint $table) {
            $table->foreign('soru_id')->references('id')->on('sorular');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verilen_cevap');
    }
}

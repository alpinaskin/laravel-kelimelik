<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelime', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kelime_adi',50);
            $table->string('anlami',50);
            $table->string('cumle',100);
            $table->timestamps();
        });

        Schema::table('kelime', function($table){
            $table->integer('tur_id')->unsigned();
            $table->foreign('tur_id')->references('id')->on('kelime_turu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelime');
    }
}

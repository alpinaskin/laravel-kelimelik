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
            $table->bigIncrements('id');
            $table->string('kelime_adi',50);
            $table->string('anlami',50);
            $table->string('aciklama',100);
            $table->bigIncrements('tur_id');
            $table->foreign('tur_id')->references('id')->on('kelime_turu');
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
        Schema::dropIfExists('kelime');
    }
}

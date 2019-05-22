<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignSorularTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sorular', function($table){
            $table->foreign('test_id')->references('id')->on('testler');
            $table->foreign('kelime_id')->references('id')->on('ogrenilecek_kelimeler');
            $table->foreign('cevaplar_id')->references('id')->on('cevaplar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

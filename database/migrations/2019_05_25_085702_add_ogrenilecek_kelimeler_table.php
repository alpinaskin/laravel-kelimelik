<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOgrenilecekKelimelerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ogrenilecek_kelimeler', function($table){
            $table->boolean('ogrenildi')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ogrenilecek_kelimeler', function($table){
            $table->dropColumn('ogrenildi');
        });
    }
}

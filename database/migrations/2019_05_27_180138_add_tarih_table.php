<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTarihTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ogrenilecek_kelimeler', function (Blueprint $table) {
            $table->timestamp('tarih_ilk')->nullable();
            $table->timestamp('tarih_ikinci')->nullable();
            $table->timestamp('tarih_ucuncu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ogrenilecek_kelimeler', function (Blueprint $table) {
            $table->dropColumn('tarih_ilk');
            $table->dropColumn('tarih_ikinci');
            $table->dropColumn('tarih_ucuncu');
        });
    }
}

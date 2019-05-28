<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCevaplarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cevaplar', function (Blueprint $table) {
            $table->string('yanlis4_cevap',50)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('cevaplar', function (Blueprint $table) {
            $table->dropColumn('yanlis4_cevap');
        });
    }
}

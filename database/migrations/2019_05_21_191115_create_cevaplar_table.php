<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCevaplarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cevaplar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dogru_cevap',50);
            $table->string('yanlis1_cevap',50);
            $table->string('yanlis2_cevap',50);
            $table->string('yanlis3_cevap',50);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cevaplar');
    }
}

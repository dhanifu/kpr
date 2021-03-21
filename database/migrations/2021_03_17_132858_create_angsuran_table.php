<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAngsuranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angsuran', function (Blueprint $table) {
            $table->id();
            $table->integer('angsuran_ke');
            $table->integer('angsuran_pokok');
            $table->integer('angsuran_bunga');
            $table->integer('besar_angsuran');
            $table->integer('sisa_pinjaman_pokok');
            $table->integer('anuitas');
            $table->biginteger('nrp');
            $table->foreignId('pinjaman_id')->references('id')->on('pinjaman')->onDelete('cascade');
            $table->enum('status',['sudahbayar','belumbayar']);
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
        Schema::dropIfExists('angsuran');
    }
}

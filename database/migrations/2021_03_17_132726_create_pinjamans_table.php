<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjamans', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_pinjaman');
            $table->date('jangka_waktu');
            $table->integer('bunga');
            $table->biginteger('nrp');
            $table->integer('angsuran_ke');
            $table->integer('angsuran_masuk');
            $table->integer('tunggakan');
            $table->integer('jml_tunggakan');
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
        Schema::dropIfExists('pinjamans');
    }
}

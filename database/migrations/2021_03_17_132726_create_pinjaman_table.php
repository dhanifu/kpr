<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->id();
            $table->date('jangka_waktu');
            $table->integer('jmlangs');
            $table->integer('angsuran_ke');
            $table->string('angsuran_masuk');
            $table->integer('angsuran_tunggak');
            $table->integer('jml_tunggak');
            $table->string('keterangan');
            $table->foreignId('angsuran_id')->references('id')->on('angsuran')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('pinjaman');
    }
}

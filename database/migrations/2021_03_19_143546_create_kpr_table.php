<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKprTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpr', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('pangkat');
            $table->string('corps')->nullable();
            $table->integer('nrp');
            $table->string('kesatuan');
            $table->integer('tahap');
            $table->integer('pinjaman');
            $table->integer('jk_waktu');
            $table->string('tmt_angsuran');
            $table->integer('jml_angs');
            $table->integer('angs_ke');
            $table->string('angsuran_masuk')->nullable();
            $table->integer('tunggakan');
            $table->integer('jml_tunggakan');
            $table->text('keterangan');
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kpr');
    }
}

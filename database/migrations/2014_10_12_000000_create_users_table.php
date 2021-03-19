<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('nrp')->unique();
            $table->string('password');
            $table->string('role'); //untuk role 0(admin), 1(pengelola), 2(user status_verif diterima dan tidak), 3(end user = belum verifikasi email)
            $table->string('avatar')->nullable();
            $table->boolean('status_verif')->nullable();
            $table->foreignId('pangkat_id')->nullable()->references('id')->on('pangkat')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
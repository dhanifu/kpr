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
            $table->string('username')->unique();
            $table->string('nrp')->unique()->nullable(); //untuk user 
            $table->string('password');
            $table->string('role'); //untuk role 0(admin), 1(pengelola), 2(user verif & tidak)
            $table->string('avatar')->nullable();
            $table->boolean('status_verif')->nullable(); //untuk 1 = user yang sudah di verif akunnya oleh admin dan bisa mengajukan pinjaman, dan 0 = tidak di approve
            $table->foreignId('pangkat_id')->nullable()->references('id')->on('pangkat')->onDelete('cascade'); //untuk user
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

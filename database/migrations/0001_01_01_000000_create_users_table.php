<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama lengkap
            $table->string('email')->unique(); // Email
            $table->string('password'); // Password
            $table->string('phone')->nullable(); // Nomor Telepon
            $table->boolean('is_married')->default(false); // Status menikah
            $table->timestamps(); // Tanggal buat dan update
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

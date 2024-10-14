<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID pengguna yang terkait
            $table->date('report_date'); // Tanggal laporan
            $table->decimal('income', 10, 2)->default(0); // Pemasukan
            $table->decimal('expense', 10, 2)->default(0); // Pengeluaran
            $table->string('description')->nullable(); // Deskripsi laporan
            $table->timestamps();

            // Relasi
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
}

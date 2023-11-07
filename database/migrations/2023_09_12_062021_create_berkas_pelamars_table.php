<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas_pelamars', function (Blueprint $table) {
            $table->id();
            $table->string('file', 255)->nullable(false);
            $table->unsignedBigInteger('id_mahasiswa')->nullable(false);
            $table->unsignedBigInteger('id_pelamar_magang')->nullable(false);
            $table->unsignedBigInteger('id_berkas')->nullable(false);
            $table->foreign('id_pelamar_magang')->references('id')->on('pelamar_magangs')->onDelete('cascade');
            $table->foreign('id_berkas')->references('id')->on('berkas')->onDelete('cascade');
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
        Schema::dropIfExists('berkas_pelamars');
    }
};

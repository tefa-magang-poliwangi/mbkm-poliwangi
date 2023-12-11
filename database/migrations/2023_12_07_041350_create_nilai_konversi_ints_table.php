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
        Schema::create('nilai_konversi_ints', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('nilai_angka')->nullable(false);
            $table->string('nilai_huruf', 4)->nullable(false);
            $table->decimal('angka_mutu', 5, 1)->nullable(false);
            $table->tinyInteger('kredit')->nullable(false);
            $table->tinyInteger('mutu')->nullable(false);
            $table->unsignedBigInteger('id_mahasiswa')->nullable(false);
            $table->unsignedBigInteger('id_matkul')->nullable(false);
            // $table->unsignedBigInteger('id_lowongan')->nullable(true);
            // $table->unsignedBigInteger('id_pelamar_magang')->nullable(true);
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('id_matkul')->references('id')->on('matkuls')->onDelete('cascade');
            // $table->foreign('id_lowongan')->references('id')->on('lowongans')->onDelete('cascade');
            // $table->foreign('id_pelamar')->references('id')->on('pelamar_magangs')->onDelete('cascade');
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
        Schema::dropIfExists('nilai_konversi_ints');
    }
};
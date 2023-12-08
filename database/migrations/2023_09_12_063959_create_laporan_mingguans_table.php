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
        Schema::create('laporan_mingguans', function (Blueprint $table) {
            $table->id();
            $table->text('keterangan')->nullable(false);
            $table->enum('validasi_pl', ['Aktif', 'Tidak Aktif'])->nullable(false);
            $table->unsignedBigInteger('id_mahasiswa')->nullable(false);
            $table->unsignedBigInteger('id_program_magang')->nullable(false);
            $table->unsignedBigInteger('id_kompetensi_lowongan')->nullable(false);
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('id_program_magang')->references('id')->on('program_magangs')->onDelete('cascade');
            $table->foreign('id_kompetensi_lowongan')->references('id')->on('kompetensi_lowongans')->onDelete('cascade');
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
        Schema::dropIfExists('laporan_mingguans');
    }
};


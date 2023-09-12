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
            $table->bigIncrements('id');
            $table->text('keterangan');
            $table->enum('validasi_pl', ['aktif', 'tidak aktif']);
            $table->bigInteger('id_mahasiswa')->unsigned();
            $table->bigInteger('id_program_magang')->unsigned();
            $table->bigInteger('id_kompetensi_lowongan')->unsigned();
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
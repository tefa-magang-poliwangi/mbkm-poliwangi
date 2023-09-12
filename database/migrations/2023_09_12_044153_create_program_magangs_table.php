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
        Schema::create('program_magangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kegiatan', 255);
            $table->date('waktu_mulai');
            $table->date('waktu_akhir');
            $table->string('posisi_mahasiswa', 255);
            $table->enum('validasi_kaprodi', ['setuju', 'tidak setuju']);
            $table->bigInteger('id_lowongan')->unsigned();
            $table->bigInteger('id_pl_mitra')->unsigned();
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
        Schema::dropIfExists('program_magangs');
    }
};
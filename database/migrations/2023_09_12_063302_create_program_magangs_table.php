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
            $table->id();
            $table->string('kegiatan', 255)->nullable(false);
            $table->date('waktu_mulai')->nullable(false);
            $table->date('waktu_akhir')->nullable(false);
            $table->string('posisi_mahasiswa', 255)->nullable(false);
            $table->enum('validasi_kaprodi', ['Setuju', 'Tidak Setuju', 'Belum Disetujui'])->nullable(false)->default('Belum Disetujui');
            $table->unsignedBigInteger('id_lowongan')->nullable(false);
            $table->unsignedBigInteger('id_pl_mitra')->nullable(false);
            $table->foreign('id_lowongan')->references('id')->on('lowongans')->onDelete('cascade');
            $table->foreign('id_pl_mitra')->references('id')->on('pl_mitras')->onDelete('cascade');
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

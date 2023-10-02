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
        Schema::create('peserta_dosen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mahasiswa')->nullable(false);
            $table->unsignedBigInteger('id_dosen_wali')->nullable(false);
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('id_dosen_wali')->references('id')->on('dosen_wali')->onDelete('cascade');
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
        Schema::dropIfExists('peserta_dosen');
    }
};

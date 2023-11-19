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
        Schema::create('pendamping_lapang_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dosen_pl')->nullable(false);
            $table->unsignedBigInteger('id_pelamar_magang')->nullable(false);
            $table->unsignedBigInteger('id_pl_mitra')->nullable(true);
            $table->unsignedBigInteger('id_lowongan')->nullable(true);
            $table->foreign('id_dosen_pl')->references('id')->on('dosen_p_l_s')->onDelete('cascade');
            $table->foreign('id_pelamar_magang')->references('id')->on('pelamar_magangs')->onDelete('cascade');
            $table->foreign('id_pl_mitra')->references('id')->on('pl_mitras')->onDelete('cascade');
            $table->foreign('id_lowongan')->references('id')->on('lowongans')->onDelete('cascade');
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
        Schema::dropIfExists('pendamping_lapang_mahasiswas');
    }
};

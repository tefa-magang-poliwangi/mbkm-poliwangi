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
        Schema::create('transkrip_mitras', function (Blueprint $table) {
            $table->id();
            $table->string('file_transkrip', 255)->nullable(false);
            $table->string('file_sertifikat', 255)->nullable(false);
            $table->string('file_laporan_akhir', 255)->nullable(true);
            $table->text('evaluasi')->nullable();
            $table->bigInteger('id_pelamar_magang')->unsigned();
            $table->bigInteger('id_periode')->unsigned();
            $table->foreign('id_pelamar_magang')->references('id')->on('pelamar_magangs')->onDelete('cascade');
            $table->foreign('id_periode')->references('id')->on('periodes')->onDelete('cascade');
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
        Schema::dropIfExists('transkrip_mitras');
    }
};

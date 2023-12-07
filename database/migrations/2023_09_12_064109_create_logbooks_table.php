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
        Schema::create('logbooks', function (Blueprint $table) {
            $table->id();
            $table->string('kegiatan', 1000)->nullable(false);
            $table->string('bukti', 255)->nullable(false);
            $table->date('tanggal')->nullable(false);
            $table->unsignedBigInteger('id_program_magang')->nullable(false);
            $table->unsignedBigInteger('id_mahasiswa')->nullable(false);
            $table->foreign('id_program_magang')->references('id')->on('program_magangs')->onDelete('cascade');
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')->onDelete('cascade');
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
        Schema::dropIfExists('logbooks');
    }
};

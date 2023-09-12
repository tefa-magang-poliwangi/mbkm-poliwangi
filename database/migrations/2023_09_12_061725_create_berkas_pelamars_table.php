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
            $table->unsignedBigInteger('id_lowongan')->nullable(false);
            $table->unsignedBigInteger('id_berkas_lowongan')->nullable(false);
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('id_lowongan')->references('id')->on('lowongans')->onDelete('cascade');
            $table->foreign('id_berkas_lowongan')->references('id')->on('berkas_lowongans')->onDelete('cascade');
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

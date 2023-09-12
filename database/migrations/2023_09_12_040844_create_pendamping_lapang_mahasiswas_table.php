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
            $table->bigIncrements('id');
            $table->bigInteger('id_dosen')->unsigned();
            $table->bigInteger('id_mahasiswa')->unsigned();
            $table->bigInteger('id_pl_mitra')->unsigned();
            $table->bigInteger('id_lowongan')->unsigned();
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
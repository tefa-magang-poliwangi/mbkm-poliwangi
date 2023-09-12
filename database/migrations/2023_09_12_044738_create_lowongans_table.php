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
        Schema::create('lowongans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 255);
            $table->integer('jumlah_lowongan');
            $table->text('deskripsi');
            $table->date('tanggal_dibuka');
            $table->date('tanggal_ditutup');
            $table->date('tanggal_magang_dimulai');
            $table->date('tanggal_magang_berakhir');
            $table->enum('status', ['aktif', 'tidak aktif']);
            $table->bigInteger('id_mitra')->unsigned();
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
        Schema::dropIfExists('lowongans');
    }
};
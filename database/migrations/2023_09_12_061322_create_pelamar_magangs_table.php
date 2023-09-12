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
        Schema::create('pelamar_magangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('status_diterima', ['aktif', 'tidak aktif']);
            $table->bigInteger('id_mahasiswa')->unsigned();
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
        Schema::dropIfExists('pelamar_magangs');
    }
};
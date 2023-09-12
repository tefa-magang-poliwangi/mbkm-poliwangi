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
        Schema::create('mahasiswa_magangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('periode_aktif', 255);
            $table->bigInteger('id_mahasiswa')->unsigned();
            $table->timestamps();

            // Definisi foreign key untuk menghubungkan dengan tabel lain jika diperlukan
            // $table->foreign('id_mahasiswa')->references('id')->on('mahasiswa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa_magangs');
    }
};
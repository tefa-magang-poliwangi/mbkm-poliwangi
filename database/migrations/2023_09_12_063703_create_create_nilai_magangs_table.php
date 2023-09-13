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
        Schema::create('nilai_magangs', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('nilai_angka')->nullable(false);
            $table->string('nilai_huruf', 4)->nullable(false);
            $table->unsignedBigInteger('id_mahasiswa')->nullable(false);
            $table->unsignedBigInteger('id_kompetensi_program')->nullable(false);
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('id_kompetensi_program')->references('id')->on('kompetensi_programs')->onDelete('cascade');
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
        Schema::dropIfExists('nilai_magangs');
    }
};

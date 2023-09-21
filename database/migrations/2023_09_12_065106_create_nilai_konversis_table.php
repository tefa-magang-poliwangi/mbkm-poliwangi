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
        Schema::create('nilai_konversis', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('nilai_angka')->nullable(false);
            $table->string('nilai_huruf', 4)->nullable(false);
            $table->enum('validasi_kaprodi', ['Setuju', 'Tidak Setuju'])->nullable(false);
            $table->unsignedBigInteger('id_mahasiswa')->nullable(false);
            $table->unsignedBigInteger('id_matkul')->nullable(false);
            $table->unsignedBigInteger('id_lowongan')->nullable(false);
            $table->unsignedBigInteger('id_nilai_magang_ext')->nullable(false);
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('id_matkul')->references('id')->on('matkuls')->onDelete('cascade');
            $table->foreign('id_lowongan')->references('id')->on('lowongans')->onDelete('cascade');
            $table->foreign('id_nilai_magang_ext')->references('id')->on('nilai_magang_exts')->onDelete('cascade');
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
        Schema::dropIfExists('nilai_konversis');
    }
};

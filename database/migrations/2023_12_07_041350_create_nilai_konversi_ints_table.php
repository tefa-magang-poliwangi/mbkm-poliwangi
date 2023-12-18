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
        Schema::create('nilai_konversi_ints', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('nilai_angka')->nullable(false);
            $table->string('nilai_huruf', 4)->nullable(false);
            $table->decimal('angka_mutu', 5, 1)->nullable(false);
            $table->tinyInteger('kredit')->nullable(false);
            $table->tinyInteger('mutu')->nullable(false);
            $table->unsignedBigInteger('id_matkul')->nullable(false);
            $table->unsignedBigInteger('id_pelamar_magang')->nullable(false);
            $table->unsignedBigInteger('id_transkrip_mitra')->nullable(false);
            $table->foreign('id_matkul')->references('id')->on('matkuls')->onDelete('cascade');
            $table->foreign('id_pelamar_magang')->references('id')->on('pelamar_magangs')->onDelete('cascade');
            $table->foreign('id_transkrip_mitra')->references('id')->on('transkrip_mitras')->onDelete('cascade');
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
        Schema::dropIfExists('nilai_konversi_ints');
    }
};

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
            $table->bigIncrements('id');
            $table->string('nilai_angka', 255);
            $table->string('nilai_huruf', 255);
            $table->enum('validasi_kaprodi', ['setuju', 'tidak setuju']);
            $table->bigInteger('id_mahasiswa')->unsigned();
            $table->bigInteger('id_matkul')->unsigned();
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
        Schema::dropIfExists('nilai_konversis');
    }
};
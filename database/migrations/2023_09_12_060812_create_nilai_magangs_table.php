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
            $table->bigIncrements('id');
            $table->integer('nilai_angka');
            $table->string('nilai_huruf', 4);
            $table->bigInteger('id_mahasiswa')->unsigned();
            $table->bigInteger('id_kompetensi_program')->unsigned();
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
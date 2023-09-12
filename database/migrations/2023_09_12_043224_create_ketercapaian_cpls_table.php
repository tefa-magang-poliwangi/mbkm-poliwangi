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
        Schema::create('ketercapaian_cpls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_mahasiswa')->unsigned();
            $table->bigInteger('id_program_magang')->unsigned();
            $table->bigInteger('id_cpl')->unsigned();
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
        Schema::dropIfExists('ketercapaian_cpls');
    }
};
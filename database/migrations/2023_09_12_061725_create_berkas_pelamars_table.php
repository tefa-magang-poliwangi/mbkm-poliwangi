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
        Schema::create('berkas_pelamars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file', 255);
            $table->bigInteger('id_mahasiswa')->unsigned();
            $table->bigInteger('id_lowongan')->unsigned();
            $table->bigInteger('id_berkas_lowongan')->unsigned();
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
        Schema::dropIfExists('berkas_pelamars');
    }
};
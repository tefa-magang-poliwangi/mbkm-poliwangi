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
        Schema::create('nilai_magang_exts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file', 255);
            $table->string('semester', 255);
            $table->bigInteger('id_mahasiswa')->unsigned();
            $table->bigInteger('id_magang_ext')->unsigned();
            $table->bigInteger('id_periode')->unsigned();
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
        Schema::dropIfExists('nilai_magang_exts');
    }
};
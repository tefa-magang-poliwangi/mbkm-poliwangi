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
        Schema::create('berkas_lowongans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lowongan')->nullable(false);
            $table->unsignedBigInteger('id_berkas')->nullable(false);
            $table->foreign('id_lowongan')->references('id')->on('lowongans')->onDelete('cascade');
            $table->foreign('id_berkas')->references('id')->on('berkas')->onDelete('cascade');
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
        Schema::dropIfExists('berkas_lowongans');
    }
};

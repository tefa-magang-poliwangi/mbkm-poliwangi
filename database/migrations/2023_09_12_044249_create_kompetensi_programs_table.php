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
        Schema::create('kompetensi_programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_program_magang')->nullable(false);
            $table->unsignedBigInteger('id_kompetensi_lowongan')->nullable(false);
            $table->foreign('id_program_magang')->references('id')->on('program_magangs')->onDelete('cascade');
            $table->foreign('id_kompetensi_lowongan')->references('id')->on('kompetensi_lowongans')->onDelete('cascade');
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
        Schema::dropIfExists('kompetensi_programs');
    }
};

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
        Schema::create('mahasiswa_magangs', function (Blueprint $table) {
            $table->id();
            $table->string('periode_aktif', 255)->nullable(false);
            $table->unsignedBigInteger('id_mahasiswa')->nullable(false);
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')->onDelete('cascade');
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
        Schema::dropIfExists('mahasiswa_magangs');
    }
};

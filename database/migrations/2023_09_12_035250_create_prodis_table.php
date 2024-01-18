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
        Schema::create('prodis', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255)->nullable(false);
            $table->string('kode_prodi', 10)->nullable(false);
            $table->enum('jenjang_pendidikan', ['D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3',])->nullable(false);
            $table->string('id_prodi_feeder')->nullable(true);
            $table->unsignedBigInteger('id_jurusan')->nullable(false);
            $table->foreign('id_jurusan')->references('id')->on('jurusans')->onDelete('cascade');
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
        Schema::dropIfExists('prodis');
    }
};

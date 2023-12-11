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
        Schema::create('komentar_logbooks', function (Blueprint $table) {
            $table->id();
            $table->text('komentar')->nullable(false);
            $table->date('tanggal')->nullable(false);
            $table->tinyInteger('nilai')->nullable(false);
            $table->unsignedBigInteger('id_pendamping_lapang_mahasiswa')->nullable(false);
            $table->unsignedBigInteger('id_logbook')->nullable(false);
            $table->foreign('id_pendamping_lapang_mahasiswa')->references('id')->on('pendamping_lapang_mahasiswas')->onDelete('cascade');
            $table->foreign('id_logbook')->references('id')->on('logbooks')->onDelete('cascade');
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
        Schema::dropIfExists('komentar_logbooks');
    }
};

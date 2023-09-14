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
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255)->nullable(false);
            $table->tinyInteger('jumlah_lowongan')->nullable(false);
            $table->text('deskripsi')->nullable(false);
            $table->date('tanggal_dibuka')->nullable(false);
            $table->date('tanggal_ditutup')->nullable(false);
            $table->date('tanggal_magang_dimulai')->nullable(false);
            $table->date('tanggal_magang_berakhir')->nullable(false);
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->nullable(false);
            $table->unsignedBigInteger('id_mitra')->unsigned()->nullable(false);
            $table->foreign('id_mitra')->references('id')->on('mitras')->onDelete('cascade');
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
        Schema::dropIfExists('lowongans');
    }
};

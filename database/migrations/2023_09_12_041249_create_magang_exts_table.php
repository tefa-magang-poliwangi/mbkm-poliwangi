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
        Schema::create('magang_exts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable(false);
            $table->string('jenis_magang', 255)->nullable(false);
            $table->unsignedBigInteger('id_periode')->nullable(false);
            $table->unsignedBigInteger('id_prodi')->nullable(false);
            $table->foreign('id_periode')->references('id')->on('periodes')->onDelete('cascade');
            $table->foreign('id_prodi')->references('id')->on('prodis')->onDelete('cascade');
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
        Schema::dropIfExists('magang_exts');
    }
};

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
        Schema::create('penilaian_magang_exts', function (Blueprint $table) {
            $table->id();
            $table->string('penilaian')->nullable(false);
            $table->unsignedBigInteger('id_magang_ext')->nullable(true);
            $table->foreign('id_magang_ext')->references('id')->on('magang_exts')->onDelete('cascade');
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
        Schema::dropIfExists('penilaian_magang_exts');
    }
};

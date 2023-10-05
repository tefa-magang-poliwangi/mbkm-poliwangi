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
        Schema::create('detail_penilaian_magang_exts', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('nilai')->nullable(false);
            $table->unsignedBigInteger('id_penilaian_magang_ext')->nullable(true);
            $table->foreign('id_penilaian_magang_ext')->references('id')->on('penilaian_magang_exts')->onDelete('cascade');
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
        Schema::dropIfExists('detail_penilaian_magang_exts');
    }
};

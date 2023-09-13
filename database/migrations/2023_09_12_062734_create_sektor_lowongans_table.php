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
        Schema::create('sektor_lowongans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sektor_industri')->nullable(false);
            $table->unsignedBigInteger('id_lowongan')->nullable(false);
            $table->foreign('id_sektor_industri')->references('id')->on('sektor_industris')->onDelete('cascade');
            $table->foreign('id_lowongan')->references('id')->on('lowongans')->onDelete('cascade');
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
        Schema::dropIfExists('sektor_lowongans');
    }
};

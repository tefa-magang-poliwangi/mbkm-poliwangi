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
            $table->bigIncrements('id');
            $table->text('komentar');
            $table->date('tanggal');
            $table->bigInteger('id_logbook')->unsigned();
            $table->bigInteger('id_pl_mahasiswa')->unsigned();
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
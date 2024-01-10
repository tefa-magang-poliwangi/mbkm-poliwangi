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
        Schema::create('detail_nilai_hurufs', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('batas_atas')->unsigned()->nullable(false);
            $table->tinyInteger('batas_bawah')->unsigned()->nullable(false);
            $table->string('nilai_huruf', 4)->nullable(false);
            $table->unsignedBigInteger('id_profil_nilai_huruf')->nullable(false);
            $table->foreign('id_profil_nilai_huruf')->references('id')->on('profil_nilai_hurufs')->onDelete('cascade');
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
        Schema::dropIfExists('detail_nilai_hurufs');
    }
};

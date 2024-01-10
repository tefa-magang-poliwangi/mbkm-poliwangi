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
        Schema::create('detail_angka_mutus', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('batas_atas')->unsigned()->nullable(false);
            $table->tinyInteger('batas_bawah')->unsigned()->nullable(false);
            $table->decimal('angka_mutu', 2, 1)->unsigned()->nullable(false);
            $table->unsignedBigInteger('id_profil_angka_mutu')->nullable(false);
            $table->foreign('id_profil_angka_mutu')->references('id')->on('profil_angka_mutus')->onDelete('cascade');
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
        Schema::dropIfExists('detail_angka_mutus');
    }
};

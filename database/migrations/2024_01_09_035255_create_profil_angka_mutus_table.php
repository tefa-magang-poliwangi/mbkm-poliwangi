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
        Schema::create('profil_angka_mutus', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable(false);
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->nullable(false);
            $table->unsignedBigInteger('id_periode')->nullable(false);
            $table->foreign('id_periode')->references('id')->on('periodes')->onDelete('cascade');
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
        Schema::dropIfExists('profil_angka_mutus');
    }
};

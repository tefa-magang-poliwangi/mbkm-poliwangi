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
        Schema::create('kaprodis', function (Blueprint $table) {
            $table->id();
            $table->date('periode_mulai')->nullable(false);
            $table->date('periode_akhir')->nullable(false);
            $table->enum('status', ['Aktif', 'Tidak Aktif']);
            $table->unsignedBigInteger('id_dosen')->nullable(false);
            $table->foreign('id_dosen')->references('id')->on('dosens')->onDelete('cascade');
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
        Schema::dropIfExists('kaprodis');
    }
};

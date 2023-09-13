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
        Schema::create('cpls', function (Blueprint $table) {
            $table->id();
            $table->string('kode_cpl', 255)->nullable(false);
            $table->text('deskripsi')->nullable(false);
            $table->string('jenis_cpl', 255)->nullable(false);
            $table->unsignedBigInteger('id_kurikulum')->nullable(false);
            $table->foreign('id_kurikulum')->references('id')->on('kurikulums')->onDelete('cascade');
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
        Schema::dropIfExists('cpls');
    }
};

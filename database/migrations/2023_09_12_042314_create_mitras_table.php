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
        Schema::create('mitras', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255)->nullable(false);
            $table->text('alamat')->nullable(false);
            $table->string('kota', 255)->nullable(false);
            $table->string('provinsi', 255)->nullable(false);
            $table->text('website')->nullable(true);
            $table->string('narahubung', 255)->nullable(false);
            $table->string('email', 255)->nullable(false);
            $table->string('foto', 255)->nullable(true);
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->nullable(false);
            $table->text('deskripsi')->nullable(true);
            $table->unsignedBigInteger('id_user')->nullable(false);
            $table->unsignedBigInteger('id_sektor_industri')->nullable(false);
            $table->unsignedBigInteger('id_kategori')->nullable(false);
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_sektor_industri')->references('id')->on('sektor_industris')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade');
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
        Schema::dropIfExists('mitras');
    }
};

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
            $table->bigIncrements('id');
            $table->string('nama', 255);
            $table->text('alamat');
            $table->string('kota', 255);
            $table->string('provinsi', 255);
            $table->text('website');
            $table->string('narahubung', 255);
            $table->string('email', 255);
            $table->string('foto', 255);
            $table->enum('status', ['aktif', 'tidak aktif']);
            $table->string('username', 255);
            $table->string('password', 255);
            $table->bigInteger('id_sektor_industri')->unsigned();
            $table->bigInteger('id_kategori')->unsigned();
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
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
        Schema::create('pl_mitras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 255);
            $table->string('no_telp', 15);
            $table->string('email', 255);
            $table->string('username', 255);
            $table->string('password', 255);
            $table->bigInteger('id_mitra')->unsigned();
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
        Schema::dropIfExists('pl_mitras');
    }
};
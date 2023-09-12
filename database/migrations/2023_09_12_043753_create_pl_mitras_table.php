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
            $table->id();
            $table->string('nama', 255)->nullable(false);
            $table->string('no_telp', 15)->nullable(false);
            $table->string('email', 255)->nullable(false);
            $table->string('username', 255)->nullable(false);
            $table->string('password', 255)->nullable(false);
            $table->unsignedBigInteger('id_mitra')->nullable(false);
            $table->foreign('id_mitra')->references('id')->on('mitras')->onDelete('cascade');
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

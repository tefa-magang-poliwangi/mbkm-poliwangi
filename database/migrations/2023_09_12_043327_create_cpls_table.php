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
            $table->bigIncrements('id');
            $table->string('kode_cpl', 255);
            $table->text('deskripsi');
            $table->string('jenis_cpl', 255);
            $table->bigInteger('id_kurikulum')->unsigned();
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
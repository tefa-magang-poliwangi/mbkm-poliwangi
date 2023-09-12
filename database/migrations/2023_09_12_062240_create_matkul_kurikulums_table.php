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
        Schema::create('matkul_kurikulums', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('semester', 255);
            $table->bigInteger('id_matkul')->unsigned();
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
        Schema::dropIfExists('matkul_kurikulums');
    }
};
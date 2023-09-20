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
            $table->id();
            $table->string('semester', 20);
            $table->unsignedBigInteger('id_kurikulum')->nullable(false);
            $table->unsignedBigInteger('id_matkul')->nullable(false);
            $table->foreign('id_kurikulum')->references('id')->on('kurikulums')->onDelete('cascade');
            $table->foreign('id_matkul')->references('id')->on('matkuls')->onDelete('cascade');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_vaccines', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('peserta_id');
            $table->foreign('peserta_id')->references('id')->on('peserta')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->bigInteger('peserta_nik');
            $table->integer('vaccines_id');
            $table->foreign('vaccines_id')->references('id')->on('vaccines')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesert_vaccines');
    }
}

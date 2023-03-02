<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaVaccinationStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_vaccination_status', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('peserta_id');
            $table->foreign('peserta_id')->references('id')->on('peserta')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->bigInteger('peserta_nik');
            $table->integer('vaccination_status_id');
            $table->foreign('vaccination_status_id')->references('id')->on('vaccination_status')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta_vaccination_statuses');
    }
}

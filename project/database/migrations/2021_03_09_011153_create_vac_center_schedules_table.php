<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacCenterSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vac_center_schedules', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('vac_center_id');
            $table->foreign('vac_center_id')->references('id')->on('vac_center')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('schedule_id');
            $table->foreign('schedule_id')->references('id')->on('schedule')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vac_center_schedules');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->integer('id', true)->unique();
            $table->bigInteger('nik')->unique();
            $table->string('password', 255);
            $table->string('first_name', 20);
            $table->string('last_name', 20);
            $table->date('dob');
            $table->string('address', 255);
            $table->integer('contact');
            $table->integer('age');
            $table->timestamps();
            $table->integer('vac_center_id');
            $table->foreign('vac_center_id')->references('id')->on('vac_center')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesertas');
    }
}

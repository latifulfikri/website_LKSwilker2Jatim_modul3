<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('vac_center_id');
            $table->foreign('vac_center_id')->references('id')->on('vac_center')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('vaccines_id');
            $table->foreign('vaccines_id')->references('id')->on('vaccines')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('stock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}

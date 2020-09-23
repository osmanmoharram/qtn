<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rtd_id');
            $table->string('status')->default('new');

            $table->foreign('rtd_id')->references('id')->on('rtds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rfp');
    }
}

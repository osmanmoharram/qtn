<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRtdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rtds', function (Blueprint $table) {
            $table->id();
            $table->date('request_date');
            $table->string('department')->unique();
            $table->string('item_name');
            $table->text('item_description');
            $table->integer('item_quantity');
            $table->unsignedBigInteger('employee_id');
            $table->string('status')->default('new');

            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rtd');
    }
}

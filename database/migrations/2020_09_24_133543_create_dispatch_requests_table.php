<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispatchRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatch_requests', function (Blueprint $table) {
            $table->id();
            $table->date('request_date');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('user_id');
            $table->text('rejected_reason')->nullable();
            $table->enum('status', ['new', 'rejected', 'delivered', 'processing', 'recieved']);
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispatch_requests');
    }
}

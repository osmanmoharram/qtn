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
            $table->increments('id');
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('user_id')->nullable(); // user with role: employee
            $table->date('request_date')->nullable();
            $table->enum('status', ['new', 'delivered', 'rejected', 'processed', 'received'])->default('new');
            $table->string('rejection_reason')->nullable();
            $table->timestamps();

            $table->foreign('department_id', 'fk_dispatch_requests_departments_department_id')->references('id')->on('departments')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign('user_id', 'fk_dispatch_requests_users_user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
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

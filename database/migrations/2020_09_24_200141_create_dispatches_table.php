<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatches', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('employee_id')->nullable();
            $table->date('request_date')->nullable();
            $table->enum('status', ['new', 'delivered', 'rejected', 'processed', 'received'])->default('new');
            $table->string('rejection_reason')->nullable();
            $table->timestamps();

            $table->foreign('department_id', 'fk_dispatches_departments_department_id')->references('id')->on('departments')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign('employee_id', 'fk_dispatches_employees_employee_id')->references('id')->on('employees')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispatches');
    }
}

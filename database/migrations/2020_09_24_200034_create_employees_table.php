<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('branch_id')->nullable();
            $table->boolean('is_branch_manager')->default(false);
            $table->unsignedInteger('department_id')->nullable();
            $table->boolean('is_department_manager')->default(false);
            $table->timestamps();

            $table->foreign('user_id', 'fk_employees_users_user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('branch_id', 'fk_employees_branches_branch_id')->references('id')->on('branches')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign('department_id', 'fk_employees_departments_department_id')->references('id')->on('departments')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}

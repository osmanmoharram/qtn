<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('employee_id')->nullable();
            $table->date('quotation_date')->nullable();
            $table->enum('status', ['pending_approval', 'approved', 'rejected'])->default('pending_approval');
            $table->string('rejection_reason')->nullable();
            $table->unsignedDecimal('tax')->nullable();
            $table->unsignedDecimal('total')->default(0);
            $table->timestamps();

            $table->foreign('supplier_id', 'fk_proposals_suppliers_supplier_id')->references('id')->on('suppliers')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('department_id', 'fk_proposals_departments_department_id')->references('id')->on('departments')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign('employee_id', 'fk_proposals_employees_employee_id')->references('id')->on('employees')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}

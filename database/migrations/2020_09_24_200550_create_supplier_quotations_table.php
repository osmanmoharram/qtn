<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_quotations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('user_id')->nullable(); // user with role: procurement manage
            $table->date('quotation_date')->nullable();
            $table->boolean('require_admin_approval')->default(false);
            $table->enum('status', ['pending_approval', 'approved', 'rejected'])->default('pending_approval');
            $table->string('rejection_reason')->nullable();
            $table->unsignedDecimal('tax')->nullable();
            $table->unsignedDecimal('total')->default(0);
            $table->timestamps();

            $table->foreign('supplier_id', 'fk_supplier_quotations_suppliers_supplier_id')->references('id')->on('suppliers')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('department_id', 'fk_supplier_quotations_departments_department_id')->references('id')->on('departments')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign('user_id', 'fk_supplier_quotations_users_user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_quotations');
    }
}

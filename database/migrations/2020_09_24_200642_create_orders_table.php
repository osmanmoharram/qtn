<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->date('issued_at')->nullable();
            $table->enum('status', ['awaiting', 'online', 'received', 'stored'])->default('awaiting');
            $table->string('payment_receipt')->nullable();
            $table->unsignedDecimal('tax')->nullable();
            $table->timestamps();

            $table->foreign('supplier_id', 'fk_orders_suppliers_supplier_id')->references('id')->on('suppliers')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('employee_id', 'fk_orders_employees_employee_id')->references('id')->on('employees')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

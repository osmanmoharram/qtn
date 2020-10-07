<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('department_id')->nullable();
            $table->date('request_date')->nullable();
            $table->boolean('require_admin_approval')->default(false);
            $table->enum('status', ['new', 'approved', 'rejected'])->default('new');
            $table->string('rejection_reason')->nullable();
            $table->unsignedDecimal('tax')->nullable();
            $table->unsignedInteger('validity')->default(3); // in days
            $table->timestamps();

            $table->foreign('customer_id', 'fk_quotations_customers_customer_id')->references('id')->on('customers')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('department_id', 'fk_quotations_departments_department_id')->references('id')->on('departments')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotations');
    }
}

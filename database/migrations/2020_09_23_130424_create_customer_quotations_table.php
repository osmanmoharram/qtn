<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_quotations', function (Blueprint $table) {
            $table->id();
            $table->date('request_date');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('customer_id');
            $table->text('denied_reason')->nullable();
            $table->integer('tax')->nullable();
            $table->integer('total')->nullable();
            $table->integer('validity')->nullable();
            $table->boolean('require_admin_approval')->default('false');
            $table->enum('status', ['new', 'approved', 'denied']);
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('customer_id')->references('id')->on('customers');
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

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
            $table->id();
            $table->date('request_date');
            $table->string('department')->unique();
            $table->unsignedBigInteger('customer_id');
            $table->string('item_name');
            $table->integer('item_quantity');
            $table->integer('item_price');
            $table->integer('taxes');
            $table->integer('total');
            $table->string('status')->default('pending approval');

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
        Schema::dropIfExists('supplier_quotations');
    }
}

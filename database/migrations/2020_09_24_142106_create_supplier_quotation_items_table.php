<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierQuotationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_quotation_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_quotaion_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('unit_price');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('supplier_quotation_id')->references('id')->on('supplier_qoutations');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_quotation_items');
    }
}

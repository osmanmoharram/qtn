<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierQuotationProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_quotation_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('supplier_quotation_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('quantity')->default(0);
            $table->unsignedDecimal('unit_price')->default(0);
            $table->timestamps();

            $table->foreign('supplier_quotation_id', 'fk_products_supplier_quotations_supplier_quotation_id')->references('id')->on('supplier_quotations')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('product_id', 'fk_supplier_quotation_products_products_product_id')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_quotation_products');
    }
}

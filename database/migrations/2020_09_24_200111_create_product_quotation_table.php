<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_quotation', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('quotation_id');
            $table->unsignedInteger('quantity')->default(0);
            $table->unsignedDecimal('unit_price')->default(0);
            $table->timestamps();

            $table->primary(['product_id', 'quotation_id']);

            $table->foreign('product_id', 'fk_quotation_products_products_product_id')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('quotation_id', 'fk_quotation_products_quotations_quotation_id')->references('id')->on('quotations')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_quotation');
    }
}

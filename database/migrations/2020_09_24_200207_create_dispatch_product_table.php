<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispatchProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatch_product', function (Blueprint $table) {
            $table->unsignedInteger('dispatch_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('quantity')->default(0);
            $table->timestamps();

            $table->primary(['dispatch_id', 'product_id']);

            $table->foreign('dispatch_id', 'fk_dispatch_product_dispatches_dispatch_id')->references('id')->on('dispatches')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('product_id', 'fk_dispatch_product_products_product_id')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispatch_product');
    }
}

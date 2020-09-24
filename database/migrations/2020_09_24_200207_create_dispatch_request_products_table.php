<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispatchRequestProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatch_request_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dispatch_request_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('quantity')->default(0);
            $table->timestamps();

            $table->foreign('dispatch_request_id', 'fk_products_dispatch_requests_dispatch_request_id')->references('id')->on('dispatch_requests')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('product_id', 'fk_products_products_product_id')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispatch_request_products');
    }
}

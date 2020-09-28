<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_request', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('request_id');
            $table->unsignedInteger('quantity')->default(0);
            $table->timestamps();

            $table->primary(['product_id', 'request_id']);

            $table->foreign('product_id', 'fk_product_request_products_product_id')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('request_id', 'fk_product_request_requests_request_id')->references('id')->on('requests')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_request');
    }
}

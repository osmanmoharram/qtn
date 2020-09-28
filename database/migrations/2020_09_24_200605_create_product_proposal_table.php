<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductProposalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_proposal', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('proposal_id');
            $table->unsignedInteger('quantity')->default(0);
            $table->unsignedDecimal('unit_price')->default(0);
            $table->timestamps();

            $table->primary(['product_id', 'proposal_id']);

            $table->foreign('product_id', 'fk_product_proposal_products_product_id')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('proposal_id', 'fk_product_proposal_proposals_proposal_id')->references('id')->on('proposals')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_proposal');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('user_id')->nullable(); // user with role: procurement manage
            $table->date('issued_at')->nullable();
            $table->enum('status', ['awaiting', 'online', 'received', 'stored'])->default('awaiting');
            $table->string('payment_receipt')->nullable();
            $table->unsignedDecimal('tax')->nullable();
            $table->unsignedDecimal('total')->default(0);
            $table->timestamps();

            $table->foreign('supplier_id', 'fk_purchase_orders_suppliers_supplier_id')->references('id')->on('suppliers')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('user_id', 'fk_purchase_orders_users_user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_orders');
    }
}

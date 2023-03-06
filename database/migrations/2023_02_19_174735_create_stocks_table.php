<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('sku')->unique();
            $table->uuid('supplier_id');
            $table->uuid('item_id');
            $table->unsignedDouble('quantity', 10, 2)->default(0.00);
            $table->unsignedDouble('free_issue_quantity', 10, 2)->default(0.00);
            $table->unsignedDouble('unit_stock_price', 10, 2)->default(0.00);
            $table->unsignedDouble('lot_stock_price', 10, 2)->default(0.00);
            $table->string('batch_number')->nullable();
            $table->unsignedDouble('unit_sale_price', 10, 2)->default(0.00);
            $table->unsignedDouble('unit_discount_rate', 10, 2)->default(0.00);
            $table->uuid('order_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->dropForeign(['supplier_id']);
            $table->dropForeign(['item_id']);
            $table->dropForeign(['order_id']);
        });
        Schema::dropIfExists('stocks');
    }
};

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
            $table->uuid('item_id');
            $table->unsignedDouble('quantity', 10, 2)->default(0.00);
            $table->unsignedDouble('free_issue_quantity', 10, 2)->default(0.00);
            $table->unsignedDecimal('unit_stock_price', 10, 2)->default(0.00);
            $table->unsignedDecimal('lot_stock_price', 10, 2)->default(0.00);
            $table->unsignedInteger('batch_number')->default(1);
            $table->unsignedDecimal('unit_sale_price', 10, 2)->default(0.00);
            $table->unsignedDecimal('unit_discount_rate', 10, 2)->default(0.00);
            $table->uuid('goods_receiving_item_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('goods_receiving_item_id')->references('id')->on('goods_receiving_items');
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
            $table->dropForeign(['item_id']);
            $table->dropForeign(['goods_receiving_item_id']);
        });
        Schema::dropIfExists('stocks');
    }
};

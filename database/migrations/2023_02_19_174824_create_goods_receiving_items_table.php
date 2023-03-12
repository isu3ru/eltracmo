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
        Schema::create('goods_receiving_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('goods_receiving_id');
            $table->uuid('order_item_id');
            $table->unsignedDouble('free_issue_quantity', 10, 2)->default(0.00);
            $table->unsignedDouble('unit_cost', 10, 2)->default(0.00);
            $table->unsignedDouble('total_cost', 10, 2)->default(0.00);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('goods_receiving_id')->references('id')->on('goods_receivings');
            $table->foreign('order_item_id')->references('id')->on('order_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods_receiving_items', function (Blueprint $table) {
            $table->dropForeign(['goods_receiving_id']);
            $table->dropForeign(['order_item_id']);
        });
        Schema::dropIfExists('goods_receiving_items');
    }
};

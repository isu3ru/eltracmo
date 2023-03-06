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
        Schema::create('goods_issuing_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('goods_issuing_id');
            $table->uuid('stock_id');
            $table->unsignedDouble('quantity');
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('goods_issuing_id')->references('id')->on('goods_issuings');
            $table->foreign('stock_id')->references('id')->on('stocks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods_issuing_items', function (Blueprint $table) {
            $table->dropForeign(['goods_issuing_id']);
            $table->dropForeign(['stock_id']);
        });
        Schema::dropIfExists('goods_issuing_items');
    }
};

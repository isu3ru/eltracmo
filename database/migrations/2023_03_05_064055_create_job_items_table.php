<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('job_id');
            $table->uuid('item_id');
            $table->timestamp('received_at')->nullable();
            $table->boolean('is_stock_item')->default(false);
            $table->uuid('stock_id')->nullable();
            $table->unsignedDouble('quantity')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('stock_id')->references('id')->on('stocks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_items', function (Blueprint $table) {
            $table->dropForeign(['job_id']);
            $table->dropForeign(['item_id']);
            $table->dropForeign(['stock_id']);
        });
        Schema::dropIfExists('job_items');
    }
};

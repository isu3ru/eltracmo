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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('invoice_id');
            $table->string('type'); //job, item, stock, etc
            $table->uuid('job_id')->nullable();
            $table->uuid('item_id')->nullable();
            $table->string('description');
            $table->unsignedDouble('amount');
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->dropForeign(['invoice_id']);
            $table->dropForeign(['job_id']);
            $table->dropForeign(['item_id']);
        });
        Schema::dropIfExists('invoice_items');
    }
};

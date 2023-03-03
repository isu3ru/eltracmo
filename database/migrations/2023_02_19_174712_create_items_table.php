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
        Schema::create('items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('color')->nullable();
            $table->double('weight')->default(0.0);
            $table->double('height')->default(0.0);
            $table->double('length')->default(0.0);
            $table->uuid('unit_of_measure_id')->nullable();
            $table->uuid('calculation_unit_id')->nullable();
            $table->decimal('unit_price', 10, 2)->default(0.00);
            $table->double('reorder_qty')->default(0.0);
            $table->timestamps();

            $table->foreign('unit_of_measure_id')->references('id')->on('unit_of_measures');
            $table->foreign('calculation_unit_id')->references('id')->on('calculation_units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign(['unit_of_measure_id']);
            $table->dropForeign(['calculation_unit_id']);
        });
        Schema::dropIfExists('items');
    }
};

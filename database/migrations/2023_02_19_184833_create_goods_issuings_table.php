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
        Schema::create('goods_issuings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('job_id')->nullable();
            $table->string('status');
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('job_id')->references('id')->on('jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods_issuings', function (Blueprint $table) {
            $table->dropForeign(['job_id']);
        });
        Schema::dropIfExists('goods_issuings');
    }
};

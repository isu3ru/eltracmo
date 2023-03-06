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
        Schema::create('job_employees', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('job_id');
            $table->uuid('employee_id');
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_employees', function (Blueprint $table) {
            $table->dropForeign(['job_id']);
            $table->dropForeign(['employee_id']);
        });
        Schema::dropIfExists('job_employees');
    }
};

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
        Schema::create('job_tasks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('job_id');
            $table->uuid('task_id');
            $table->string('status');
            $table->string('remarks')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->uuid('completed_by_user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('completed_by_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_tasks', function (Blueprint $table) {
            $table->dropForeign(['job_id']);
            $table->dropForeign(['task_id']);
            $table->dropForeign(['completed_by_user_id']);
        });
        Schema::dropIfExists('job_tasks');
    }
};

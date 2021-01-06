<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id')->nullable();

            $table->string('title')->nullable();
            $table->string('skills')->nullable();
            $table->string('budget')->nullable();
            $table->string('level')->nullable();
            $table->string('status')->nullable();
            $table->string('posted')->nullable();
            $table->string('time')->nullable();

            $table->text('job_attachment')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}

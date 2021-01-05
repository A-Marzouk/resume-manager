<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->nullable();
            $table->integer('work_history_id')->nullable();
            $table->integer('order')->nullable();

            $table->string('projectName')->nullable();
            $table->string('isActive')->nullable();
            $table->string('link')->nullable();

            $table->longText('projectDesc')->nullable();
            $table->text('images')->nullable();
            $table->text('mainImage')->nullable();

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
        Schema::dropIfExists('projects');
    }
}

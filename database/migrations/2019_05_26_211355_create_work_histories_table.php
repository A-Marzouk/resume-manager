<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_histories', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->text('company')->nullable();
            $table->text('job_title')->nullable();
            $table->longText('job_description')->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->boolean('is_currently_working')->default(false);
            $table->integer('user_id')->unsigned()->index();

            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('work_histories');
    }
}

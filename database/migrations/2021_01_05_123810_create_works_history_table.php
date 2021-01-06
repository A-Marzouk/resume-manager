<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works_history', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->nullable();

            $table->text('company')->nullable();
            $table->text('job_title')->nullable();
            $table->text('job_description')->nullable();
            $table->text('date_from')->nullable();
            $table->text('date_to')->nullable();
            $table->text('currently_working')->nullable();


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
        Schema::dropIfExists('works_history');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->increments('id');

            $table->text('log_text')->nullable();
            $table->tinyInteger('status')->unsigned()->index();

            $table->integer('agent_id')->unsigned()->index();
            $table->integer('campaign_id')->unsigned()->index()->nullable();

            $table->foreign('agent_id')->references('id')->on('agents');
            $table->foreign('campaign_id')->references('id')->on('campaigns');

            $table->timestamps();
        });

        Schema::create('activity_logs_history', function (Blueprint $table) {
            $table->increments('id');

            $table->text('log_text')->nullable();
            $table->tinyInteger('status')->unsigned()->index();

            $table->integer('activity_log_id')->unsigned()->index();

            $table->foreign('activity_log_id')->references('id')->on('activity_logs');
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
        Schema::dropIfExists('activity_logs');
        Schema::dropIfExists('activity_logs_history');
    }
}

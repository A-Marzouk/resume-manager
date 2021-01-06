<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_services', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('campaign_brief_id')->nullable();
            $table->integer('hourly_rate')->nullable();
            $table->integer('hours')->nullable();
            $table->integer('number_of_agents')->nullable();

            $table->string('service_required')->nullable();
            $table->string('language')->nullable();
            $table->string('agent_location')->nullable();

            $table->text('agent_experience')->nullable();

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
        Schema::dropIfExists('campaign_services');
    }
}

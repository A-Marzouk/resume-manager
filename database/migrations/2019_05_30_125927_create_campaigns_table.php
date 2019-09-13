<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->longText('process_flow')->nullable();
            $table->integer('status');
            $table->integer('client_id')->unsigned()->index();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->timestamps();
        });

        Schema::create('agent_campaign', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->tinyInteger('status')->nullable();

            $table->integer('agent_id')->unsigned()->index();
            $table->integer('campaign_id')->unsigned()->index();

            $table->foreign('agent_id')->references('id')->on('agents');
            $table->foreign('campaign_id')->references('id')->on('campaigns');


            $table->timestamps();
        });

        Schema::create('campaign_services', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->decimal('hourly_rate', 16, 4)->nullable();
            $table->decimal('hours', 3, 2)->nullable();
            $table->string('agent_country')->nullable();
            $table->integer('service_id')->unsigned()->index();
            $table->integer('campaign_id')->unsigned()->index();

            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('campaign_id')->references('id')->on('campaigns');

            $table->timestamps();
        });

        Schema::create('campaign_service_language', function (Blueprint $table) {
            $table->integer('campaign_service_id')->unsigned()->index();
            $table->integer('language_id')->unsigned()->index();

            $table->foreign('campaign_service_id')->references('id')->on('campaign_services');
            $table->foreign('language_id')->references('id')->on('languages');

            $table->primary(['campaign_service_id', 'language_id'], 'campaign_service_language_campaign_service');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaign_service_language');
        Schema::dropIfExists('campaign_services');
        Schema::dropIfExists('campaign_user');
        Schema::dropIfExists('campaigns');
    }
}

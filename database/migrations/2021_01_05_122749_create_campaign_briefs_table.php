<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignBriefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_briefs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id')->nullable();
            $table->integer('hours_per_week')->nullable();
            $table->integer('weekly_rate')->nullable();

            $table->string('company_website')->nullable();
            $table->string('client_name')->nullable();
            $table->string('estimated_duration')->nullable();
            $table->string('time_needed')->nullable();
            $table->string('contract_terms')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('campaign_manager')->nullable();
            $table->string('report_requirement')->nullable();

            $table->text('client_contact')->nullable();
            $table->text('objective')->nullable();
            $table->text('company_values')->nullable();
            $table->text('email_pitch')->nullable();
            $table->text('phone_pitch')->nullable();
            $table->text('data_systems')->nullable();
            $table->text('time_zone')->nullable();

            $table->date('start_date')->nullable();

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
        Schema::dropIfExists('campaign_briefs');
    }
}

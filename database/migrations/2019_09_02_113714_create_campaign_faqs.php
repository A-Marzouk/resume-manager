<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignFaqs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('question')->nullable();
            $table->text('answer')->nullable();
            $table->integer('campaign_id')->unsigned()->index()->nullable();

            $table->integer('approved')->nullable();
            $table->foreign('campaign_id')->references('id')->on('campaigns');
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
        Schema::dropIfExists('campaign_faqs');
    }
}

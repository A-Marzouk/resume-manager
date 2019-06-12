<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->text('objective')->nullable();
            $table->text('company_values')->nullable();
            $table->text('email_pitch')->nullable();
            $table->text('phone_pitch')->nullable();
            $table->text('data_systems')->nullable();

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

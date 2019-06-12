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
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('status');
            $table->integer('client_id')->unsigned()->index();

            $table->foreign('client_id')->references('id')->on('clients');

            $table->timestamps();
        });

        Schema::create('campaign_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->integer('campaign_id')->unsigned()->index();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('campaign_id')->references('id')->on('campaigns');

            $table->primary(['user_id', 'campaign_id']);

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
        Schema::dropIfExists('campaign_user');
        Schema::dropIfExists('campaigns');
    }
}

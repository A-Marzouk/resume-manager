<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->decimal('amount_paid', 16, 2)->nullable();
            $table->decimal('hours_per_week', 16, 0)->unsigned()->nullable();
            $table->decimal('hourly_rate', 16, 2)->unsigned()->nullable();
            $table->tinyInteger('duration_in_weeks')->unsigned()->nullable()->index();
            $table->tinyInteger('original_duration_in_weeks')->unsigned()->nullable()->index();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->timestamp('invoice_generated_at')->nullable();
            $table->string('booking_email')->nullable();
            $table->string('payment_gateway_subscription_id')->nullable();


            $table->integer('client_id')->unsigned()->nullable()->index();
            $table->integer('agent_id')->unsigned()->nullable()->index();
            $table->integer('campaign_id')->unsigned()->nullable()->index();

            $table->foreign('agent_id')->references('id')->on('agents');
            $table->foreign('client_id')->references('id')->on('clients');

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
        Schema::dropIfExists('subscriptions');
    }
}

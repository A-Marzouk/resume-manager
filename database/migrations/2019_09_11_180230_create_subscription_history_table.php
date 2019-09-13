<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions_updates_history', function (Blueprint $table) {
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
            $table->timestamp('applied_at')->nullable();


            $table->integer('client_id')->unsigned()->nullable()->index();
            $table->integer('agent_id')->unsigned()->nullable()->index();
            $table->integer('campaign_id')->unsigned()->nullable()->index();
            $table->integer('subscription_id')->unsigned()->nullable()->index();

            $table->foreign('agent_id')->references('id')->on('agents');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('subscription_id')->references('id')->on('subscriptions');

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
        Schema::dropIfExists('subscriptions_updates_history');
    }
}

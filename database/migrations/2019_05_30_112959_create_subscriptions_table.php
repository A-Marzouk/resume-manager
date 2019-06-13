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

            $table->decimal('amount_paid', 16, 4)->nullable();
            $table->decimal('hours_per_week', 3, 2)->unsigned()->nullable();
            $table->tinyInteger('duration_in_weeks')->unsigned()->index();
            $table->tinyInteger('original_duration_in_weeks')->unsigned()->index();
            $table->timestamp('canceled_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->string('booking_email')->nullable();
            $table->string('payment_gateway_subscription_id')->nullable();
            $table->integer('invoice_id')->unsigned()->index();
            $table->integer('client_id')->unsigned()->index();

            $table->foreign('invoice_id')->references('id')->on('invoices');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->string('identifier');
            $table->decimal('total', 16, 2);
            $table->decimal('discount', 16, 2)->nullable();
            $table->integer('hours')->nullable();
            $table->decimal('rate', 16, 2)->nullable();
            $table->text('notes')->nullable();
            $table->text('service_title')->nullable();
            $table->tinyInteger('status')->nullable();

            $table->integer('client_id')->unsigned()->index();
            $table->integer('currency_id')->unsigned()->index();
            $table->integer('subscription_id')->unsigned()->index();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('subscription_id')->references('id')->on('subscriptions');

            $table->timestamps();
        });

        Schema::create('invoice_service', function (Blueprint $table) {
            $table->decimal('hourly_rate', 16, 4)->nullable();
            $table->decimal('hours', 3, 2)->nullable();
            $table->decimal('total', 16, 4)->nullable();
            $table->integer('timezone')->unsigned()->index();
            $table->date('week_date');
            $table->text('week_days');
            $table->integer('service_id')->unsigned()->index();
            $table->integer('invoice_id')->unsigned()->index();
            $table->integer('agent_id')->unsigned()->index();

            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('agent_id')->references('id')->on('agents');

            $table->primary(['service_id', 'invoice_id']);

            $table->timestamps();
        });

        Schema::create('invoice_payment_method', function (Blueprint $table) {
            $table->integer('payment_method_id')->unsigned()->index();
            $table->integer('invoice_id')->unsigned()->index();

            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->foreign('invoice_id')->references('id')->on('invoices');

            $table->primary(['payment_method_id', 'invoice_id']);

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
        Schema::dropIfExists('invoice_payment_method');
        Schema::dropIfExists('invoice_service');
        Schema::dropIfExists('invoices');
    }
}

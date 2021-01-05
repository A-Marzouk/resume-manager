<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStripeInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stripe_invoices', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id')->nullable();
            $table->integer('price')->nullable();
            $table->integer('hours')->nullable();
            $table->integer('count')->nullable();

            $table->string('title')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('subscription_id')->nullable();
            $table->string('subscription_type')->nullable();
            $table->string('payer_email')->nullable();

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
        Schema::dropIfExists('stripe_invoices');
    }
}

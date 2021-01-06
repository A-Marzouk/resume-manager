<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaypalInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paypal_invoices', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('recurring_id')->nullable();
            $table->string('payer_email')->nullable();

            $table->integer('weeks')->nullable();
            $table->integer('count')->nullable();

            $table->double('price')->nullable();

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
        Schema::dropIfExists('paypal_invoices');
    }
}

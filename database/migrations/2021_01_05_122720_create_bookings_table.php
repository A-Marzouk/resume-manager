<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('invoice_id')->nullable();
            $table->integer('weeks')->nullable();
            $table->integer('weeks_original')->nullable();
            $table->integer('is_paid')->nullable();
            $table->string('amount_paid')->nullable();
            $table->string('hours')->nullable();
            $table->string('canceled')->nullable();
            $table->string('booking_email')->nullable();
            $table->string('subscription_id')->nullable();
            $table->string('finished')->nullable();
            $table->string('payment_method')->nullable();

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
        Schema::dropIfExists('bookings');
    }
}

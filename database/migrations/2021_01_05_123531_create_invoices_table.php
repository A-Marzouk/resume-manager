<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->integer('user_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('booking_id')->nullable();
            $table->integer('campaign_brief_id')->nullable();

            $table->string('year')->nullable();
            $table->string('week')->nullable();
            $table->string('unique_number')->nullable();
            $table->string('agentName')->nullable();
            $table->string('rate')->nullable();
            $table->string('status')->nullable();
            $table->string('timeZone')->nullable();
            $table->string('currency')->nullable();
            $table->string('weekDate')->nullable();
            $table->string('payment_options')->nullable();

            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();

            $table->decimal('hours',16,2)->nullable();
            $table->decimal('total_amount',16,2)->nullable();

            $table->text('days')->nullable();
            $table->text('service')->nullable();
            $table->text('time_of_service')->nullable();
            $table->text('notes')->nullable();

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
        Schema::dropIfExists('invoices');
    }
}

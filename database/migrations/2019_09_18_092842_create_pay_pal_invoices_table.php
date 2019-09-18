<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayPalInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_pal_invoices', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->nullable();
            $table->decimal('price',16,2)->nullable();
            $table->string('payment_status')->nullable();
            $table->string('recurring_id')->nullable();
            $table->string('payer_email')->nullable();
            $table->integer('weeks')->nullable();
            $table->integer('count')->nullable();

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
        Schema::dropIfExists('pay_pal_invoices');
    }
}

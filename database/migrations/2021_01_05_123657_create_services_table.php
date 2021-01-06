<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->nullable();
            $table->integer('invoice_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('rate')->nullable();
            $table->integer('hours')->nullable();
            $table->integer('total_price')->nullable();

            $table->string('week')->nullable();
            $table->string('title')->nullable();
            $table->string('weekDate')->nullable();
            $table->string('timeZone')->nullable();
            $table->string('days')->nullable();



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
        Schema::dropIfExists('services');
    }
}

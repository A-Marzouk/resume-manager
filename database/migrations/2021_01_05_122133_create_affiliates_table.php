<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliates', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('remember_token')->nullable();
            $table->string('agree_with_terms')->nullable();
            $table->string('code')->nullable();
            $table->string('paypal_email')->nullable();
            $table->string('photo')->nullable();
            $table->string('password')->nullable();


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
        Schema::dropIfExists('affiliates');
    }
}

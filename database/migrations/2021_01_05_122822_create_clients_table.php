<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('owner_id')->nullable();
            $table->integer('affiliate_id')->nullable();

            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('agency')->nullable();
            $table->string('contact')->nullable();
            $table->string('phone')->nullable();
            $table->string('agree_with_terms')->nullable();
            $table->string('timeZone')->nullable();
            $table->string('email')->nullable();
            $table->string('emailDept')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('firstName')->nullable();

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
        Schema::dropIfExists('clients');
    }
}

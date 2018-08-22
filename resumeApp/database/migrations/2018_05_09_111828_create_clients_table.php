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
            $table->string('search_id')->nullable();
            $table->string('name')->nullable();
            $table->string('agency')->nullable();
            $table->string('contact')->nullable();
            $table->string('phone')->nullable();
            $table->string('agree_with_terms')->nullable();
            $table->string('timeZone')->nullable();
            $table->string('email')->unique();
            $table->string('emailDept')->unique()->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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

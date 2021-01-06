<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('email')->nullable();
            $table->string('username')->nullable();
            $table->string('profession')->nullable();
            $table->string('password')->nullable();
            $table->string('admin')->nullable();
            $table->string('token')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('skype')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('cv_src')->nullable();
            $table->string('phone')->nullable();
            $table->string('status')->nullable();
            $table->string('is_shaded')->nullable();
            $table->string('stage')->nullable();
            $table->string('has_agreed')->nullable();

            $table->integer('owner_id')->nullable();
            $table->integer('affiliate_id')->nullable();


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
        Schema::dropIfExists('users');
    }
}

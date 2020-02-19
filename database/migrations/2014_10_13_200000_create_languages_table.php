<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->string('name')->unique()->nullable();
            $table->string('label');

            $table->timestamps();
        });

        Schema::create('language_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->integer('language_id')->unsigned()->index();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('language_id')->references('id')->on('languages');

            $table->primary(['user_id', 'language_id']);

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
        Schema::dropIfExists('language_user');
        Schema::dropIfExists('languages');
    }
}

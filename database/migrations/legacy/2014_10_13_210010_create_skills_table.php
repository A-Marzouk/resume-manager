<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique()->nullable();
            $table->string('label')->nullable();
            $table->integer('skill_type_id')->unsigned()->index();

            $table->foreign('skill_type_id')->references('id')->on('skill_types');

            $table->timestamps();
        });

        Schema::create('skill_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->integer('skill_id')->unsigned()->index();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('skill_id')->references('id')->on('skills');

            $table->primary(['user_id', 'skill_id']);

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
        Schema::dropIfExists('skill_user');
        Schema::dropIfExists('skills');
    }
}

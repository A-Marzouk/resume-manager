<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->date('birth_date');
            $table->string('city');
            $table->string('nationality');
            $table->text('languages');
            $table->text('design_styles');
            $table->string('photo');
            $table->text('trainings');
            $table->text('works');
            $table->string('design_skills');
            $table->string('professional_attributes');
            $table->string('personal_interests');
            $table->string('audio');
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
        Schema::dropIfExists('user_datas');
    }
}

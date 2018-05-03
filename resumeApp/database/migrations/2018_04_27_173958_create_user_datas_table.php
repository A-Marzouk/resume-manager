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
            $table->integer('user_id');
            $table->string('email');
            $table->date('birth_date');
            $table->string('city');
            $table->string('nationality');
            $table->string('design_skills_checkbox');
            $table->text('languages');
            $table->text('design_styles');
            $table->string('photo');
            $table->text('trainings');
            $table->text('works');
            $table->string('jobTitle');
            $table->text('intro');
            $table->string('githubLink');
            $table->string('stackoverflowLink');
            $table->text('googleCalendar');
            $table->string('design_skills');
            $table->string('professional_attributes');
            $table->string('personal_interests');
            $table->string('audio');
            $table->longText('careerObjective');
            $table->string('workForceAgent');
            $table->string('availableHours');
            $table->string('preferredTime');
            $table->string('surname');
            $table->string('salary');
            $table->string('currency');
            $table->text('education');
            $table->text('workExperience');
            $table->text('primarySkills');
            $table->text('charSkills');
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

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
            $table->string('name')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('email')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('city')->nullable();
            $table->string('nationality')->nullable();
            $table->string('design_skills_checkbox')->nullable();
            $table->text('languages')->nullable();
            $table->text('design_styles')->nullable();
            $table->string('photo')->nullable();
            $table->text('trainings')->nullable();
            $table->text('works')->nullable();
            $table->string('jobTitle')->nullable();
            $table->text('intro')->nullable();
            $table->string('githubLink')->nullable();
            $table->string('behanceLink')->nullable();
            $table->string('instagramLink')->nullable();
            $table->string('dribbleLink')->nullable();
            $table->string('stackoverflowLink')->nullable();
            $table->string('freeDate')->nullable();
            $table->string('personalSite')->nullable();
            $table->text('googleCalendar')->nullable();
            $table->string('design_skills')->nullable();
            $table->string('professional_attributes')->nullable();
            $table->string('personal_interests')->nullable();
            $table->string('audio')->nullable();
            $table->longText('careerObjective')->nullable();
            $table->string('workForceAgent')->nullable();
            $table->string('availableHours')->nullable();
            $table->string('preferredTime')->nullable();
            $table->string('surname')->nullable();
            $table->string('salary')->nullable();
            $table->string('currency')->nullable();
            $table->text('education')->nullable();
            $table->text('workExperience')->nullable();
            $table->text('primarySkills')->nullable();
            $table->text('charSkills')->nullable();
            $table->string('terms')->nullable();
            $table->string('MondayHours')->nullable();
            $table->string('TuesdayHours')->nullable();
            $table->string('WednesdayHours')->nullable();
            $table->string('ThursdayHours')->nullable();
            $table->string('FridayHours')->nullable();
            $table->string('SaturdayHours')->nullable();
            $table->string('SundayHours')->nullable();
            $table->text('workDesc1')->nullable();
            $table->text('workDesc2')->nullable();
            $table->text('workDesc3')->nullable();
            $table->text('workDesc4')->nullable();
            $table->text('workDesc5')->nullable();
            $table->text('workDesc6')->nullable();
            $table->text('workDesc7')->nullable();
            $table->text('workDesc0')->nullable();
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

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

            $table->integer('user_id')->nullable();

            $table->string('name')->nullable();
            $table->string('email')->nullable();

            $table->string('city')->nullable();
            $table->string('nationality')->nullable();
            $table->string('design_skills_checkbox')->nullable();
            $table->string('photo')->nullable();
            $table->string('jobTitle')->nullable();
            $table->string('githubLink')->nullable();
            $table->string('behanceLink')->nullable();
            $table->string('instagramLink')->nullable();
            $table->string('stackoverflowLink')->nullable();
            $table->string('freeDate')->nullable();
            $table->string('personalSite')->nullable();
            $table->string('dribbleLink')->nullable();
            $table->string('design_skills')->nullable();
            $table->string('professional_attributes')->nullable();
            $table->string('personal_interests')->nullable();
            $table->string('audio')->nullable();
            $table->text('careerObjective')->nullable();
            $table->string('workForceAgent')->nullable();
            $table->string('availableHours')->nullable();
            $table->string('preferredTime')->nullable();
            $table->string('surname')->nullable();
            $table->string('salary')->nullable();
            $table->string('currency')->nullable();
            $table->string('terms')->nullable();
            $table->string('home_page_freelancer')->nullable();

            $table->text('languages')->nullable();
            $table->text('design_styles')->nullable();
            $table->text('intro')->nullable();
            $table->text('googleCalendar')->nullable();
            $table->text('education')->nullable();
            $table->text('workExperience')->nullable();
            $table->text('primarySkills')->nullable();
            $table->text('charSkills')->nullable();
            $table->text('skype_id')->nullable();
            $table->text('telephone')->nullable();
            $table->text('social_apps')->nullable();
            $table->text('salary_month')->nullable();
            $table->text('approved')->nullable();
            $table->text('country')->nullable();
            $table->text('audio_transcript')->nullable();
            $table->text('whatsapp')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('telegram')->nullable();

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

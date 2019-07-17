<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('skype')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('phone')->nullable();
            $table->string('paypal_email')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('nationality')->nullable();
            $table->longText('design_styles')->nullable();
            $table->text('trainings')->nullable();
            $table->string('job_title')->nullable();
            $table->text('intro')->nullable();
            $table->string('github')->nullable();
            $table->string('behance')->nullable();
            $table->string('instagram')->nullable();
            $table->string('dribble')->nullable();
            $table->string('stackoverflow')->nullable();
            $table->date('free_date')->nullable();
            $table->string('website')->nullable();
            $table->string('google_calendar')->nullable();
            $table->text('professional_attributes')->nullable();
            $table->text('personal_interests')->nullable();
            $table->longText('career_objective')->nullable();
            $table->decimal('available_hours_per_week', 3, 2)->unsigned()->nullable();
            $table->time('preferred_time')->nullable();
            $table->char('gender', 1)->nullable()->default('f');
            $table->text('education')->nullable();
            $table->text('primary_skills')->nullable();
            $table->text('char_skills')->nullable();
            $table->text('video_url')->nullable();
            $table->integer('timezone')->unsigned()->index()->nullable();
            $table->longText('future_plan')->nullable();
            $table->decimal('monthly_salary', 16, 4)->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->longText('audio_transcription')->nullable();
            $table->boolean('is_homepage_visible')->default(false);
            $table->timestamp('agreed_with_terms_at')->nullable();
            $table->text('avatar')->nullable();
            $table->integer('paypal_acc_number')->nullable();

            // $table->string('address_line_1')->nullable();
            // $table->string('address_line_2')->nullable();
            // $table->string('municipality')->nullable();
            // $table->string('neighborhood')->nullable();
            // $table->string('zip_code')->nullable();
            // $table->string('country_code')->nullable();

            $table->integer('user_id')->unsigned()->index();
            $table->integer('profession_id')->unsigned()->index()->nullable();
            $table->integer('currency_id')->unsigned()->index()->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('profession_id')->references('id')->on('professions');
            $table->foreign('currency_id')->references('id')->on('currencies');

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

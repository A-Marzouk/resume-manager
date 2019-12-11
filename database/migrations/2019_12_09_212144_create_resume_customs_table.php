<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumeCustomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume_customs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('background_color')->nullable();
            $table->integer('agent_id')->nullable();
            // active or not active
            $table->tinyInteger('is_weekly_rate_active')->default(1);
            $table->tinyInteger('is_available_hours_active')->default(1);
            $table->tinyInteger('is_audio_interview_active')->default(1);
            $table->tinyInteger('is_video_interview_active')->default(1);
            $table->tinyInteger('is_hire_me_active')->default(1);
            $table->tinyInteger('is_chat_with_me_active')->default(1);

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
        Schema::dropIfExists('resume_customs');
    }
}

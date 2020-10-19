<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('job_title');
            $table->text('company');
            $table->longText('job_description');
            $table->text('date_from');
            $table->text('date_to');
            $table->text('currently_working');
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
        Schema::dropIfExists('works_history');
    }
}

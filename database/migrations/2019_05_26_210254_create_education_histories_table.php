<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_histories', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->text('school_title')->nullable();
            $table->text('description')->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->tinyInteger('type')->unsigned()->index()->nullable();
            $table->boolean('is_currently_learning')->default(false);
            $table->integer('user_id')->unsigned()->index();

            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('education_histories');
    }
}

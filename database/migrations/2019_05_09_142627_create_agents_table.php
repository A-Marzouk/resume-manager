<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            // $table->integer('number')->unsigned();
            $table->decimal('hourly_rate', 16, 4)->nullable();
            $table->decimal('available_hours_per_week', 3, 2)->unsigned()->nullable();
            $table->text('experience')->nullable();
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
        Schema::dropIfExists('agents');
    }
}

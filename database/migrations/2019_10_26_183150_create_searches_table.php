<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('searches', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title')->nullable();
            $table->integer('client_id')->unsigned()->index()->nullable();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->timestamps();
        });

        Schema::create('agent_search', function (Blueprint $table) {
            $table->integer('agent_id')->unsigned()->index();
            $table->integer('search_id')->unsigned()->index();

            $table->foreign('agent_id')->references('id')->on('agents');
            $table->foreign('search_id')->references('id')->on('searches');

            $table->primary(['agent_id', 'search_id']);
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
        Schema::dropIfExists('agent_search');
        Schema::dropIfExists('searches');
    }
}

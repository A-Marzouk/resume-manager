<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumeTabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume_tabs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('label')->nullable();
            $table->string('type')->nullable();
            $table->string('default_icon_src')->nullable();
            $table->integer('is_active')->default(1);
            $table->integer('view_order')->default(1);
            $table->integer('agent_id')->nullable(1);
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
        Schema::dropIfExists('resume_tabs');
    }
}

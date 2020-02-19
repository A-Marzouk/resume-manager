<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEducationTrainingCols extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_datas', function (Blueprint $table) {
            $table->string('eduTitle1')->nullable();
            $table->string('eduTitle2')->nullable();
            $table->string('eduTitle3')->nullable();
            $table->string('eduYear1')->nullable();
            $table->string('eduYear2')->nullable();
            $table->string('eduYear3')->nullable();
            $table->text('eduDesc1')->nullable();
            $table->text('eduDesc2')->nullable();
            $table->text('eduDesc3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_datas', function (Blueprint $table) {
            Schema::drop('user_datas');
        });
    }
}

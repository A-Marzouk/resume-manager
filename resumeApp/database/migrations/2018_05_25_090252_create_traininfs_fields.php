<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTraininfsFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_datas', function (Blueprint $table) {
            $table->string('trnTitle1')->nullable();
            $table->string('trnTitle2')->nullable();
            $table->string('trnTitle3')->nullable();
            $table->string('trnYear1')->nullable();
            $table->string('trnYear2')->nullable();
            $table->string('trnYear3')->nullable();
            $table->text('trnDesc1')->nullable();
            $table->text('trnDesc2')->nullable();
            $table->text('trnDesc3')->nullable();
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

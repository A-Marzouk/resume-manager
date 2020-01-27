<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('username')->unique();
            $table->string('referral_code')->unique();
            $table->tinyInteger('status')->unsigned()->index();
            $table->timestamp('reviewed_at')->nullable();
            $table->tinyInteger('stage')->unsigned()->index();
            $table->integer('affiliate_percentage')->nullable();
            $table->string('referred_by_code')->nullable();
            $table->string('github_id')->nullable();


            $table->string('timezone')->nullable();
            $table->timestamp('agreed_with_privacy_agreement_at')->nullable();
            $table->timestamp('agreed_with_service_agreement_at')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

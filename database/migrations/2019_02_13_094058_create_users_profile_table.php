<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->unsigned();
            $table->foreign('uid')->references('id')->on('users')->onDelete('cascade');
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->Integer('zipcode')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('management_level')->nullable();
            $table->date('join_date')->nullable();
            $table->string('attach')->nullable();
            $table->string('google')->nullable();
            $table->string('facebook')->nullable();
            $table->string('website')->nullable();
            $table->string('skype')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
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
        Schema::dropIfExists('users_profile');
    }
}

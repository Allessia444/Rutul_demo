<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
               $table->integer('industries_id')->unsigned();
            $table->foreign('industries_id')->references('id')->on('industries')->onDelete('cascade');
            $table->text('name');
             $table->text('logo');

              $table->string('website')->nullable();
               $table->text('email');
                $table->text('phone');
                 $table->text('fax');
                  $table->text('address1');
                   $table->text('address2');
              $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->Integer('zipcode')->nullable();
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
        Schema::dropIfExists('clients');
    }
}

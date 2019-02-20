<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDesignationToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('users', function (Blueprint $table) {
            
             $table->integer('designation_id')->unsigned();
            $table->foreign('designation_id')->references('id')->on('designation')->onDelete('cascade');
              $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('department')->onDelete('cascade');
             $table->tinyInteger('tean_lead');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            //
        });
    }
}

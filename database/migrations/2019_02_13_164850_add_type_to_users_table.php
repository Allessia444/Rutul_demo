<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->string('fname')->after('id'); 
            $table->string('lname')->after('fname');
            $table->enum('role', ['admin', 'user'])->after('mobile_number');
            $table->tinyInteger('status')->after('role');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('department')->onDelete('cascade');
            $table->integer('designation_id')->unsigned();
            $table->foreign('designation_id')->references('id')->on('designation')->onDelete('cascade');
             $table->tinyInteger('team_lead');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn('fname');
              $table->dropColumn('lname');
               $table->dropColumn('role');
                $table->dropColumn('status');

        });
    }
}

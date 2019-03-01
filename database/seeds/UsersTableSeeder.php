<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
    		'fname' => 'admin',
    		'lname' => 'admin',
    		'email' => 'rmthakkar8997@gmail.com',
    		'password' => Hash::make('rutul123'),
    		'mobile_number' => '9876543210',
    		'role' => 'admin',
        	'status' => 1,
             'department_id' => 1,
             'designation_id' => 1,
             'team_lead' => 0,
     ]);

    	DB::table('users')->insert([
    		'fname' => 'rutul',
    		'lname' => 'thakkar',
    		'email' => 'demo@gmail.com',
    		'password' => Hash::make('rutul123'),
    		'mobile_number' => '0123456789',
    		'role' => 'user',
    		'status' => 1,
             'department_id' => 1,
             'designation_id' => 1,
             'team_lead' => 1,
     ]);

        DB::table('users')->insert([
            'fname' => 'rahul',
            'lname' => 'patel',
            'email' => 'rahul@gmail.com',
            'password' => Hash::make('rutul123'),
            'mobile_number' => '0123456789',
            'role' => 'user',
            'status' => 1,
            'department_id' => 1,
            'designation_id' => 1,
            'team_lead' => 0,
        ]);
    }
}

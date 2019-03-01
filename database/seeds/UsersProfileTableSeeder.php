<?php

use Illuminate\Database\Seeder;

class UsersProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_profile')->insert([
    		'uid' => 1,
    		'phone' => '07926608863',
    		'address1' => '55,avani tower',
    		'address2' => '55,avani tower',
    		'phone' => '9876543210',
    		'city' => 'ahmedabad',
    		'state' => 'gujarat',
    		'country' => 'india',
    		'zipcode' => '380015',
    		'gender' => 'male',
    	]);

    	DB::table('users_profile')->insert([
    		'uid' => 2,
    		'phone' => '07926608863',
    		'address1' => '56,avani tower',
    		'address2' => '56,avani tower',
    		'phone' => '9876543210',
    		'city' => 'ahmedabad',
    		'state' => 'gujarat',
    		'country' => 'india',
    		'zipcode' => '380015',
    		'gender' => 'male',
    	]);

        DB::table('users_profile')->insert([
            'uid' => 3,
            'phone' => '07926608863',
            'address1' => '34,avanti tower',
            'address2' => '34,avanti tower',
            'phone' => '9876543210',
            'city' => 'ahmedabad',
            'state' => 'gujarat',
            'country' => 'india',
            'zipcode' => '380015',
            'gender' => 'male',
        ]);
    }
}

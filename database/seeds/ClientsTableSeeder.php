<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
    		'industries_id' => 1,
    		'name' => 'raj',
    		'email' => 'raj@gmail.com',
    		'phone' => '7891234560',
    		'fax' => 'www.',
    		'address1' => '55,rajan tower',
    		'address2' => '55,rajan tower',
    		'city' => 'ahmedabad',
    		'state' => 'gujarat',
    		'country' => 'india',
    		'zipcode' => '380015',

    	]);
    }
}

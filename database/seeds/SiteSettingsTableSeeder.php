<?php

use Illuminate\Database\Seeder;

class SiteSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('site_settings')->insert([
    		'title' => 'Rutul',
    		'email' => 'rmthakkar8997@gmail.com',
    		'phone_1' => '9876543210',
    		'phone_2' => '7891234560',
            'copy_right' => 'rutul@copyright',
            'site_visitors' => '100',

    	]);
    }
}

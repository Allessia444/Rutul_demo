<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('projects')->insert([
    		'users_id' => 2,
    		'name' => 'laravel',
    		'slug' => 'laravel',
    		'confirm_hours' => 120,

    	]);
    }
}

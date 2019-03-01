<?php

use Illuminate\Database\Seeder;

class ProjectCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('project_categories')->insert([
    		
    		'name' => 'php',
    		'slug' => 'php',
    	]);
    }
}

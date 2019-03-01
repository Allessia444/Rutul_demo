<?php

use Illuminate\Database\Seeder;

class TaskCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_categories')->insert([
    		'name' => 'phptask',
    		'slug' => 'phptask',
    	]);
    }
}

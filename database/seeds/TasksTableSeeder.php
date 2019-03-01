<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
    		'task_category_id' => 1,
    		'user_id' => 1,
    		'name' => 'laravel task',
    		'notes' => 'new task',
    		'priority' => 'low',
    		'complete' => 1,
    	]);
    }
}

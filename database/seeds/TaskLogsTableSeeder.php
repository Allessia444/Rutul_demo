<?php

use Illuminate\Database\Seeder;

class TaskLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('task_logs')->insert([
    		'task_id' => 1,
    		'user_id' => 2,
    		'start_time' => '07:00',
    		'end_time' => '19:00',
    		'spent_time' => '12',
    		'description' => 'first task logs',
    		'billable' => 1,

    	]);
    }
}

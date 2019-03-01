<?php

use Illuminate\Database\Seeder;

class TeamLeadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('team_leads')->insert([
    		'team_lead_id' => 2,
    		'member_id' => 3,
    		'department_id' => 1,
    	]);
    }
}

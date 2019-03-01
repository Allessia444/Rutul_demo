<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(DepartmentsTableSeeder::class);
    	$this->call(DesignationsTableSeeder::class);
    	$this->call(UsersTableSeeder::class);
    	$this->call(UsersProfileTableSeeder::class);
    	$this->call(IndustriesTableSeeder::class);
    	$this->call(TaskCategoriesTableSeeder::class);
    	$this->call(ProjectsTableSeeder::class);
    	$this->call(ProjectCategoriesTableSeeder::class);
    	$this->call(ClientsTableSeeder::class);
    	$this->call(BlogCategoriesTableSeeder::class);
    	$this->call(BlogsTableSeeder::class);
    	$this->call(TasksTableSeeder::class);
    	$this->call(TeamLeadsTableSeeder::class);
    	$this->call(TaskLogsTableSeeder::class);
        $this->call(SiteSettingsTableSeeder::class);

    }
}

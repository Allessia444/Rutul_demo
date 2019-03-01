<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
    		'blog_category_id' => 1,
    		'user_id' => 1,
    		'name' => 'laravel blog',
    		'description' => 'new user blog',
    		'status' => 1,
    	]);
    }
}

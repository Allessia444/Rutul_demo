<?php

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_categories')->insert([
    		'name' => 'php',
    		'slug' => 'php',
    		'parent_id' => null,
    	]);
    }
}

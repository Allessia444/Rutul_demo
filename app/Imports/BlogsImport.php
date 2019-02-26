<?php

namespace App\Imports;

use App\Blog;
use Maatwebsite\Excel\Concerns\ToModel;
use Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\BlogCategory;

class BlogsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      $parent_category = null;
      if(BlogCategory::whereNull('parent_id')->where('name','=',$row['parent_category'])->count() >0)
      {
        $parent_category = BlogCategory::where('name','=',$row['parent_category'])->first();
      }
      else
      {
        if($row['parent_category'] != null)
        {
        $parent_category = new BlogCategory();
        $parent_category->name = $row['parent_category'];
        $parent_category->save();
        }
      }

      if(BlogCategory::where('name','=',$row['category'])->count() >0)
      {
        $blog_category = BlogCategory::where('name','=',$row['category'])->first();
      }
      else
      {
        $blog_category = new BlogCategory();
        $blog_category->name = $row['category'];
        if($row['parent_category'] != null)
        {
        $blog_category->parent_id = $parent_category->id;
        }
        $blog_category->save();
      }

      return new Blog([

        'parent_id' => $parent_category->id,
       'blog_category_id' => $blog_category->id,
       'name'    => $row['name'], 
       'description' => $row['description'],
       'user_id' => Auth::user()->id,

     ]);
  }
}

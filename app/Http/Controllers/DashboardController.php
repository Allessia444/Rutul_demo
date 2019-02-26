<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogCategory;
use App\User;
use Illuminate\Support\Facades\Input;

class DashboardController extends Controller
{
       //show blog
    public function blog(Request $request)
    {
       // dd($request->all());
        $id=Input::get('slug');

        $blog_categories = BlogCategory::all();
        if($id!=null)
        {
            $blog_category = BlogCategory::where('slug','=',$id)->first();
            //dd($blog_category);
            $blogs = Blog::where('blog_category_id','=',$blog_category->id)->get();
        }
        else
        {
            $blogs = Blog::all();
        }

        return view('blog',compact('blogs','blog_categories'));
    }
    public function blog_detail($id)
    {
        $blog = Blog::find($id);
        return view('blog-detail',compact('blog')); 
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class DashboardController extends Controller
{
    //
       //show blog
    public function blog()
    {
        $blogs = Blog::all();
        return view('layouts.blog',compact('blogs'));
    }

     public function blog_detail($id)
    {

    	
        $blog = Blog::find($id);
    	return view('layouts.blog-detail',compact('blog')); 
    }
   
}

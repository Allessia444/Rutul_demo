<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\BlogCategory;
use Validator;
use Former;
use Auth;

class BlogsController extends Controller
{

    //List all the blogs
  public function index()
  {
    $blogs = Blog::all();
    return view('admin.blogs.index',compact('blogs'));
  }

    //create new blog
  public function create()
  {
    $blog_category = BlogCategory::all()->pluck('name','id');
    return view('admin.blogs.create',compact('blog_category'));
  }

    //store the blog
  public function store(Request $request)
  {

      //Rules for validation
    $rules=[
      'name' => 'required',
      'description'=>'required',

    ];
     // Messages for validation
    $messages=[
      'name.required' => 'Please enter name.',
      'description.required' =>'Please enter description',
    ];
     // Make validator with rules and messages
    $validator = Validator::make($request->all(),$rules,$messages);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
    if ($validator->fails())
    { 
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
     //If no error than go inside otherwise go to the catch section
      // try
      // {

    $blog = new Blog();
    $blog->name=$request->get('name');
    $blog->user_id=Auth::user()->id;
    $blog->blog_category_id=$request->get('blog_category_id');
    $blog->description=$request->get('description');
    $blog->photo=$request->get('photo');
    $blog->status=$request->get('status');
    $blog->save();
     if(Auth::user()->role=="admin")
      {
        return redirect()->route('blogs.index');
      }
      else
      {
           return redirect()->route('blogs.user_blog');
      }
   
      // }
      // catch(\Exception $e)
      // {
      //     return redirect()->route('blogs.index')->withError('Something went wrong, Please try after sometime.');
      // }
  }

  //show the blog
  public function show($id)
  {
    $blog = Blog::find($id);
    return view('admin.blogs.show',compact('blog')); 
  }

  //edit the blog
  public function edit($id)
  {
    $blog = Blog::find($id);
    $blog_category = BlogCategory::all()->pluck('name','id');
    Former::populate($blog);

    return view('admin.blogs.edit',compact('blog','blog_category'));

  }

    //update the blog
  public function update(Request $request,$id)
  {

     //Rules for validation
    $rules = [
      'name' => 'required',
      'description'=>'required',

    ];
     // Messages for validation
    $messages=[
      'name.required' => 'Please enter name.',
      'description.required' =>'Please enter description',
    ];
    // Make validator with rules and messages
    $validator = Validator::make($request->all(),$rules,$messages);
    // If validator fails than it will redirect back and gives error otherwise go to try catch section
    if ($validator->fails()) { 
    //dd($validator->messages());
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    // If no error than go inside otherwise go to the catch section
    try
    {

      $blog = Blog::find($id);
      $blog->name=$request->get('name');
      $blog->blog_category_id=$request->get('blog_category_id');
      $blog->description=$request->get('description');
      $blog->photo=$request->get('photo');
      $blog->status=$request->get('status');
      $blog->save();
      $blog->save();
      if(Auth::user()->role=="admin")
      {
        return redirect()->route('blogs.index');
      }
      else
      {
           return redirect()->route('blogs.user_blog');
      }

    }
    catch(\Exception $e)
    {
      return redirect()->route('blogs.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

  public function user_blog()
  {
    $blogs = Blog::where('user_id',Auth::user()->id)->get();
    return view('admin.blogs.user_blog',compact('blogs'));
  }

    //delete the blog
  public function destroy(Blog $blog)
  {

  }
}

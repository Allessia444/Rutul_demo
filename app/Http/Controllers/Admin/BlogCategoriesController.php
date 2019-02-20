<?php

namespace App\Http\Controllers\Admin;

use App\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Former;

class BlogCategoriesController extends Controller
{
    //list all  blog category
    public function index()
    {
        $blog_categories = BlogCategory::all();
        return view('admin.blog_categories.index',compact('blog_categories'));
    }

    //create Blog Category
    public function create()
    {
        $blog_category = BlogCategory::all()->pluck('name','id');
        return view('admin.blog_categories.create',compact('blog_category'));
    }

    //store blog category
    public function store(Request $request)
    {
        //Rules for validation
        $rules = [
          'name' => 'required',
      ];
     // Messages for validation
      $messages=[
          'name.required' => 'Please enter name.',
      ];
      // Make validator with rules and messages
      $validator = Validator::make($request->all(),$rules,$messages);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
      if ($validator->fails()) 
      { 
          Former::withErrors($validator);
          return redirect()->back()->withErrors($validator)->withInput();
      }
    // If no error than go inside otherwise go to the catch section
      try
      {
        $blog_category = new BlogCategory();
        $blog_category->name=$request->get('name');
        $blog_category->parent_id=$request->get('parent_id');
        $blog_category->save();
        return redirect()->route('blog_categories.index');

    }
    catch(\Exception $e)
    {
      return redirect()->route('blog_categories.index')->withError('Something went wrong, Please try after sometime.');
      }
    }

        //show blog category
    public function show($id)
    {

        $blog_category = BlogCategory::find($id);
        return view('admin.blog_categories.show',compact('blog_category'));  
    }

        //edit blog category
    public function edit($id)
    {
        $blog_category = BlogCategory::find($id);
        Former::populate($blog_category);
        $blog_cat = BlogCategory::all()->pluck('name','id');
        return view('admin.blog_categories.edit',compact('blog_category','blog_cat'));
    }

        //update blog category
    public function update(Request $request,$id)
    {
         //Rules for validation
        $rules=[
          'name' => 'required',
      ];
     // Messages for validation
      $messages=[
          'name.required' => 'Please enter name.',
      ];
        // Make validator with rules and messages
      $validator = Validator::make($request->all(),$rules,$messages);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
      if ($validator->fails()) 
      { 
          Former::withErrors($validator);
          return redirect()->back()->withErrors($validator)->withInput();
      }
        // If no error than go inside otherwise go to the catch section
      try
      {

          $blog_category = BlogCategory::find($id);
          $blog_category->update($request->all());
          return redirect()->route('blog_categories.index');
      }
      catch(\Exception $e)
      {
          return redirect()->route('blog_categories.index')->withError('Something went wrong, Please try after sometime.');
      }
      

    }
        //destroy blog category
    public function destroy($id)
    {
        $blog_category = BlogCategory::find($id);
        $blog_category->delete();
        return redirect()->route('blog_categories.index');
    }
}

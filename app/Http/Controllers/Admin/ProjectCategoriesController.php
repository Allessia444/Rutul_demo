<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProjectCategory;
use Validator;
use Former;

class ProjectCategoriesController extends Controller
{
  
  //list all project categories
  public function index()
  {
    $project_categories = ProjectCategory::orderBy('name','id')->get();
    return view('admin.project_categories.index',compact('project_categories'));
  }

  //create new project category
  public function create()
  {
    $project_category = ProjectCategory::all()->pluck('name','id');
    return view('admin.project_categories.create',compact('project_category'));
  }

  // Store a newly created ProjectCategory in storage.
  public function store(Request $request)
  {
   //Rules for validation
    $rules=[
      'name' => 'required',
    // 'lft'=>'required',
    // 'rgt'=>'required',
    // 'depth'=>'required',
    ];
    // Messages for validation
    $messages=[
      'name.required' => 'Please enter name.',
    // 'lft.required' =>'Please enter LFT',
    // 'rgt.required' =>'Please enter RGT',
    // 'depth.required' =>'Please enter DEPTH',

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
      $project_category = new ProjectCategory();
      $project_category->parent_id=$request->get('parent_id');
      $project_category->name=$request->get('name');
      $project_category->lft='';
      $project_category->rgt='';
      $project_category->depth='';
      $project_category->save();
      return redirect()->route('project_categories.index');
    }
    catch(\Exception $e)
    {
      return redirect()->route('project_categories.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

  //show project category
  public function show($id)
  {
    $project_category = ProjectCategory::find($id);
    return view('admin.project_categories.show',compact('project_category'));
  }

  //edit project category
  public function edit($id)
  {

    $project_category = ProjectCategory::find($id);
    Former::populate($project_category);
    $project_cat = ProjectCategory::all()->pluck('name','id');

    return view('admin.project_categories.edit',compact('project_category','project_cat'));
  }

  // Update the specified project in storage.
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
    if ($validator->fails()) { 
    //dd($validator->messages());
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    // If no error than go inside otherwise go to the catch section
    try
    {

      $project_category = ProjectCategory::find($id);
      $project_category->update($request->all());
      return redirect()->route('project_categories.index');
    }
    catch(\Exception $e)
    {
      return redirect()->route('project_categories.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

// Remove the specified project from storage.
  public function destroy($id)
  {
    $project_category = ProjectCategory::find($id);
    $project_category->delete();
    return redirect()->route('project_categories.index');
  }
}

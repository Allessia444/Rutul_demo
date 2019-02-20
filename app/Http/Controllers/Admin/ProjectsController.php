<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\User;
use Validator;
use Former;

class ProjectsController extends Controller
{
  
  // Display a listing of the project.
  public function index()
  {
    $projects = Project::orderBy('name','id')->get();
    return view('admin.projects.index',compact('projects'));
  }

  //Show the form for creating a new project.
  public function create()
  {
    $user = User::all()->pluck('fname','id');
    return view('admin.projects.create',compact('user'));

  }

  // Store a newly created Project in storage.
  public function store(Request $request)
  {
    //Rules for validation
    $rules=[
      'name' => 'required',
      'confirm_hours'=>'required',

    ];
    // Messages for validation
    $messages=[
      'name.required' => 'Please enter name.',
      'confirm_hours.required' =>'Please enter hours',
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
    try
    {

      $project = new Project();
      $project->name=$request->get('name');
      $project->users_id=$request->get('users_id');
      $project->confirm_hours=$request->get('confirm_hours');
      $project->save();
      return redirect()->route('projects.index');

    }
    catch(\Exception $e)
    {
      return redirect()->route('projects.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

  //Display the specified project.
  public function show($id)
  {
    $project=Project::find($id);
    return view('admin.projects.show',compact('project'));
  }

  //Show the form for editing the specified project.
  public function edit($id)
  {
    $project=Project::find($id);
    $user = User::all()->pluck('fname','id');
    Former::populate($project);
    return view('admin.projects.edit',compact('project','user'));
  }

  // Update the specified project in storage.
  public function update(Request $request,$id)
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
    if ($validator->fails()) { 
    //dd($validator->messages());
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    // If no error than go inside otherwise go to the catch section
    try
    {

      $project=Project::find($id);
      $project->update($request->all());
      return redirect()->route('projects.index');
    }
    catch(\Exception $e)
    {
      return redirect()->route('projects.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

  // Remove the specified project from storage.
  public function destroy($id)
  {
    $project = Project::find($id);
    $project->delete();
    return redirect()->route('projects.index');
  }
}

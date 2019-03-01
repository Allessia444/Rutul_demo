<?php

namespace App\Http\Controllers\Admin;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TaskCategory;
use Validator;
use Former;
use Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the Tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($project_id)
    {
       $tasks = Task::where('user_id','=',Auth::user()->id)->where('complete','=',0)->where('project_id','=',$project_id)->get();
       // dd($tasks);
       return view('admin.tasks.index',compact('tasks','project_id'));
    }

    /**
     * Show the form for creating a new task.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project_id)
    {
 
       $task_category = TaskCategory::all()->pluck('name','id');
       return view('admin.tasks.create',compact('user','task_category','project_id'));
    }

    //Task completed
    public function complete(Request $request)
    {

          $task = Task::find($request->get('id'));
          $task->complete=1;
          $task->save();
          return redirect()->route('tasks.index');

    }

    /**
     * Store a newly created task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$project_id)
    {
        //Rules for validation
        $rules=[
          'name' => 'required',
          'notes'=>'required',
          'start_date'=>'required',
          'end_date'=>'required|after:start_date',

      ];
        // Messages for validation
      $messages=[
          'name.required' => 'Please enter name.',
          'notes.required' =>'Please enter notes',
          'start_date.required' =>'Please enter start date',
          'end_date.required' =>'Please enter end date',
      ];
         // Make validator with rules and messages
      $validator = Validator::make($request->all(),$rules,$messages);
         // If validator fails than it will redirect back and gives error otherwise go to try catch section
      if ($validator->fails())
      { 
          Former::withErrors($validator);
          return redirect()->back()->withErrors($validator)->withInput();
      }
       //  If no error than go inside otherwise go to the catch section
      // try
      // {
        // dd($project_id);
          $task = new Task();
          $task->name=$request->get('name');
          $task->notes=$request->get('notes');
          $task->user_id=Auth::user()->id;
          $task->task_category_id=$request->get('task_category_id');
          $task->start_date=$request->get('start_date');
          $task->end_date=$request->get('end_date');
          $task->project_id=$project_id;
          $task->save();
          return redirect()->route('project.tasks.index',$project_id);

      // }
      // catch(\Exception $e)
      // {
      //     return redirect()->route('tasks.index')->withError('Something went wrong, Please try after sometime.');
      // }
  }

    /**
     * Display the specified task.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($project_id,$id)
    {
        $task = Task::find($id);
        return view('admin.tasks.show',compact('task','project_id'));
    }

    /**
     * Show the form for editing the specified task.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($project_id,$id)
    {
        $task = Task::find($id);
        $task_category = TaskCategory::all()->pluck('name','id');
        Former::populate($task) ;
        return view('admin.tasks.edit',compact('task','task_category','project_id'));
    }

    /**
     * Update the specified task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$project_id,$id)
    {
          //Rules for validation
        $rules=[
          'name' => 'required',
          'notes'=>'required',
          'start_date'=>'required|date|before:end_date',
          'end_date'=>'required|date|after:start_date',

      ];
        // Messages for validation
      $messages=[
          'name.required' => 'Please enter name.',
          'notes.required' =>'Please enter hours',
          'start_date.required' =>'Please enter start date',
          'end_date.required' =>'Please enter end date',
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
          $task = Task::find($id);
          $task->update($request->all());
          return redirect()->route('project.tasks.index',$project_id);
      }
      catch(\Exception $e)
      {
          return redirect()->route('project.tasks.index',$project_id)->withError('Something went wrong, Please try after sometime.');
      }
  }

    /**
     * Remove the specified task from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($project_id,$id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('project.tasks.index',$project_id);
    }

  
}

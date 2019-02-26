<?php

namespace App\Http\Controllers\Admin;

use App\TaskLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Former;
use Auth;

class TaskLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($task_id)
    {

        $task_logs = TaskLog::where('task_id','=',$task_id)->get();
        return view('admin.task_logs.index',compact('task_logs','task_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($task_id)
    {

     return view('admin.task_logs.create',compact('task_id'));
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$task_id)
    {

        $rules=[
            'date' => 'required|before:tomorrow',
            'start_time'=>'required|before:end_time',
            'end_time'=>'required|after:start_time',

        ];
        // Messages for validation
        $messages=[
            'date.required' => 'Please Date.',
            'start_time.required' =>'Please start time',
            'end_time.required' =>'Please start time',
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
            $task_log = new TaskLog();

            $start=date("g:i a", strtotime($request->get('end_time')));
               // dd($start);
            $start_time = strtotime($request->get('start_time'));
            $end_time = strtotime($request->get('end_time')); 
            $spend_times = $end_time - $start_time;

            $spend_time = date('h:i',$spend_times);
              dd($spend_time);
            $task_log->task_id = $task_id;
            $task_log->user_id = Auth::user()->id;
            $task_log->date = $request->get('date');
            $task_log->start_time = $request->get('start_time');
            $task_log->end_time = $request->get('end_time');
            $task_log->spent_time = $spend_time;
            $task_log->description = $request->get('description');
            $task_log->billable = $request->get('billable');
            $task_log->save();

            return redirect()->route('tasks.task_logs.index',$task_id);

        // }
        // catch(\Exception $e)
        // {
        //     return redirect()->route('tasks.task_logs.index',$task_id)->withError('Something went wrong, Please try after sometime.');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TaskLog  $taskLog
     * @return \Illuminate\Http\Response
     */
    public function show($task_id,$task_log_id)
    {
         $task_log = TaskLog::find($task_log_id);
        return view('admin.task_logs.show',compact('task_log','task_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TaskLog  $taskLog
     * @return \Illuminate\Http\Response
     */
    public function edit($task_id,$task_log_id)
    {
     $task_log = TaskLog::find($task_log_id);
     Former::populate($task_log);
     return view('admin.task_logs.edit',compact('task_log','task_id'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TaskLog  $taskLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$task_id,$task_log_id)
    {
     $rules=[
       'date' => 'required|before:tomorrow',
       'start_time'=>'required|before:end_time',
       'end_time'=>'required|after:start_time',


   ];
        // Messages for validation
   $messages=[
    'date.required' => 'Please Date.',
    'start_time.required' =>'Please start time',
    'end_time.required' =>'Please start time',
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
    try
    {

        $task_log = TaskLog::find($task_log_id);
        $task_log->update($request->all());
        $task_log->save();
        return redirect()->route('tasks.task_logs.index',$task_id);

    }
    catch(\Exception $e)
    {
        return redirect()->route('tasks.task_logs.index',$task_id)->withError('Something went wrong, Please try after sometime.');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TaskLog  $taskLog
     * @return \Illuminate\Http\Response
     */
    public function destroy($task_id,$task_log_id)
    {
         $task_log = TaskLog::find($task_log_id);
         $task_log->delete();
         return redirect()->route('tasks.task_logs.index',$task_id);
    }
}

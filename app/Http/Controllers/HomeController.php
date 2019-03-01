<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\Task;
use App\TaskCategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        $users = User::count();
        $users = User::select(DB::raw("COUNT(*) as count , extract(month from created_at) as month"))
        ->groupBy(DB::raw("extract(month from created_at)"))
        ->pluck('count','month');

        for($i=1; $i<=12;$i++)
        {
            $users_data[] = isset($users[$i]) ? $users[$i] : 0;
        }
        //dd($users);
        $data[] = array(
            
            'data' => $users_data
        );
        $data = json_encode($data);
        //dd($data);
        return view('Admin.dashboard',compact('users','data'));
    }

    public function color()
    {
        return view('Admin.color');
    }

     public function background_color()
    {
        return view('Admin.background_color');
    }

     public function task_category()
    {
        $task_categories = TaskCategory::get()->pluck('name','id');
        return view('Admin.task_details',compact('task_categories'));
    }

     public function get_task($task_category_id)
    {
        $tasks = Task::where('task_category_id','=',$task_category_id)->pluck('name','id');
       // dd($task);
        return view('Admin.render_task',compact('tasks'));
    }

     public function get_task_details($task_id)
    {
        $tasks_detail = Task::find($task_id);
        return view('Admin.render_task_detail',compact('tasks_detail'));
    }
  
}

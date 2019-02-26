<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

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
  
}

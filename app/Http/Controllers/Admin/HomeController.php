<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;

class HomeController extends Controller
{
    //
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
		// dd($data);
		return view('Admin.dashboard',compact('users','data'));
	}

	


}

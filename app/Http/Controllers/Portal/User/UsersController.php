<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Former;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class UserController extends Controller
{

	public function index()
	{

	}

	// Create new user
	public function create()
	{
		return view('users.create');
	}

	// Store new user
	public function store(Request $request)
	{

	}

	//show user
	public function show($id)
	{

	}

	//edit user
	public function edit($id)
	{
		Former::populate($user);
		return view('admin.users.edit',compact('user'));
	}

	//update user
	public function update(Request $request)
	{

		$user_profile=$user->user_profile;
		$user->update($request->all());
		$user_profile->update($request->all());
		return redirect('users');
	}

	//delete user
	public function destroy($id)
	{

	}

}

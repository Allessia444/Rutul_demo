<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\UserProfile;
use App\Designation;
use App\Department;
use App\Blog;
use Validator;
use Former;
use Auth;

class UsersController extends Controller
{
	
	// Create form for user
	public function index()
	{
		$users = User::where('role','=','user')->get();
		return view('admin.users.index',compact('users'));
	}

	// Create new user
	public function create()
	{
		$department = Department::all()->pluck('name','id');
		$designation= Designation::all()->pluck('name','id');
		return view('admin.users.create',compact('department','designation'));
	}

	// Store new user
	public function store(Request $request)
	{
		//Rules for validation
		$rules=[
			'fname' => 'required',
			'lname' => 'required',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|between:6,12',
			'mobile_number' => 'required|min:10|numeric',
			'status'=>'required',
		];
		// Messages for validation
		$messages=[
			'fname.required' => 'Please enter first name.',
			'lname.required' => 'Please enter last name.',
			'email.required' => 'Please enter email.',
			'mobile_number.required' => 'Please enter phone .',
			'mobile_number.numeric' => 'Please enter number.',
			'password.required' => 'Please enter password',
		];
		// Make validator with rules and messages
		$validator = Validator::make($request->all(),$rules,$messages);
		// If validator fails than it will redirect back and gives error otherwise go to try catch section
		if ($validator->fails()) 
		{ 
			Former::withErrors($validator);
			return redirect()->back()->withErrors($validator)->withInput();
		}
		// // If no error than go inside otherwise go to the catch section
		// try
		// {

			$user=new User();
			$user->fname=$request->get('fname');
			$user->lname=$request->get('lname');
			$user->email=$request->get('email');
			$user->password=Hash::make($request->get('password'));
			$user->mobile_number=$request->get('mobile_number');
			$user->status=$request->get('status');
			$user->role='user';
			$user->designation_id=$request->get('designation_id');
			$user->department_id=$request->get('department_id');
			$user->team_lead=$request->get('team_lead');
			$user->save();

			// dd($user);

			//user profile
			$user_profile=new UserProfile();

			$user_profile->uid=$user->id;
			$user_profile->phone=$request->get('phone');
			$user_profile->address1=$request->get('address1');
			$user_profile->address2=$request->get('address2');
			$user_profile->city=$request->get('city');
			$user_profile->state=$request->get('state');
			$user_profile->country=$request->get('country');
			$user_profile->zipcode=$request->get('zipcode');
			$user_profile->dob=$request->get('dob');
			$user_profile->gender=$request->get('gender');
			$user_profile->marital_status=$request->get('marital_status');
			$user_profile->pan_number=$request->get('pan_number');
			$user_profile->management_level=$request->get('management_level');
			$user_profile->join_date=$request->get('join_date');
			$user_profile->photo=$request->get('photo');
			$user_profile->google=$request->get('google');
			$user_profile->facebook=$request->get('facebook');
			$user_profile->website=$request->get('website');
			$user_profile->skype=$request->get('skype');
			$user_profile->linkedin=$request->get('linkedin');
			$user_profile->twitter=$request->get('twitter');
			$user_profile->attach=$request->get('attach');
			
			$user_profile->save();

			return redirect()->route('users.index');

		// }
		// catch(\Exception $e)
		// {
		// 	return redirect()->route('users.index')->withError('Something went wrong, Please try after sometime.');
		// }

	}

	//show user
	public function show($id)
	{
		$user = User::find($id);
		 $blogs = Blog::where('user_id',$id)->get();
		return view('admin.users.show',compact('user','blogs'));
	}

	//edit user
	public function edit($id)
	{
		$user = User::find($id);
		Former::populate($user);
		$department = Department::all()->pluck('name','id');
		$designation= Designation::all()->pluck('name','id');
		return view('admin.users.edit',compact('user','department','designation'));
	}

	//update user
	public function update(Request $request,$id)
	{
		$user = User::find($id);
		$user_profile=$user->user_profile;
		$user->update($request->all());
		$user_profile->update($request->all());
		$user->save();
		$user_profile->save();
		return redirect('/admin/users');
	}

	//delete user
	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();
		return redirect()->route('users.index');
	}

	//edit user
	public function my_profile()
	{
		$user = User::find(Auth::user()->id);
		$department = Department::all()->pluck('name','id');
		$designation = Designation::all()->pluck('name','id');
		Former::populate($user);
		$user_detail=Auth::user();
		return view('admin.users.my_profile',compact('user','department','designation','user_detail'));
	}

	//update user
	public function update_my_profile(Request $request)
	{
		$user = User::find(Auth::user()->id);
		$user_profile = $user->user_profile;
		$user->update($request->all());
		$user_profile->update($request->all());
		$user_profile->save();
		return redirect()->route('users.my_profile');
	}

	public function update_photo(Request $request)
	{
		try{

		$user = User::find(Auth::user()->id);
		$user_profile = $user->user_profile;
		$user_profile->photo = $request->get('photo');
		$user_profile->save();
		return response()->json(['photo_name'=>$user_profile->photo], 200);
		}
		catch(\Exception $e)
		{
		return response()->json('Something went wrong', 422);	
		}
	}

}

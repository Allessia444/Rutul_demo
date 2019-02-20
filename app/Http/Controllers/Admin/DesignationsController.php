<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Designation;
use Validator;
use Former;

class DesignationsController extends Controller
{
	//List all designations
	public function index()
	{
		$designations = Designation::all();
		return view('admin.designations.index',compact('designations'));
	}

	// Create new designation
	public function create()
	{
		return view('admin.designations.create');
	}

	// Store designation
	public function store(Request $request)
	{
		//Rules for validation
		$rules = [
			'name' => 'required',
		];
		// Messages for validation
		$messages = [ 
			'name.required' => 'Please enter first name.',
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
			$designation = new Designation();
			$designation->name=$request->get('name');
			$designation->save();
			return redirect()->route('designations.index');
		}
		catch(\Exception $e)
		{
			return redirect()->route('teachers.index')->withError('Something went wrong, Please try after sometime.');
		}

	}

	//show designation
	public function show()
	{
	}

	//edit designation
	public function edit($id)
	{
		$designation = Designation::find($id);
		Former::populate($designation);
		return view('admin.designations.edit',compact('designation'));	
	}

	//update designation
	public function update(Request $request,$id)
	{
		$rules = [
			'name' => 'required',
		];
		// Messages for validation
		$messages = [
			'name.required' => 'Please enter first name.',
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
			$department = Designation::find($id);
			$department->update($request->all());
			return redirect('/admin/designations');
		}
		catch(\Exception $e)
		{
			return redirect()->route('teachers.index')->withError('Something went wrong, Please try after sometime.');
		}
	}

	//delete designation
	public function destroy()
	{
		$designation = Designation::find($id);
		$designation->delete();
		return redirect()->route('designations.index');
	}
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
use Validator;
use Former;

class DepartmentsController extends Controller
{
	//List all the department
	public function index()
	{
		$departments = Department::all();
		return view('admin.departments.index',compact('departments'));
	}
	
	// Create new department
	public function create()
	{
		return view('admin.departments.create');
	}

	// Store department
	public function store(Request $request)
	{
		//Rules for validation
		$rules = [
			'name' => 'required',
		];
		// Messages for validation
		$messages=[
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
			$department = new Department();
			$department->name=$request->get('name');
			$department->save();
			return redirect()->route('departments.index');
		}
		catch(\Exception $e)
		{
			return redirect()->route('teachers.index')->withError('Something went wrong, Please try after sometime.');
		}
	}

	//show department
	public function show($id)
	{
		$department=Department::find($id);
		return view('admin.departments.show',compact('department'));
	}

	//edit department
	public function edit($id)
	{
		$department = Department::find($id);
		Former::populate($department);
		return view('admin.departments.edit',compact('department'));
	}

	//update department
	public function update(Request $request,$id)
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
			$department=Department::find($id);
			$department->update($request->all());
			return redirect('/admin/departments');
		}
		catch(\Exception $e)
		{
			return redirect()->route('teachers.index')->withError('Something went wrong, Please try after sometime.');
		}
	}

	//delete department
	public function destroy($id)
	{
		$department = Department::find($id);
		$department->delete();
		return redirect()->route('departments.index');
	}
}

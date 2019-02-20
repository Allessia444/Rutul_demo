<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Industry;
use Validator;
use Former;

class IndustriesController extends Controller
{

	//list all industries
	public function index()
	{

		$industries = Industry::orderBy('name','id')->get();
		return view('admin.industries.index',compact('industries'));
	}

	// Create new Industry
	public function create()
	{
		return view('admin.industries.create');
	}


	// Store industry
	public function store(Request $request)
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
		if ($validator->fails())
		 { 
			Former::withErrors($validator);
			return redirect()->back()->withErrors($validator)->withInput();
		}
		// If no error than go inside otherwise go to the catch section
		try
		{

			$industry = new Industry();
			$industry->name=$request->get('name');
			$industry->save();
			return redirect()->route('industries.index');
		}
		catch(\Exception $e)
		{
			return redirect()->route('users.index')->withError('Something went wrong, Please try after sometime.');
		}
	}

	//show industry
	public function show($id)
	{
		$industry = Industry::find($id);
		return view('admin.industries.show',compact('industry'));
	}

	//edit industry
	public function edit($id)
	{
		$industry = Industry::find($id);
		Former::populate($industry);
		return view('admin.industries.edit',compact('industry'));
	}

	//update industry
	public function update(Request $request,$id)
	{
		//Rules for validation
		$rules=[
			'name' => 'required',
		];
		// Messages for validation
		$messages=[
			'name.required' => 'Please enter name.',
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
			$industry=Industry::find($id);
			$industry->update($request->all());
			$industry->save();
			return redirect()->route('industries.index');
		}
		catch(\Exception $e)
		{
			return redirect()->route('industries.index')->withError('Something went wrong, Please try after sometime.');
		}
	}

	//delete industry
	public function destroy($id)
	{
		$industry = Industry::find($id);
		$industry->delete();
		return redirect()->route('industries.index');
	}

}

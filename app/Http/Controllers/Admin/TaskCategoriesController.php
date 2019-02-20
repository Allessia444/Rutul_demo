<?php

namespace App\Http\Controllers\Admin;

use App\TaskCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Former;

class TaskCategoriesController extends Controller
{

    //list all task categories
    public function index()
    {
        $task_categories = Taskcategory::orderBy('name','id')->get();
        return view('admin.task_categories.index',compact('task_categories'));
    }

    // create new task category
    public function create()
    {
        return view('admin.task_categories.create');
    }

    //store task category
    public function store(Request $request)
    {
        //Rules for validation
        $rules = [ 
            'name' => 'required',
        ];
        // Messages for validation
        $messages = [
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
            $task_category = new Taskcategory();
            $task_category->name=$request->get('name');
            $task_category->save();
            return redirect()->route('task_categories.index');
        }
        catch(\Exception $e)
        {
            return redirect()->route('task_categories.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    //show task category
    public function show($id)
    {
        $task_category = Taskcategory::find($id);
        return view('admin.task_categories.show',compact('task_category'));
    }

    //edit task category
    public function edit($id)
    {
        $task_category = Taskcategory::find($id);
        Former::populate($task_category);
        return view('admin.task_categories.edit',compact('task_category'));
    }

    //update task category
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

            $task_category = Taskcategory::find($id);
            $task_category->update($request->all());
            return redirect()->route('task_categories.index');

        }
        catch(\Exception $e)
        {
            return redirect()->route('task_categories.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    //delete task category
    public function destroy($id)
    {
        $task_category = find::id($id);
        $task_category->delete();
        return redirect()->route('task_categories.index');
    }
}

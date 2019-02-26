<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TeamLead;
use App\User;
use Validator;
use Former;


class TeamLeadController extends Controller
{
	public function index()
	{

	}

    /**
     * Show the form for creating a new task.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$department_id)
    {
    	$team = TeamLead::where('department_id','=',$department_id)->get();
    

    		$team_leads = TeamLead::where('department_id','=',$department_id)->pluck('team_lead_id','id');
    		Former::populate($team_leads);

    		$team_members = TeamLead::where('department_id','=',$department_id)->pluck('member_id','id');
    		Former::populate($team_members);


    		$team_lead = User::where('team_lead','=',1)->where('department_id','=',$department_id)->pluck('fname','id');
    		$member_id = User::where('team_lead','=',0)->where('department_id','=',$department_id)->pluck('fname','id');
    		return view('admin.departments.team',compact('member_id','team_lead','department_id','team','team_members','team_leads'));
    	
    }

    /**
     * Store a newly created task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$department_id)
    {
 		$team_del = TeamLead::where('department_id','=',$department_id)->delete();
        //Rules for validation
    	$rules=[
    		'team_lead_id' => 'required',
    		'member_id'=>'required',

    	];
        // Messages for validation
    	$messages=[
    		'team_lead_id.required' => 'Please enter team lead.',
    		'member_id.required' =>'Please enter member id',
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
    		foreach ($request->get('member_id') as $key => $member) 
    		{
    			$team_lead = new TeamLead();
    			$team_lead->team_lead_id=$request->get('team_lead_id');
    			$team_lead->member_id=$request->get('member_id')[$key];
    			$team_lead->department_id=$department_id;
    			$team_lead->save();
    		}
    		return redirect()->route('departments.index');

    	}
    	catch(\Exception $e)
    	{
    		return redirect()->route('departments.index')->withError('Something went wrong, Please try after sometime.');
    	}
    }

    /**
     * Display the specified task.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified task.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

    }
}

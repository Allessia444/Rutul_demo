<?php

namespace App\Http\Controllers\Admin;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Former;
use App\Industry;

class ClientsController extends Controller
{

    // List all clients
    public function index()
    {
        $clients = Client::orderBy('name','id')->get();
        return view('admin.clients.index',compact('clients'));
    }

    //create new client
    public function create()
    {
        $industry = Industry::all()->pluck('name','id');
        return view('admin.clients.create',compact('industry'));
    }

    //Store new client
    public function store(Request $request)
    {
        //Rules for validation
        $rules = [
            'name' => 'required',
            'logo'=>'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|min:10|numeric',
        ];
        // Messages for validation
        $messages=[
            'name.required' => 'Please enter name.',
            'email.required' => 'Please enter email.',
            'phone.required' => 'Please enter phone .',
            'phone.numeric' => 'Please enter number.',
        ];
        // Make validator with rules and messages
        $validator = Validator::make($request->all(),$rules,$messages);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
        if ($validator->fails()) 
        { 
            Former::withErrors($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //If no error than go inside otherwise go to the catch section
        try
        {
            $client = new Client();
            $client->industries_id=$request->get('industries_id');
            $client->name=$request->get('name');
            $client->logo=$request->get('logo');
            $client->website=$request->get('website');
            $client->email=$request->get('email');
            $client->phone=$request->get('phone');
            $client->fax=$request->get('fax');
            $client->address1=$request->get('address1');
            $client->address2=$request->get('address2');
            $client->city=$request->get('city');
            $client->state=$request->get('state');
            $client->country=$request->get('country');
            $client->zipcode=$request->get('zipcode');
            $client->save();
            return redirect()->route('clients.index');
        }
        catch(\Exception $e)
        {
            return redirect()->route('clients.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    //show client
    public function show($id)
    {
        $client = Client::find($id);
        return view('admin.clients.show',compact('client'));
    }

    //edit user
    public function edit($id)
    {

        $client = Client::find($id);
        Former::populate($client);
        $industry=Industry::all()->pluck('name','id');
        return view('admin.clients.edit',compact('client','industry'));
    }

    //update user
    public function update(Request $request,$id)
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
            $client = Client::find($id);
            $client->update($request->all());
            return redirect()->route('clients.index');
        }
        catch(\Exception $e)
        {
            return redirect()->route('clients.index')->withError('Something went wrong, Please try after sometime.');
        }
    }
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect()->route('clients.index');
    }
}

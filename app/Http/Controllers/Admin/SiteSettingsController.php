<?php

namespace App\Http\Controllers\Admin;

use App\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Former;


class SiteSettingsController extends Controller
{
   
    public function edit()
    {
        $site_setting = SiteSetting::get()->first();
        Former::populate($site_setting);
        return view('admin.site_settings.edit',compact('site_setting'));
    }

    public function update(Request $request)
    {
       //Rules for validation
        $rules = [
          'title' => 'required',
          'email' => 'required',
          'phone_1' => 'required|numeric',
          'phone_2' => 'required|numeric',
          'copy_right' => 'required',

      ];
        // Messages for validation
      $messages=[
          'title.required' => 'Please enter title.',
          'email.required' => 'Please enter email.',
          'phone_1.required' => 'Please enter phone_1.',
          'phone_2.required' => 'Please enter phone_2.',
          'copy_right.required' => 'Please enter copy_right.',
      ];
        // Make validator with rules and messages
      $validator = Validator::make($request->all(),$rules,$messages);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
      if ($validator->fails()) { 
     //dd($validator->messages());
         Former::withErrors($validator);
         return redirect()->back()->withErrors($validator)->withInput();
     }
    // If no error than go inside otherwise go to the catch section
     try
     {
          $site_setting = SiteSetting::get()->first();
          $site_setting->update($request->all());
          return view('admin.site_setting.edit');
      }
      catch(\Exception $e)
      {
          return view('admin.site_settings.edit')->withError('Something went wrong, Please try after sometime.');
      }
    }

}

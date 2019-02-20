<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;


class Client extends Model
{
    //
 

     protected $fillable = [
        'industries_id','logo','website','email','phone','fax','address1','address2','city','state','country','
        zipcode',
    ];

     public function setlogoAttribute($file) {
		$source_path = upload_tmp_path($file);
		//dd($source_path);
		if ($file && file_exists($source_path)) 
		{

		
			upload_move($file,'../logo');

			Image::make($source_path)->resize(200,200)->save($source_path);
			upload_move($file,'logo','front');
			
			@unlink($source_path);
		}
		$this->attributes['logo'] = $file;
		if ($file == '') 
		{
			$this->attributes['logo'] = "";
		}
	}
	
	public function logo_url($type='original') 
	{
		if (!empty($this->logo))
			return upload_url($this->logo,'logo',$type);
		elseif (!empty($this->logo) && file_exists(tmp_path($this->logo)))
			return tmp_url($this->$logo);
		else
			return asset('images/graduate.png');
	}

	  public function industry()
        {
            return $this->belongsTo('App\User', 'industries_id');
        }

     
}

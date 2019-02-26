<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Image;

class UserProfile extends Model
{
    //
      
     protected $table='users_profile';

	   protected $fillable = [
        'photo','phone','address1', 'address2','city','state','country','zipcode','dob','gender','marital_status','pan_number','management_level','join_date','attach','google','facebook','website','skype','linkedin','twitter','uid',
    ];


    public function user()
    {
        return $this->belongsTo('App\User','uid');
    }

    public function setphotoAttribute($file) {
		$source_path = upload_tmp_path($file);
		//dd($source_path);
		if ($file && file_exists($source_path)) 
		{
			upload_move($file,'../photo');

			Image::make($source_path)->resize(200,200)->save($source_path);
			upload_move($file,'photo','front');
			
			@unlink($source_path);
		}
		$this->attributes['photo'] = $file;
		if ($file == '') 
		{
			$this->attributes['photo'] = "";
		}
	}
	
	public function photo_url($type='original') 
	{
		
		if (!empty($this->photo))
			return upload_url($this->photo,'photo',$type);
		elseif (!empty($this->photo) && file_exists(tmp_path($this->photo)))
			return tmp_url($this->$photo);
		else
			return asset('images/img.png');
	}


	 public function setattachAttribute($file1) {
		$source_path1 = upload_tmp_path($file1);
		
		if ($file1 && file_exists($source_path1)) 
		{
				//dd($file1);
			upload_move($file1,'../attach');

			// Image::make($source_path1)->resize(200,200)->save($source_path1);
			// upload_move($file1,'attach','front');
			
			@unlink($source_path1);
		}
		$this->attributes['attach'] = $file1;
		if ($file1 == '') 
		{
			$this->attributes['attach'] = "";
		}
	}
	
	public function attach_url($type='original') 
	{
		if (!empty($this->attach))
			return upload_url($this->attach,'attach',$type);
		elseif (!empty($this->attach) && file_exists(tmp_path($this->attach)))
			return tmp_url($this->$attach);
		else
			return asset('images/graduate.png');
	}
    
}

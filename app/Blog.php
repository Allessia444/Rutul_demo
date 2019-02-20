<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;

class Blog extends Model
{
    protected $fillable = [
        'blog_catrgory_id','user_id','name','description','photo','status',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function blog_category()
    {
    	return $this->belongsTo('App\BlogCategory');
    }

    public function setphotoAttribute($file) {
		$source_path = upload_tmp_path($file);
		// dd($source_path);
		if ($file && file_exists($source_path)) 
		{
			upload_move($file,'/blog');

			Image::make($source_path)->resize(200,303)->save($source_path);
			upload_move($file,'blog','front');

			Image::make($source_path)->resize(609,388.13)->save($source_path);
			upload_move($file,'blog','large');
			
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
			return asset('images/graduate.png');
	}
}

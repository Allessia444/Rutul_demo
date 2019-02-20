<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class BlogCategory extends Model
{
    //
     use Sluggable;

        protected $fillable = [
        'name','slug','parent_id',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }

    public function blog_category()
    {
    	 return $this->belongsTo('App\BlogCategory', 'parent_id');
    }

    public function blog()
    {
        return $this->hasMany('App\Blog');
    }

}

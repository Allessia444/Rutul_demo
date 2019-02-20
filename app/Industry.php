<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    //
      use Sluggable;

     protected $fillable = [
        'name','slug',
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
    
    public function client()
    {
        return $this->hasMany('App\Client');
    }

}

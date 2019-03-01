<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Project extends Model
{
    use Sluggable;

    protected $fillable = [
        'users_id','name','slug','confirm_hours',
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
    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

    public function user_project()
    {
        return $this->hasMany('App\UserProject');
    }
}

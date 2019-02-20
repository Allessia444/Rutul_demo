<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;


use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{
    //

    protected $table='task_categories';

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

    public function task()
    {
        return $this->hasMany('App\Task');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProjectCategory extends Model
{
    use Sluggable;
    protected $fillable = [
        'parent_id','name','slug','lft','rgt','depth',
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
    public function parentname()
    {
        return $this->belongsTo('App\ProjectCategory', 'parent_id');
    }

}

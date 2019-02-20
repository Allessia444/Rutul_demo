<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    protected $fillable = [
        'user_id','task_category_id','name','notes','start_date','end_date','priority',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function task_category()
    {
        return $this->belongsTo('App\TaskCategory');
    }
}

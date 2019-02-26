<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamLead extends Model
{
      protected $fillable = [
        'team_lead_id','member_id','department_id',
    ];

     public function user()
    {
        return $this->belongsTo('App\User','member_id');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use App\UserProfile;

use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname','lname','email', 'password','mobile_number','designation_id','department_id','team_lead','status','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

       public function getFullName()
    {

        $fullname=$this->fname." ".$this->lname;
   
        return $fullname;
    }

    public function user_profile()
    {
        return $this->hasOne('App\UserProfile','uid');
    }

     public function team_lead()
    {
        return $this->hasMany('App\TeamLead');
    }

    public function project()
    {
        return $this->hasMany('App\Project');
    }

    public function blog()
    {
        return $this->hasMany('App\Blog');
    }

    public function task()
    {
        return $this->hasMany('App\Task');
    }

    public function user_project()
    {
        return $this->hasMany('App\UserProject');
    }

    public function designation()
    {
        return $this->belongsTo('App\Designation');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

  
}

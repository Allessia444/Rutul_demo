<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    //
     protected $table='designation';
     
       protected $fillable = [
        'name',
    ];


    
      public function user()
    {
        return $this->hasMany('App\User');
    }
}

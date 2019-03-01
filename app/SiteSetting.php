<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
     protected $fillable = [
        'title','email','phone_1','phone_1','copy_right','site_visitors',
    ];

}

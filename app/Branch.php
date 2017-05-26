<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function department(){
        return $this->belongsToMany('App\Department');
    }
}

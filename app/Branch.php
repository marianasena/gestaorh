<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function departments(){
        return $this->belongsToMany('App\Department', 'branch_departments')->withTimestamps();
    }

    public function employees(){
        return $this->hasMany(Employee::class);
    }

}

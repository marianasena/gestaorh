<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];

    public function branches(){
        return $this->belongsToMany('App\Branch', 'branch_departments')->withTimestamps();
    }

    public function employees(){
        return $this->hasMany(Employee::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

}

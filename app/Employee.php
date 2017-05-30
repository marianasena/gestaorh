<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

}

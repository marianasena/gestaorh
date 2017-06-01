<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function unemployment_requests(){
        return $this->hasMany(UnemploymentRequest::class);
    }

    public function approvers(){
        return $this->hasMany(Approver::class);
    }
}

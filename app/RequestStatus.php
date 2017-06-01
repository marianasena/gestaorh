<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestStatus extends Model
{

    protected $table = 'request_status';

    public function unemployment_requests(){
        return $this->hasMany(UnemploymentRequest::class);
    }
    public function approvers(){
        return $this->hasMany(Approver::class);
    }
}

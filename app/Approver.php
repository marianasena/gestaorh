<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approver extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function request_status(){
        return $this->belongsTo(RequestStatus::class);
    }
}

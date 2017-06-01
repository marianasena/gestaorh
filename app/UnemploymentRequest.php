<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnemploymentRequest extends Model
{
    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function unemployment_reason(){
        return $this->belongsTo(UnemploymentReason::class);
    }

    public function request_status(){
        return $this->belongsTo(RequestStatus::class);
    }
}

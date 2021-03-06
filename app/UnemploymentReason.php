<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnemploymentReason extends Model
{
    public function unemployment_requests(){
        return $this->hasMany(UnemploymentRequest::class);
    }
}

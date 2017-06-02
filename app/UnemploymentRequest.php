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

    public static function opened(User $user = null){
        $opened_status = [1,2,3,4];

        if (!$user)
          return self::with('request_status', 'user', 'employee', 'employee.branch', 'employee.department', 'request_status.approvers')->whereIn('request_status_id', $opened_status)->orderBy('created_at')->get();

        return self::join('approvers', 'employee', 'unemployment_requests.request_status_id', '=', 'approvers.request_status_id')->where(function($query){
            $query->where('approvers.id', '=', 3)
                  ->orWhere('unemployment_requests.user_id', 1);
        })->select('unemployment_requests.*')->with('request_status', 'user', 'request_status.approvers', 'employee')->orderBy('unemployment_requests.created_at', 'asc')->get();

    }


}

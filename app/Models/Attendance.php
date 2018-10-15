<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';
    protected $fillable = ['employee_id','date','hours','status_id'];

    public function employee(){
        return $this->belongsTo('App\Employee','employee_id','id');
    }

    public function status(){
        return $this->hasOne('App\Status','id','status_id');
    }
}

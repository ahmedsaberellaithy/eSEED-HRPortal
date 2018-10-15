<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = ['name','mobile','hire_date'];

    public function attendances(){
        return $this->hasMany('App\Models\Attendance');
    }
}

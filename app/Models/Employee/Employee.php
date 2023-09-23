<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function company(){
        //relationship between table(company and employee)
        return $this->belongsTo('App\Models\Company\Company');
    }
}

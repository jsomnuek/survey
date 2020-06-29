<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Lab;

class EmployeeTraining extends Model
{
    protected $table = 'employee_trainings';
    protected $primaryKey = 'id';
    protected $fillable = ['emp_training_detail','emp_training_status'];
    public $timestamps = true;

    // Defining Relationships One To Many
    public function labs()
    {
        return $this->hasMany(Lab::class);
    }
}

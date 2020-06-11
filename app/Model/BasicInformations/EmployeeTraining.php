<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class EmployeeTraining extends Model
{
    protected $table = 'employee_trainings';
    protected $primaryKey = 'id';
    protected $fillable = ['emp_training_detail','emp_training_status'];
    public $timestamps = true;
}

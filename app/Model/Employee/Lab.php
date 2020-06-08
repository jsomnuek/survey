<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $table = 'organisation_types';
    public $primaryKey = 'id';
    public $organizeType = 'org_type_name'; 
    public $timestamps = TRUE;
}

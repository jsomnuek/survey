<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Lab;

class LabDevelopment extends Model
{
    protected $table = 'lab_developments';
    protected $primaryKey = 'id';
    protected $fillable = ['lab_dev_name','lab_dev_status',];

    public $timestamps = true;
}

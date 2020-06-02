<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaboratoryType extends Model
{
    protected $table = 'laboratory_types';
    public $primaryKey = 'id';
    public $orgTypeName = 'lab_type_name';
    public $orgTypeStatus = 'lab_type_status';
    public $timestamps = true;
}

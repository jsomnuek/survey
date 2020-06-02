<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organize extends Model
{
    protected $table = 'industrial_estates';
    public $primaryKey = 'id';
    public $organizeEstateName = 'estate_name'; 
    public $timestamps = TRUE;
    protected $table02 = 'organisation_type';
    public $organizeTypeName = 'org_type_name';
}



<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class IndustrialType extends Model
{
    protected $table = 'industrial_types';
    public $primaryKey = 'id';
    public $industrialTypeName = 'industrial_type_name';
    public $industrialTypeStatus = 'insudtrial_type_status';
    public $timestamps = true;
}

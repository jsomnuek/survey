<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class IndustrialType extends Model
{
    protected $table = 'industrial_types';
    public $primaryKey = 'id';
    public $businessTypeName = 'industrial_type_name';
    public $businessTypeStatus = 'insudtrial_type_status';
    public $timestamp = true;
}

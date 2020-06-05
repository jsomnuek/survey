<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class BusinessType extends Model
{
    protected $stable = 'business_types';
    public $primaryKey = 'id';
    public $businessTypeName = 'business_type_name';
    public $businessTypeStatus = 'business_type_status';
    public $timestamps = true;
}

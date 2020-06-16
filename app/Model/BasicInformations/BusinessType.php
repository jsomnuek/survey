<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Organization;

class BusinessType extends Model
{
    protected $stable = 'business_types';
    public $primaryKey = 'id';
    public $businessTypeName = 'business_type_name';
    public $businessTypeStatus = 'business_type_status';
    public $timestamps = true;

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }
}

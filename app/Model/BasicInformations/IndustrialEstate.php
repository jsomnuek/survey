<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

// use App\Model\Employee\Organization;

class IndustrialEstate extends Model
{
    protected $table = 'industrial_estates';
    public $primaryKey = 'id';
    public $estateName = 'estate_name';
    public $estateStatus = 'estate_status';
    public $timestamps = true;

    // public function organizations()
    // {
    //     return $this->hasMany(Organization::class);
    // }
}
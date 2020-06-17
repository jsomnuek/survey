<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

// use App\Model\Employee\Organization;

class LabLocation extends Model
{
    protected $table = 'lab_locations';
    public $primaryKey = 'id';
    public $labLocationName = 'location_name';
    public $labLocationStatus = 'location_status';
    public $timestamps = true;

    // public function organizations()
    // {
    //     return $this->hasMany(Organization::class);
    // }
}

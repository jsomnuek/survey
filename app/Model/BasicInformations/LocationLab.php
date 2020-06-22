<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

// use App\Model\Employee\Organization;

class LocationLab extends Model
{
    protected $table = 'location_labs';
    protected $primaryKey = 'id';
    protected $fillable = ['location_name','location_status',];
    
    public $timestamps = true;

    // public function organizations()
    // {
    //     return $this->hasMany(Organization::class);
    // }
}

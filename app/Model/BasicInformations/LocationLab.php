<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Lab;

class LocationLab extends Model
{
    protected $table = 'location_labs';
    protected $primaryKey = 'id';
    protected $fillable = ['location_name','location_status',];
    
    public $timestamps = true;

    public function labs()
    {
        return $this->hasMany(Lab::class);
    }
}

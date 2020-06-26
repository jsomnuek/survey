<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Lab;

class IndustrialEstate extends Model
{
    protected $table = 'industrial_estates';
    public $primaryKey = 'id';
    public $estateName = 'estate_name';
    public $estateStatus = 'estate_status';
    public $timestamps = true;

    public function labs()
    {
        return $this->hasMany(Lab::class);
    }
}
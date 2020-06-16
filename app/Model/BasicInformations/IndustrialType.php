<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Organization;

class IndustrialType extends Model
{
    protected $table = 'industrial_types';
    public $primaryKey = 'id';
    public $industrialTypeName = 'industrial_type_name';
<<<<<<< HEAD
    public $insudtrialTypeStatus = 'insudtrial_type_status';
    public $timestamps = true;

    public function organizations()
    {
        return $this->belongsToMany(Organization::class);
    }
=======
    public $industrialTypeStatus = 'insudtrial_type_status';
    public $timestamps = true;
>>>>>>> 6435712381e05ac58e395176498ff19f01769fe1
}

<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Lab;

class LaboratoryType extends Model
{
    protected $table = 'laboratory_types';
    public $primaryKey = 'id';
    public $orgTypeName = 'lab_type_name';
    public $orgTypeStatus = 'lab_type_status';
    public $timestamps = true;

    public function labs()
    {
        return $this->hasMany(Lab::class);
    }
}

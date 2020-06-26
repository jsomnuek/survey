<?php

namespace App\Model\BasicInformations;

use App\Model\Employee\EquipmentLab;
use Illuminate\Database\Eloquent\Model;

class MajorTechnology extends Model
{
    protected $table = 'major_technologies';
    public $primaryKey = 'id';
    public $orgTypeName = 'major_tech_name';
    public $orgTypeStatus = 'major_tech_status';
    public $timestamps = true;

    public function equipmentLabs()
    {
        return $this->belongsToMany(EquipmentLab::class)->withTimestamps();
    }
}

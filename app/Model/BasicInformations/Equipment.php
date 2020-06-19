<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;
use App\Model\Employee\EquipmentLab;

class Equipment extends Model
{
    protected $table = 'equipments';
    public $primaryKey = 'id';
    public $equipmentName = 'equipment_name';
    public $equipmentAbbr = 'equipment_abbr';
    public $equipmentStatus = 'equipment_status';
    public $timestamps = TRUE;

    public function equipmentLabs()
    {
        return $this->belongsTo(EquipmentLab::class);
    }
}

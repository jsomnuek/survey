<?php

namespace App\Model\Employee;
use App\Model\BasicInformations\TechnicalEquipment;
use Illuminate\Database\Eloquent\Model;

class EquipmentLab extends Model
{
    protected $table = 'technical_equipments';
    public $primaryKey = 'id';
    public $technicalEquipmentName = 'technical_equipment_name';
    public $timestamps = TRUE;
}

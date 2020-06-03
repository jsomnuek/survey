<?php

namespace App;
use App\TechnicalEquipment;
use Illuminate\Database\Eloquent\Model;

class EquipmentLab extends Model
{
    protected $table = 'technical_equipments';
    public $primaryKey = 'id';
    public $technicalEquipmentName = 'technical_equipment_name';
    public $timestamps = TRUE;
}

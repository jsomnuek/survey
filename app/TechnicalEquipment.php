<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnicalEquipment extends Model
{
    protected $table = 'technical_equipment';
    public $primaryKey = 'id';
    public $technicalEquipmentName = 'technical_equipment_name';
    public $technicalEquipmentStatus = 'technical_equipment_status';
    public $timestamps = TRUE;
}

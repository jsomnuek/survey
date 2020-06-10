<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipments';
    public $primaryKey = 'id';
    public $equipmentName = 'equipment_name';
    public $equipmentAbbr = 'equipment_abbr';
    public $equipmentStatus = 'equipment_status';
    public $timestamps = TRUE;
}

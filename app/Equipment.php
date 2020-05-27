<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipments';
    public $primaryKey = 'id';
    public $equipmentName = 'equipment_name';
    public $equipmentStatus = 'equipment_status';
    public $timestamps = TRUE;
}

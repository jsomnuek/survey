<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class EquipmentMaintenance extends Model
{
    protected $table = 'equipment_maintenances';
    protected $primaryKey = 'id';
    protected $fillable = ['equipment_maintenance_name','equipment_maintenance_status'];

    public $timestamps = true;
}

<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Equipment;

class EquipmentMaintenance extends Model
{
    protected $table = 'equipment_maintenances';
    protected $primaryKey = 'id';
    protected $fillable = ['equipment_maintenance_name','equipment_maintenance_status'];

    public $timestamps = true;

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }
}

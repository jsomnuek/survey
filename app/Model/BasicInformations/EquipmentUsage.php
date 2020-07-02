<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;
use App\Model\Employee\Equipment;

class EquipmentUsage extends Model
{
    protected $table = 'equipment_usages';
    protected $primaryKey = 'id';
    protected $fillable = ['equipment_usage_name','equipment_usage_status'];

    public $timestamps = true;

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }
}

<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class EquipmentRent extends Model
{
    protected $table = 'equipment_rents';
    protected $primaryKey = 'id';
    protected $fillable = ['equipment_rent_name','equipment_rent_status'];

    public $timestamps = true;

}

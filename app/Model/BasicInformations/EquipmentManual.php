<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class EquipmentManual extends Model
{
    protected $table ='equipment_manuals';
    protected $primaryKey ='id';
    protected $fillable = ['equipment_manual_name','equipment_manual_status'];

    public $timestamps = true;
}

<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class EquipmentCalibration extends Model
{
    protected $table = 'equipment_calibrations';
    protected $primaryKey ='id';
    protected $fillable = ['equipment_calibration_name','equipment_calibration_status'];

    public $timestamps = true;
}

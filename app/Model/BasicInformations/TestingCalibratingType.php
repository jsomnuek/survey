<?php

namespace App\Model\BasicInformations;
use Illuminate\Database\Eloquent\Model;

class TestingCalibratingType extends Model
{
    protected $table = 'testing_calibrating_types';
    public $primaryKey = 'id';
    public $testingCalibratingTypeName = 'testing_calibrating_type_name';
    public $testingCalibratingTypeStatus = 'testing_calibrating_type_status';
    public $timestamps = true;
}

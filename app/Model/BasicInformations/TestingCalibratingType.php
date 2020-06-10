<?php

namespace App\Model\BasicInformations;
<<<<<<< HEAD
=======

>>>>>>> ca6f2d4b4922e07f3cc223db3647f9d41c9a6edf
use Illuminate\Database\Eloquent\Model;

class TestingCalibratingType extends Model
{
    protected $table = 'testing_calibrating_types';
    public $primaryKey = 'id';
    public $testingCalibratingTypeName = 'testing_calibrating_type_name';
    public $testingCalibratingTypeStatus = 'testing_calibrating_type_status';
    public $timestamps = true;
}

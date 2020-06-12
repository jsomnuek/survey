<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class TestingCalibratingMethod extends Model
{
    protected $table = 'testing_calibrating_methods';
    protected $primaryKey = 'id';
    protected $fillable = ['testing_method_name','testing_method_status'];

    public $timestamps = true;
}

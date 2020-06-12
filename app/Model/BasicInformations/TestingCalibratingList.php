<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class TestingCalibratingList extends Model
{
    protected $table = 'testing_calibrating_lists';
    protected $primaryKey = 'id';
    protected $fillable = ['testing_list_name','testing_list_status'];

    public $timestamps = true;
}

<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class LabLocation extends Model
{
    protected $table = 'lab_locations';
    public $primaryKey = 'id';
    public $labLocationName = 'location_name';
    public $labLocationStatus = 'location_status';
    public $timestamps = true;
}

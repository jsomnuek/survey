<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndustrialEstate extends Model
{
    protected $table = 'industrial_estates';
    public $primaryKey = 'id';
    public $estateName = 'estate_name';
    public $estateStatus = 'estate_status';
    public $timestamps = true;
}
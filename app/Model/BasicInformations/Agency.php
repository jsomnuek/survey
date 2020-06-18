<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $table = 'agencies';
    protected $primaryKey = 'id';
    protected $fillable = ['agency_name', 'province_id', 'region_id', 'agency_status', ];

    public $timestamps = true;
}

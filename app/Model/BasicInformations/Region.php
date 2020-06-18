<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';
    protected $primaryKey = 'id';
    protected $fillable = ['region_name','region_status',];

    public $timestamp = true;
}

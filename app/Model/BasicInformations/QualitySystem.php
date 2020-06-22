<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class QualitySystem extends Model
{
    protected $table = 'quality_systems';
    protected $primaryKey = 'id';
    protected $fillable = ['quality_system_name', 'quality_system_status',];

    public $timestamps = true;
}

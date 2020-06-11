<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class EnvironmentManage extends Model
{
    protected $table = 'environment_manages';
    protected $primaryKey = 'id';
    protected $fillable = ['env_manage_name','env_manage_status'];
    public $timestamps = true;
}

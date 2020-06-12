<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class ResultControl extends Model
{
    protected $table = 'result_controls';
    protected $primaryKey = 'id';
    protected $fillable = ['result_control_name','result_control_status'];

    public $timestamps = true;
}

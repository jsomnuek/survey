<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class ProficiencyTesting extends Model
{
    protected $table = 'proficiency_testings';
    protected $primaryKey = 'id';
    protected $fillable = ['pt_name','pt_status'];

    public $timestamps = true;
}

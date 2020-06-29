<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Lab;

class EducationLevel extends Model
{
    protected $table = 'education_levels';
    protected $primaryKey = 'id';
    protected $fillable = ['edu_level_name','edu_level_abbr','edu_level_status',];

    public $timestamps = true;
}

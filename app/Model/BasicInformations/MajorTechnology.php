<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MajorTechnology extends Model
{
    protected $table = 'major_technologies';
    public $primaryKey = 'id';
    public $orgTypeName = 'major_tech_name';
    public $orgTypeStatus = 'major_tech_status';
    public $timestamps = true;
}

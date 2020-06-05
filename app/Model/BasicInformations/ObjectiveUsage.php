<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjectiveUsage extends Model
{
    protected $table = 'objective_usages';
    public $primaryKey = 'id';
    public $orgTypeName = 'obj_usage_name';
    public $orgTypeStatus = 'obj_usage_status';
    public $timestamps = true;
}

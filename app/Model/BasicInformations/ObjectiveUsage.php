<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Equipment;

class ObjectiveUsage extends Model
{
    protected $table = 'objective_usages';
    public $primaryKey = 'id';
    public $orgTypeName = 'obj_usage_name';
    public $orgTypeStatus = 'obj_usage_status';
    public $timestamps = true;

    public function equipments()
    {
        return $this->belongsToMany(Equipment::class)->withTimestamps();
    }

}

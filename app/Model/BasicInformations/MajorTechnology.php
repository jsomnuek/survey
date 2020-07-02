<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Equipment;

class MajorTechnology extends Model
{
    protected $table = 'major_technologies';
    public $primaryKey = 'id';
    public $orgTypeName = 'major_tech_name';
    public $orgTypeStatus = 'major_tech_status';
    public $timestamps = true;

    public function equipments()
    {
        return $this->belongsToMany(Equipment::class)->withTimestamps();
    }
}

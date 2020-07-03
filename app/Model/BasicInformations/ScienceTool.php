<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Equipment;

class ScienceTool extends Model
{
    protected $table = 'science_tools';
    public $primaryKey = 'id';
    public $equipmentName = 'science_tool_name';
    public $equipmentAbbr = 'science_tool_abbr';
    public $equipmentStatus = 'science_tool_status';
    public $timestamps = TRUE;

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }
    
}

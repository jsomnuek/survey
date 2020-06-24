<?php

namespace App\Model\Employee;
use App\Model\BasicInformations\ScienceTool;
use App\Model\BasicInformations\MajorTechnology;
use App\Model\BasicInformations\ObjectiveUsage;
use App\Model\BasicInformations\EquipmentUsage;
use App\Model\BasicInformations\EquipmentMaintenance;
use Illuminate\Database\Eloquent\Model;

class EquipmentLab extends Model
{
    protected $table = 'equipment_labs';
    public $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = TRUE;

    // relation for 3.2.1 ชื่อเครื่องมือEN
    public function scienceTool()
    {
        return $this->belongsTo(ScienceTool::class);
    }

    // relation for 3.10 สาขาเทคโนโลยี มากกว่า1รายการ
    public function majorTechnologies()
    {
        return $this->belongsToMany(MajorTechnology::class);
    }

    // relation for 3.11 วัตถุประสงค์การใข้งาน มากกว่า 1 รายการ
    public function objectiveUsages()
    {
        return $this->belongsToMany(ObjectiveUsage::class);
    }

    // relation for 3.12 ขอบเขตการใข้งานเครื่องมือ
    public function equipmentUsage()
    {
        return $this->belongsTo(EquipmentUsage::class);
    }

    // relation for 3.16 การตรวจเช็คเครื่องมือ
    public function equipmentMaintenance()
    {
        return $this->belongsTo(EquipmentMaintenance::class);
    }

}



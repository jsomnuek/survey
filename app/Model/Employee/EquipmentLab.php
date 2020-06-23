<?php

namespace App\Model\Employee;
use App\Model\BasicInformations\ScienceTool;
use Illuminate\Database\Eloquent\Model;

class EquipmentLab extends Model
{
    protected $table = 'equipment_labs';
    public $primaryKey = 'id';
    public $fillable = [
        'equipment_lab_id ',
        'equipments_id ',
        'equipment_name_th',
        'equipment_brand',
        'equipment_model',
        'equipment_org_code',
        'major_technologies_id',
        'technical_equipments_id',
        'equipment_year',
        'equipment_price',
        'equipment_supplier',
        'objective_usages_id',
        'equipment_usages_id',
        'equipment_ability',
        'equipment_pic',
        'equipment_calibrations_id',
        'equipment_calibration_by',
        'equipment_calibration_year',
        'equipment_maintenances_id',
        'equipment_maintenance_budget',
        'equipment_admin_name',
        'equipment_admin_phone',
        'equipment_admin_email',
        'equipment_manuals_id',
        'equipment_manual_name',
        'equipment_manual_locate',
        'equipments_rent_id',
        'equipment_rent_fee',
        'equipment_rent_detail'
    ];
    public $timestamps = TRUE;

    public function equipments()
    {
        return $this->belongsTo(ScienceTool::class);
    }
}



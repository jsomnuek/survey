<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Model\Employee\Organization;
use App\Model\BasicInformations\IndustrialEstate;
use App\Model\BasicInformations\LaboratoryType;
use App\Model\BasicInformations\AreaService;
use App\Model\BasicInformations\EducationLevel;
use App\Model\BasicInformations\FixedCost;
use App\Model\BasicInformations\IncomePerYear;
use App\Model\BasicInformations\LabDevelopment;

class Lab extends Model
{
    protected $table = 'labs';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [''];
    */
    
    protected $guarded = [];

    public $timestamps = true;

    // Defining Relationships One To Many
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Defining Relationships One To Many
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    // Defining Relationships One To Many
    public function industrialEstate()
    {
        return $this->belongsTo(IndustrialEstate::class);
    }

    // Defining Relationships One To Many
    public function laboratoryType()
    {
        return $this->belongsTo(LaboratoryType::class);
    }

    // Defining Relationships One To Many
    public function areaService()
    {
        return $this->belongsTo(AreaService::class);
    }

    // Defining Relationships Many To Many
    public function educationLevels()
    {
        return $this->belongsToMany(EducationLevel::class)->withTimestamps();
    }

    // Defining Relationships One To Many
    public function fixedCost()
    {
        return $this->belongsTo(FixedCost::class);
    }

    // Defining Relationships One To Many
    public function incomePerYear()
    {
        return $this->belongsTo(IncomePerYear::class);
    }

    // Defining Relationships Many To Many
    public function labDevelopments()
    {
        return $this->belongsToMany(LabDevelopment::class)->withTimestamps();
    }
}

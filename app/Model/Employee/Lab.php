<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Model\Employee\Organization;
use App\Model\BasicInformations\IndustrialEstate;
use App\Model\BasicInformations\LaboratoryType;
use App\Model\BasicInformations\AreaService;

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
}

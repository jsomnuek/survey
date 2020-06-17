<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Model\ProvinceInfo;
use App\Model\BasicInformations\SaleProduct;
use App\Model\BasicInformations\Country;
use App\Model\BasicInformations\OrganisationType;
use App\Model\BasicInformations\BusinessType;
use App\Model\BasicInformations\IndustrialType;

class Organization extends Model
{
    protected $table = 'organizations';

    protected $primaryKey = 'id';

    /*
    protected $fillable = ['org_name'];
    */
    
    protected $guarded = [];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Defining Relationships 1.4 One To Many
    public function provinceInfoCh()
    {
        return $this->belongsTo(ProvinceInfo::class, 'province_info_ch_id' , 'ch_id');
    }

    public function provinceInfoAm()
    {
        return $this->belongsTo(ProvinceInfo::class, 'province_info_am_id' , 'am_id');
    }

    public function provinceInfoTa()
    {
        return $this->belongsTo(ProvinceInfo::class, 'province_info_ta_id' , 'ta_id');
    }

    // Defining Relationships 1.7 Many To Many
    public function saleProducts()
    {
        return $this->belongsToMany(SaleProduct::class)->withTimestamps();
    }

    // Defining Relationships 1.7 Many To Many
    public function countries()
    {
        return $this->belongsToMany(Country::class)->withTimestamps();
    }
    
    // Defining Relationships 1.8 One To Many
    public function organisationType()
    {
        return $this->belongsTo(OrganisationType::class);
    }
    
    // Defining Relationships 1.9 One To Many
    public function businessType()
    {
        return $this->belongsTo(BusinessType::class);
    }
    
    // Defining Relationships 1.10 Many To Many
    public function industrialTypes()
    {
        return $this->belongsToMany(IndustrialType::class)->withTimestamps();
    }

}
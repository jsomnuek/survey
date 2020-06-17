<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Organization;

class Country extends Model
{
    protected $table = 'countries';
    protected $primaryKey = 'id';
    protected $fillable = ['country_code','country_name_thai','country_name_eng','country_status'];

    public $timestamps = true;

    public function organizations()
    {
        return $this->belongsToMany(Organization::class);
    }
}

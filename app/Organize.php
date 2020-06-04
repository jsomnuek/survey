<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organize extends Model
{
    protected $table = 'organizes';
    protected $fillable = [
        'org_name',
        'org_code',
        'org_number',
        'org_location',
        'org_building',
        'org_floor',
        'org_address',
        'org_road',
        'org_soi',
        'org_postcode',
        'org_ch_id',
        'org_am_id',
        'org_ta_id',
        'org_phone',
        'org_fax',
        'org_email',
        'org_website',
        'org_lat',
        'org_long',
        'org_type',
        'org_business',
        'org_import_export',
        'org_capital',
        'org_employee',
        'org_industrial_type',
    ];

    public $timestamps = true;
}



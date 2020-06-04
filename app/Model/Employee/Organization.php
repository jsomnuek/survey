<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organizations';

    protected $primaryKey = 'id';

    protected $fillable = [
        'org_name','org_number','org_building','org_floor','org_address','org_soi',
        'org_road','org_postcode','org_postcode','org_fax','org_email','org_website',
        'org_lat','org_long','org_capital','org_employee_amount'
    ];

    public $timestamps = true;
}

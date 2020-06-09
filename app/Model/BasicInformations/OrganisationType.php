<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class OrganisationType extends Model
{
    protected $table = 'organisation_types';
    public $primaryKey = 'id';
    public $orgTypeName = 'org_type_name';
    public $orgTypeStatus = 'org_type_status';
    public $timestamps = true;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CertifyLaboratory extends Model
{
    protected $table = 'certify_laboratories';
    public $primaryKey = 'id';
    public $orgTypeName = 'cert_lab_name';
    public $orgTypeStatus = 'cert_lab_status';
    public $timestamps = true;
}

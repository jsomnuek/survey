<?php

namespace App\Model\BasicInformations;
<<<<<<< HEAD
=======

>>>>>>> ca6f2d4b4922e07f3cc223db3647f9d41c9a6edf
use Illuminate\Database\Eloquent\Model;

class CertifyLaboratory extends Model
{
    protected $table = 'certify_laboratories';
    public $primaryKey = 'id';
    public $orgTypeName = 'cert_lab_name';
    public $orgTypeStatus = 'cert_lab_status';
    public $timestamps = true;
}

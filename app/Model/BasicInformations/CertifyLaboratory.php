<?php

namespace App\Model\BasicInformations;
use Illuminate\Database\Eloquent\Model;
use App\Model\Empolyee\ProductLab;

class CertifyLaboratory extends Model
{
    protected $table = 'certify_laboratories';
    public $primaryKey = 'id';
    public $orgTypeName = 'cert_lab_name';
    public $orgTypeStatus = 'cert_lab_status';
    public $timestamps = true;

    public function productLabs()
    {
        return $this->hasMany(ProductLab::class);
    }
}

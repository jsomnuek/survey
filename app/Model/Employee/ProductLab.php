<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Model\BasicInformations\ProductType;
use App\Model\BasicInformations\TestingCalibratingType;

class ProductLab extends Model
{
    protected $table = 'product_labs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_lab_name',
        'product_type_id',
        'product_lab_standard',
        'product_lab_test_name',
        'product_lab_test_process',
        'testing_calibrating_type_id',
        'product_lab_test_method',
        'product_lab_test_method_detail',
        'product_lab_test_unit',
        'product_lab_test_duration',
        'product_lab_test_fee',
        'product_lab_material_ref',
        'product_lab_material_ref_from',
        'product_lab_test_control',
        'proficiency_testing',
        'proficiency_testing_by',
        'proficiency_testing_year',
        'certify_laboratory_id'
    ];
    public $timestamps = true;

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }
    
    public function testingCalibratingType()
    {
        return $this->belongsTo(TestingCalibratingType::class);
    }
}

<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;
use App\Model\Employee\ProductLab;

class TestingCalibratingMethod extends Model
{
    protected $table = 'testing_calibrating_methods';
    protected $primaryKey = 'id';
    protected $fillable = ['testing_method_name','testing_method_status'];

    public $timestamps = true;

    public function productLabs()
    {
        return $this->hasMany(ProductLab::class);
    }
}

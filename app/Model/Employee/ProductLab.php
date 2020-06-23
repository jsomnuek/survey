<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Model\BasicInformations\ProductType;
use App\Model\BasicInformations\ResultControl;
use App\Model\BasicInformations\TestingCalibratingList;

class ProductLab extends Model
{
    protected $table = 'product_labs';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = true;



    public function testingCalibratingLists()
    {
        return $this->belongsTo(TestingCalibratingList::class);
    }
    
    public function productTypes()
    {
        return $this->belongsToMany(ProductType::class)->withTimestamps();
    }

    public function resultControls()
    {
        return $this->belongsToMany(ResultControl::class)->withTimestamps();
    }
}

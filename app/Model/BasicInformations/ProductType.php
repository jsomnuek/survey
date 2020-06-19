<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;
use App\Model\Employee\ProductLab;

class ProductType extends Model
{
    protected $table = 'product_types' ;
    public $primaryKey = 'id';
    public $productTypeName = 'product_type_name';
    public $productTypeStatus = 'product_type_status';
    public $timestamps = true;

    public function productLabs()
    {
        return $this->belongsToMany(ProductLab::class)->withTimestamps();
    }
    
}

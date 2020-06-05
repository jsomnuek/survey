<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_types' ;
    public $primaryKey = 'id';
    public $productTypeName = 'product_type_name';
    public $productTypeStatus = 'product_type_status';
    public $timestamps = true;
}

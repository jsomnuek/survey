<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    protected $table = 'sale_products';
    public $primaryKey = 'id';
    public $saleProductName = 'sale_product_name';
    public $saleProductStatus = 'sale_product_status';
    public $timestamps = true;
}

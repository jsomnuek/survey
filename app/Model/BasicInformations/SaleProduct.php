<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Organization;

class SaleProduct extends Model
{
    protected $table = 'sale_products';
    public $primaryKey = 'id';
    public $saleProductName = 'sale_product_name';
    public $saleProductStatus = 'sale_product_status';
    public $timestamps = true;

    public function organizations()
    {
        return $this->belongsToMany(Organization::class)->withTimestamps();
    }
}

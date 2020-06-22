<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Lab;

class AreaService extends Model
{
    protected $table = 'area_services';
    protected $primaryKey ='id';
    protected $fillable = ['area_service_name','area_service_status'];
    public $timestamps = true;

    public function labs()
    {
        return $this->hasMany(Lab::class);
    }
}

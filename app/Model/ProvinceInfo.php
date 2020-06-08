<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProvinceInfo extends Model
{
    protected $table = 'province_infos';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }
}

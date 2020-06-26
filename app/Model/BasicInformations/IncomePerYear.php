<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Lab;

class IncomePerYear extends Model
{
    protected $table = 'income_per_years';
    protected $primaryKey = 'id';
    protected $fillable = ['income_detail','income_status'];
    public $timestamps = true;

    // Defining Relationships One To Many
    public function labs()
    {
        return $this->hasMany(Lab::class);
    }
}

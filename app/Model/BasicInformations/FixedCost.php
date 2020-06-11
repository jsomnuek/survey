<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class FixedCost extends Model
{
    protected $table = 'fixed_costs';
    protected $primaryKey = 'id';
    protected $fillable = ['fixed_cost_name','fixed_cost_status'];
    public $timestamps = true;
}

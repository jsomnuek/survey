<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Region extends Model
{
    protected $table = 'regions';
    protected $primaryKey = 'id';
    protected $fillable = ['region_name','region_status',];

    public $timestamp = true;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

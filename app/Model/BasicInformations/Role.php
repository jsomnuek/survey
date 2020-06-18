<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $fillable = ['role_name','role_status',];

    public $timestamps = true;
}

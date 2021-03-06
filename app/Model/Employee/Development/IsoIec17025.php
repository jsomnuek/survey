<?php

namespace App\Model\Employee\Development;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Lab;

class IsoIec17025 extends Model
{
    protected $table = 'development_iso_iec17025_labs';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [''];
    */
    
    protected $guarded = [];

    public $timestamps = true;

    // Defining Relationships One To Many
    public function labs()
    {
        return $this->belongsTo(Lab::class);
    }
}

<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Lab;

class SurveyStatus extends Model
{
    protected $table = 'survey_statuses';
    protected $primaryKey = 'id';
    protected $fillable = ['survey_status_name_en','survey_status_name_th','survey_status_status',];

    public $timestamps = true;

    // Defining Relationships One To Many
    public function lab()
    {
        return $this->hasMany(Lab::class);
    }
}

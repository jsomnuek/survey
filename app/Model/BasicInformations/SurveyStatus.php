<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;

class SurveyStatus extends Model
{
    protected $table = 'survey_statuses';
    protected $primaryKey = 'id';
    protected $fillable = ['survey_status_name','survey_status_status',];
}

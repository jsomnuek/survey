<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('survey_status_name_en',255)->comment('ชื่อสถานะภาษาอังกฤษ');
            $table->string('survey_status_name_th',255)->comment('ชื่อสถานะภาษาไทย');
            $table->string('survey_status_status',1)->default('A')->comment('สถานะการใช้งานข้อมูล');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_statuses');
    }
}

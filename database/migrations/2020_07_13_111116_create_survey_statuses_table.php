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
            $table->string('survey_status_name',255)->comment('รายการสถานะแบบสำรวจ');
            $table->string('survey_status_status',1)->default('A')->comment('รายการสถานะแบบสำรวจ');
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

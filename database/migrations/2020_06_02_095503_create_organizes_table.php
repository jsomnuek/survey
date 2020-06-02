<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('org_name',255);
            $table->string('org_code',255);
            $table->string('org_number',255)->nullable();
            $table->string('org_location',255);
            $table->string('org_building',255)->nullable();
            $table->string('org_floor',255)->nullable();
            $table->string('org_address',255);
            $table->string('org_road',255)->nullable();
            $table->string('org_soi',255)->nullable();
            $table->string('org_postcode',6);
            $table->integer('org_ch_id');        
            $table->integer('org_am_id');        
            $table->integer('org_ta_id');
            $table->string('org_phone',255);   
            $table->string('org_fax',255);   
            $table->string('org_email',255);  
            $table->string('org_website',255)->nullable();
            $table->string('org_lat',255)->nullable();  
            $table->string('org_long',255)->nullable();
            $table->string('org_type',255)->nullable();
            $table->string('org_business',255)->nullable();
            $table->string('org_import_export',255)->nullable();
            $table->string('org_capital',255)->nullable();
            $table->string('org_employee',255)->nullable();
            $table->string('org_industrial_type',255)->nullable();
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
        Schema::dropIfExists('organizes');
    }
}

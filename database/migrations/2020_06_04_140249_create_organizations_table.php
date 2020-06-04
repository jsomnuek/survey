<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('org_name');
            $table->string('org_number')->nullable();
            $table->string('org_building')->nullable();
            $table->string('org_floor')->nullable();
            $table->string('org_address');
            $table->string('org_soi')->nullable();
            $table->string('org_road')->nullable();
            $table->integer('org_postcode');
            $table->string('org_phone');
            $table->string('org_fax')->nullable();
            $table->string('org_email');
            $table->string('org_website')->nullable();
            $table->float('org_lat')->nullable();  
            $table->float('org_long')->nullable();
            $table->integer('org_capital')->nullable();
            $table->integer('org_employee_amount')->nullable();
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
        Schema::dropIfExists('organizations');
    }
}

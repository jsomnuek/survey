<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinceInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('province_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ad_level');
            $table->integer('ta_id');
            $table->string('tambon_t');
            $table->string('tambon_e');
            $table->integer('am_id');
            $table->string('amphoe_t');
            $table->string('amphoe_e');
            $table->integer('ch_id');
            $table->string('changwat_t');
            $table->string('changwat_e');
            $table->float('lat');
            $table->float('long');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('province_infos');
    }
}

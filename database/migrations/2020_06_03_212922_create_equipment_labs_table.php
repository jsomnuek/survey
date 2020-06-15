<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_labs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('equipmentLabID')->comment('รหัสเครื่องมือ AABCC-MNN-RRRSS');//3.1 รหัสเครื่องมือ AABCC-MNN-RRRSS
            $table->integer('equipments_id')->comment('ชื่อเครื่องมือEN');//3.2 ชื่อผลิตเครื่องมือEN
            $table->string('equipmentNameTH', 255)->comment('ชื่อเครื่องมือTH');//3.3ชื่อเครื่องมือTH
            $table->string('equipmentBrand', 255)->nullable()->comment('ยี่ห้อเครื่องมือ');//3.4ยี่ห้อเครื่องมือ
            $table->string('equipmentModel', 255)->nullable()->comment('รุ่นเครื่องมือ');//3.5รุ่นเครื่องมือ
            $table->string('equipmentOrgCode', 255)->nullable()->comment('รหัสเครื่องมือในหน่วยงาน');//3.6รหัสเครื่องมือในหน่วยงาน
            $table->integer('major_technologies_id')->comment('สาขาเทคโนเครื่องมือ');//3.7สาขาเทคโนเครื่องมือ
            $table->integer('technical_equipments_id')->comment('เทคนิคเครื่องมือ');//3.8เทคนิคเครื่องมือ
            $table->integer('equipmentYear')->nullable()->comment('ปีที่ซื้อเครื่องมือ');//3.9ปีที่ซื้อเครื่องมือ
            $table->integer('equipmentPrice')->nullable()->comment('มูลค่าเครื่องมือ');//3.10มูลค่าเครื่องมือ
            $table->string('equipmentSupplier', 255)->nullable()->comment('บริษัทที่จำหน่าจย');//3.11บริษัทที่จำหน่าย
            $table->integer('objective_usages_id')->comment('วัตถุประสงค์การใช้งาน');//3.12วัตถุประสงค์การใช้งาน
            $table->integer('equipment_usages_id')->comment('ขอบเขตการใช้งานเครื่องมือ');//3.13ขอบเขตการใช้งานเครื่องมือ
            $table->string('equipmentAbility', 255)->nullable()->comment('คสามารถคละเอียดเครื่องมือ');//3.14คสามารถคละเอียดเครื่องมือ
            $table->string('equipmentPic')->comment('รูปเครื่องมือ');//3.15รูปเครื่องมือ
            $table->integer('equipment_calibrations_id')->nullable()->comment('การสอบเทียบเครื่องมือ');//3.16การสอบเทียบเครื่องมือ
            $table->string('equipmentCalibrationBy', 255)->comment('การสอบเทียบเครื่องมือโดย');//3.16.1การสอบเทียบเครื่องมือโดย
            $table->integer('equipmentCalibrationYear')->comment('การสอบเทียบเครื่องมือปี');//3.16.2การสอบเทียบเครื่องมือปี
            $table->integer('equipment_maintenances_id')->comment('การบำรุงรักษา');//3.17การบำรุงรักษา
            $table->integer('equipmentMaintenanceBudget')->nullable()->comment('ค่าบำรุงรักษา');//3.18ค่าบำรุงรักษา
            $table->integer('equipmentAdminName')->nullable()->comment('ผู้ดูแลเครื่องมือชื่อ');//3.19.1ผู้ดูแลเครื่องมือชื่อ
            $table->integer('equipmentAdminPhone')->nullable()->comment('ผู้ดูแลเครื่องมือเบอร์โทร');//3.19.2ผู้ดูแลเครื่องมือเบอร์โทร
            $table->integer('equipmentAdminEmail')->nullable()->comment('ผู้ดูแลเครื่องมืออีเมล์');//3.19.3ผู้ดูแลเครื่องมืออีเมล์
            $table->integer('equipment_manuals_id')->comment('คู่มือเครื่องมือ');//3.20คู่มือเครื่องมือ
            $table->string('equipmentManualName')->nullable()->comment('ชื่อคู่มือเครื่องมือ');//3.20.1ชื่อคู่มือเครื่องมือ
            $table->string('equipmentManualLocate' , 255)->nullable()->comment('ที่อยูคู่มือเครื่องมือ');//3.20.2ที่อยู่คู่มือเครื่องมือ
            $table->integer('equipments_rent_id')->comment('เช่าใช้เครื่องมือ');//3.21เช่าใช้เครื่องมือ
            $table->integer('equipmentRentFee')->nullable()->comment('ค่าเช่าใช้เครื่องมือ');//3.21.1ค่าเช่าใช้เครื่องมือ
            $table->string('equipmentRentDetail', 255)->nullable()->comment('รายละเอียดเช่าใช้เครื่องมือ');//3.21.2รายละเอียดเช่าใช้เครื่องมือ


            // note - dont forget to add nullable 
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
        Schema::dropIfExists('equipment_labs');
    }
}

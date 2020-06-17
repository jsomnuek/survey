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
            $table->string('equipment_lab_id')->comment('รหัสเครื่องมือ AABCC-MNN-RRRSS');                  //3.1 รหัสเครื่องมือ AABCC-MNN-RRRSS
            $table->integer('equipments_id')->comment('ชื่อเครื่องมือEN');                                   //3.2 ชื่อผลิตเครื่องมือEN
            $table->string('equipment_name_th', 255)->nullable()->comment('ชื่อเครื่องมือTH');               //3.3ชื่อเครื่องมือTH
            $table->string('equipment_brand', 255)->nullable()->comment('ยี่ห้อเครื่องมือ');                  //3.4ยี่ห้อเครื่องมือ
            $table->string('equipment_model', 255)->nullable()->comment('รุ่นเครื่องมือ');                   //3.5รุ่นเครื่องมือ
            $table->string('equipment_org_code', 255)->nullable()->comment('รหัสเครื่องมือในหน่วยงาน');      //3.6รหัสเครื่องมือในหน่วยงาน
            $table->integer('equipment_year')->nullable()->comment('ปีที่ซื้อเครื่องมือ');                          //3.7ปีที่ซื้อเครื่องมือ
            $table->integer('equipment_price')->nullable()->comment('มูลค่าเครื่องมือ');                         //3.8มูลค่าเครื่องมือ
            $table->string('equipment_supplier', 255)->nullable()->comment('บริษัทที่จำหน่าจย');                //3.9บริษัทที่จำหน่าย
            $table->integer('major_technologies_id')->comment('สาขาเทคโนเครื่องมือ');                          //3.10สาขาเทคโนเครื่องมือ
            $table->integer('objective_usages_id')->comment('วัตถุประสงค์การใช้งาน');                           //3.11วัตถุประสงค์การใช้งาน
            $table->integer('equipment_usages_id')->comment('ขอบเขตการใช้งานเครื่องมือ');                       //3.12ขอบเขตการใช้งานเครื่องมือ
            $table->string('equipment_ability', 255)->nullable()->comment('คสามารถคละเอียดเครื่องมือ');         //3.13คสามารถคละเอียดเครื่องมือ
            $table->string('equipment_pic')->nullable()->comment('รูปเครื่องมือ');                              //3.14รูปเครื่องมือ
            $table->integer('equipment_calibrations_id')->nullable()->comment('การสอบเทียบเครื่องมือ');         //3.15การสอบเทียบเครื่องมือ
            $table->string('equipment_calibration_by', 255)->nullable()->comment('การสอบเทียบเครื่องมือโดย');   //3.15.1การสอบเทียบเครื่องมือโดย
            $table->integer('equipment_calibration_year')->nullable()->comment('การสอบเทียบเครื่องมือปี');       //3.15.2การสอบเทียบเครื่องมือปี
            $table->integer('equipment_maintenances_id')->comment('การบำรุงรักษา');                           //3.16การบำรุงรักษา
            $table->integer('equipment_maintenance_budget')->nullable()->comment('ค่าบำรุงรักษา');              //3.17ค่าบำรุงรักษา
            $table->string('equipment_admin_name',255)->nullable()->comment('ผู้ดูแลเครื่องมือชื่อ');               //3.18.1ผู้ดูแลเครื่องมือชื่อ
            $table->string('equipment_admin_phone',)->nullable()->comment('ผู้ดูแลเครื่องมือเบอร์โทร');            //3.18.2ผู้ดูแลเครื่องมือเบอร์โทร
            $table->string('equipment_admin_email')->nullable()->comment('ผู้ดูแลเครื่องมืออีเมล์');               //3.18.3ผู้ดูแลเครื่องมืออีเมล์
            $table->integer('equipment_manuals_id')->nullable()->comment('คู่มือเครื่องมือ');                     //3.19.1คู่มือเครื่องมือ
            $table->string('equipment_manual_name')->nullable()->comment('ชื่อคู่มือเครื่องมือ');                   //3.19.2ชื่อคู่มือเครื่องมือ
            $table->string('equipment_manual_locate' , 255)->nullable()->comment('ที่อยูคู่มือเครื่องมือ');          //3.19.3ที่อยู่คู่มือเครื่องมือ
            $table->integer('equipments_rent_id')->comment('เช่าใช้เครื่องมือ');                                 //3.20.1เช่าใช้เครื่องมือ
            $table->integer('equipment_rent_fee')->nullable()->comment('ค่าเช่าใช้เครื่องมือ');                     //3.20.2ค่าเช่าใช้เครื่องมือ
            $table->string('equipment_rent_detail', 255)->nullable()->comment('รายละเอียดเช่าใช้เครื่องมือ');         //3.20.3รายละเอียดเช่าใช้เครื่องมือ


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

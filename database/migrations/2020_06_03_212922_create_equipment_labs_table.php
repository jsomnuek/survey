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
            $table->unsignedBigInteger('user_id')->comment('รหัสผู้ใช้งานระบบที่เทคแอคชั่นกกับเรคอร์ด'); //รหัสผู้ใช้งานระบบ
            $table->string('equipment_lab_id')->nullable()->comment('รหัสเครื่องมือ AABCC-MNN-RRRSS');                  //3.1 รหัสเครื่องมือ AABCC-MNN-RRRSS
            $table->integer('science_tool_id')->nullable()->comment('ชื่อเครื่องมือEN');                                 //3.2.1 ชื่อผลิตเครื่องมือEN
            $table->string('science_tool_other_name', 255)->nullable()->comment('ชื่อเต็มเครื่องมือENอ่ืนๆ');               //3.2.2 ชื่อเต็มเครื่องมือEN
            $table->string('science_tool_other_abbr', 255)->nullable()->comment('ชื่อย่อเครื่องมือENอ่ืนๆ');                //3.2.3 ชื่อย่อเครื่องมือEN
            $table->string('equipment_name_th', 255)->nullable()->comment('ชื่อเครื่องมือTH');               //3.3ชื่อเครื่องมือTH
            $table->string('equipment_brand', 255)->nullable()->comment('ยี่ห้อเครื่องมือ');                  //3.4ยี่ห้อเครื่องมือ
            $table->string('equipment_model', 255)->nullable()->comment('รุ่นเครื่องมือ');                   //3.5รุ่นเครื่องมือ
            $table->string('equipment_org_code', 255)->nullable()->comment('รหัสเครื่องมือในหน่วยงาน');      //3.6รหัสเครื่องมือในหน่วยงาน
            $table->integer('equipment_year')->nullable()->comment('ปีที่ซื้อเครื่องมือ');                      //3.7ปีที่ซื้อเครื่องมือ
            $table->integer('equipment_price')->nullable()->comment('มูลค่าเครื่องมือ');                      //3.8มูลค่าเครื่องมือ
            $table->string('equipment_supplier', 255)->nullable()->comment('บริษัทที่จำหน่าจย');             //3.9บริษัทที่จำหน่าย
            //$table->integer('major_technologies_id')->nullable()->comment('สาขาเทคโนเครื่องมือ');                       //3.10สาขาเทคโนเครื่องมือ
            $table->integer('major_technologies_other')->nullable()->comment('สาขาเทคโนเครื่องมืออื่นๆ ');                 //3.10สาขาเทคโนเครื่องมือ
            //$table->integer('objective_usages_id')->comment('วัตถุประสงค์การใช้งาน');                           //3.11วัตถุประสงค์การใช้งาน
            $table->integer('equipment_usages_id')->comment('ขอบเขตการใช้งานเครื่องมือ');                       //3.12ขอบเขตการใช้งานเครื่องมือ
            $table->string('equipment_ability', 255)->nullable()->comment('คสามารถคละเอียดเครื่องมือ');         //3.13คสามารถคละเอียดเครื่องมือ
            $table->string('equipment_pic')->nullable()->comment('รูปเครื่องมือ');                              //3.14รูปเครื่องมือ
            $table->integer('equipment_calibrations_id')->nullable()->comment('การสอบเทียบเครื่องมือ');         //3.15 การสอบเทียบเครื่องมือ ใช่-ไม่ใช่
            $table->string('equipment_calibration_by', 255)->nullable()->comment('การสอบเทียบเครื่องมือโดย');   //3.15.1การสอบเทียบเครื่องมือโดย
            $table->integer('equipment_calibration_year')->nullable()->comment('การสอบเทียบเครื่องมือปี');       //3.15.2การสอบเทียบเครื่องมือปี
            $table->integer('equipment_maintenances_id')->nullable()->comment('การบำรุงรักษา');                           //3.16การบำรุงรักษา
            $table->string('equipment_maintenances_other')->nullable()->comment('การบำรุงรักษาอื่นๆ ');                           //3.16.1การบำรุงรักษาอื่นๆ
            $table->integer('equipment_maintenance_budget')->nullable()->comment('ค่าบำรุงรักษา');              //3.17ค่าบำรุงรักษา
            $table->string('equipment_admin_name',255)->nullable()->comment('ผู้ดูแลเครื่องมือชื่อ');               //3.18.1ผู้ดูแลเครื่องมือชื่อ
            $table->string('equipment_admin_phone',)->nullable()->comment('ผู้ดูแลเครื่องมือเบอร์โทร');            //3.18.2ผู้ดูแลเครื่องมือเบอร์โทร
            $table->string('equipment_admin_email')->nullable()->comment('ผู้ดูแลเครื่องมืออีเมล์');               //3.18.3ผู้ดูแลเครื่องมืออีเมล์
            $table->integer('equipment_manuals_id')->nullable()->comment('คู่มือเครื่องมือ');                     //3.19.1คู่มือเครื่องมือ มี-ไม่มี
            $table->string('equipment_manual_name')->nullable()->comment('ชื่อคู่มือเครื่องมือ');                   //3.19.2ชื่อคู่มือเครื่องมือ
            $table->string('equipment_manual_locate' , 255)->nullable()->comment('ที่อยูคู่มือเครื่องมือ');          //3.19.3ที่อยู่คู่มือเครื่องมือ
            $table->integer('equipments_rent_id')->nullable()->comment('เช่าใช้เครื่องมือ');                                 //3.20.1เช่าใช้เครื่องมือใช่-ไม่ใช่
            $table->integer('equipment_rent_fee')->nullable()->comment('ค่าเช่าใช้เครื่องมือ');                     //3.20.2ค่าเช่าใช้เครื่องมือ
            $table->string('equipment_rent_detail', 255)->nullable()->comment('รายละเอียดเช่าใช้เครื่องมือ');         //3.20.3รายละเอียดเช่าใช้เครื่องมือ
            // note - dont forget to add nullable 
            $table->timestamps();

        });
        
        // ข้อ 3.10 สาขาเทคโนโลยีเครื่องมือ 
        Schema::create('equipment_lab_major_technology', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('equipment_lab_id');
            $table->unsignedBigInteger('major_technology_id');
            $table->timestamps();
            
            $table->foreign('equipment_lab_id')
                ->references('id')->on('equipment_labs');
            $table->foreign('major_technology_id')
                ->references('id')->on('major_technologies');
        });

        // ข้อ 3.11 วัตถุประสงค์การใช้งาน
        Schema::create('equipment_lab_objective_usage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('equipment_lab_id');
            $table->unsignedBigInteger('objective_usage_id');
            $table->timestamps();
            
            $table->foreign('equipment_lab_id')
                ->references('id')->on('equipment_labs');
            $table->foreign('objective_usage_id')
                ->references('id')->on('objective_usages');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_lab_major_technology');
        Schema::dropIfExists('equipment_lab_objective_usage');
        Schema::dropIfExists('equipment_labs');
    }
}

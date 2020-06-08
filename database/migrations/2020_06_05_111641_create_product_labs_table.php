<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_labs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name',255)->comment('ชื่อผลิตภัณฑ์ที่ทดสอบ/สอบเทียบ'); // 4.1 ชื่อผลิตภัณฑ์ที่ทดสอบ/สอบเทียบ
            $table->string('product_type',255)->comment('ประเภทผลิตภัณฑ์ที่ทดสอบ/สอบเทียบ'); // 4.2 ประเภทผลิตภัณฑ์ที่ทดสอบ/สอบเทียบ
            $table->string('product_standard',255)->nullable()->comment('มาตราฐานผลิตภัณฑ์ที่ทดสอบ/สอบเทียบ'); // 4.3 มาตราฐานผลิตภัณฑ์ที่ทดสอบ/สอบเทียบ
            $table->string('product_test_name',255)->comment('ชื่อรายการทดสอบ/สอบเทียบ'); // 4.4 ชื่อรายการทดสอบ/สอบเทียบ
            $table->string('product_test_process',255)->comment('ประเภทรายการทดสอบ/สอบเทียบ'); // 4.5 ประเภทรายการทดสอบ/สอบเทียบ
            $table->string('product_test_type',255)->comment('ประเภทการทดสอบ/สอบเทียบ'); // 4.6 ประเภทการทดสอบ/สอบเทียบ
            $table->string('product_test_method',255)->comment('วิธีทดสอบ/สอบเทียบ'); // 4.7 วิธีทดสอบ/สอบเทียบ
            $table->string('product_test_method_detail',255)->nullable()->comment('รายละเอียดวิธีทดสอบ/สอบเทียบ'); // 4.7.1 รายละเอียดวิธีรทดสอบ/สอบเทียบ
            $table->string('product_test_unit',255)->comment('ช่วงความสามารถของการวัด'); // 4.8 ช่วงความมสามารถของการวัด
            $table->integer('product_test_duration')->comment('ระยะเวลาที่ใช้ในการทดสอบ'); // 4.9 ระยะเวลาที่ใช้ในการสดสอบ(หน่วยเป็นวัน)
            $table->integer('product_test_fee')->comment('ค่าธรรมเนียมการทดสอบ (บาท)'); // 4.10 ค่าธรรมเนียมการทดสอบ (หน่วยเป็นบาท)
            $table->string('product_material_ref')->comment('วัสดุอ้างอิงที่ใช้'); // 4.11 วัสดุอ้างอิงที่ใช้
            $table->string('product_material_ref_from')->comment('แหล่งที่มาของวัสดุอ้างอิง'); // 4.12 แหล่งที่มาของวัสดุอ้างอิง
            $table->string('product_test_control')->comment('การควบคุมคุณภาพผลการทดสอบภายใน'); // 4.13 การควบคุมคุณภาพผลการทดสอบภายใน
            $table->integer('proficiency_testing',1)->comment('การทดสอบความชำนาญของห้องปฏิบัติการ'); // 4.14 การทดสอบความชำนาญของห้องปฏิบัติการ (มี=1/ไม่มี=0)
            $table->string('proficiency_testing_by')->comment('ทดสอบความชำนาญของห้องปฏิบัติการโดย'); // 4.14.1 ทดสอบความชำนาญของห้องปฏิบัติการโดย
            $table->string('proficiency_testing_year')->comment('ทดสอบความชำนาญของห้องปฏิบัติการปี'); // 4.14.2 ทดสอบความชำนาญของห้องปฏิบัติการปี
            $table->string('lab_guarantee')->comment('การรับรองความสามารถห้องปฏิบัติการ'); // 4.15 การรับรองความสามารถห้องปฏิบัติการ
            $table->string('lab_equipment')->comment('เครื่องมือที่ใช้ทดสอบ/สอบเทียบ'); // 4.16 เครื่องมือที่ใช้ทดสอบ/สอบเทียบ
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
        Schema::dropIfExists('product_labs');
    }
}

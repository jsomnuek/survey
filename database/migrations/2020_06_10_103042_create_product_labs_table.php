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
            $table->string('product_lab_name', 255)->comment('ชื่อผลิตภัณฑ์ที่ทดสอบ');//4.1 ชื่อผลิตภัณฑ์ที่ทดสอบ
            $table->integer('product_type_id')->comment('ประเภทผลิตภัณฑ์');//4.2ประเภทผลิตภัณฑ์
            $table->string('product_lab_standard', 255)->nullable()->comment('มาตราฐานผลิตภัณฑ์');//4.3มาตราฐานผลิตภัณฑ์
            $table->string('product_lab_test_name', 255)->nullable()->comment('ชื่อรายการทดสอบ');//4.4ชื่อรายการทดสอบ/สอบเทียบ
            $table->string('product_lab_test_process', 255)->comment('ประเภทรายการทดสอบ');//4.5ประเภทรายการทดสอบ สอบเทียบ no table now
            $table->integer('testing_calibrating_type_id')->comment('ประะเภทการทดสอบ');//4.6ประะเภทการทดสอบ/สอบเทียบ
            $table->string('product_lab_test_method', 255)->comment('วิธีทดสอบ');//4.7วิธีทดสอบ/สอบเทียบ
            $table->string('product_lab_test_method_detail', 255)->comment('รายละเอียดวิธีทดสอบ');//4.7.1รายละเอียดวิธีทดสอบ/สอบเทียบ
            $table->string('product_lab_test_unit', 255)->nullable()->comment('ช่วงความสามารถของการวัด');//4.8ช่วงความสามารถของการวัด
            $table->integer('product_lab_test_duration')->comment('ระยะเวลาทดสอบ');//4.9ระยะเวลาทดสอบ/สอบเทียบ
            $table->integer('product_lab_test_fee')->nullable()->comment('ค่าธรรมเนียมการทดสอบ');//4.10ค่าธรรมเนียมการทดสอบ
            $table->string('product_lab_material_ref', 255)->nullable()->comment('วัสดุอ้างอิง');//4.11วัสดุอ้างอิง
            $table->string('product_lab_material_ref_from', 255)->nullable()->comment('แหล่งที่มาวัสดุ');//4.12แหล่งที่มาวัสดุ
            $table->string('product_lab_test_control', 255)->comment('การควบคุมคุณภาพผลการทดสอบ');//4.13การควบคุมคุณภาพผลการทดสอบ no table now
            $table->string('proficiency_testing', 255)->comment('มีการสดสอบความชำนาญแลปไหม');//4.14.1มีการสดสอบความชำนาญแลปไหม
            $table->string('proficiency_testing_by', 255)->nullable()->comment('ใครทดสอบความชำนาญให้');//4.14.2ใครทดสอบความชำนาญให้
            $table->string('proficiency_testing_year', 255)->nullable()->comment('ทดสอบความชำนาญปีไหน');//4.14.3ทดสอบความชำนาญปีไหน
            $table->integer('certify_laboratory_id')->comment('การรับรองความสามารถห้องปฏิบัติการ');//4.15การรับรองความสามารถห้องปฏิบัติการ
            // ขาด 4.16 เครื่องมือที่ใช้ทดสอบที่เกียวข้อง
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

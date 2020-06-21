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
            $table->unsignedBigInteger('user_id')->comment('รหัสผู้ใช้งานระบบที่เทคแอคชั่นกกับเรคอร์ด'); //รหัสผู้ใช้งานระบบ
            $table->string('product_lab_name', 255)->comment('ชื่อผลิตภัณฑ์ที่ทดสอบ');//4.1 ชื่อผลิตภัณฑ์ที่ทดสอบ
            // $table->integer('product_type_id')->comment('ประเภทผลิตภัณฑ์');//4.2ประเภทผลิตภัณฑ์
            $table->string('product_type_other', 255)->nullable()->comment('ประเภทผลิตภัณฑ์อื่นๆ');//
            $table->string('product_lab_standard', 255)->nullable()->comment('มาตราฐานผลิตภัณฑ์');//4.3มาตราฐานผลิตภัณฑ์
            $table->string('product_lab_test_name', 255)->nullable()->comment('ชื่อรายการทดสอบ');//4.4ชื่อรายการทดสอบ/สอบเทียบ
            $table->string('product_lab_test_process', 255)->nullable()->comment('ประเภทรายการทดสอบ');//4.5ประเภทรายการทดสอบ สอบเทียบ no table now
            $table->integer('testing_calibrating_type_id')->nullable()->comment('ประะเภทการทดสอบ');//4.6ประเภทการทดสอบ/สอบเทียบ
            $table->string('product_lab_test_method', 255)->nullable()->comment('วิธีทดสอบ');//4.7วิธีทดสอบ/สอบเทียบ
            $table->string('product_lab_test_method_detail', 255)->nullable()->comment('รายละเอียดวิธีทดสอบ');//4.7.1รายละเอียดวิธีทดสอบ/สอบเทียบ
            $table->string('product_lab_test_unit', 255)->nullable()->comment('ช่วงความสามารถของการวัด');//4.8ช่วงความสามารถของการวัด
            $table->integer('product_lab_test_duration')->nullable()->comment('ระยะเวลาทดสอบ');//4.9ระยะเวลาทดสอบ/สอบเทียบ
            $table->integer('product_lab_test_fee')->nullable()->comment('ค่าธรรมเนียมการทดสอบ');//4.10ค่าธรรมเนียมการทดสอบ
            $table->string('product_lab_material_ref', 255)->nullable()->comment('วัสดุอ้างอิง');//4.11วัสดุอ้างอิง
            $table->string('product_lab_material_ref_from', 255)->nullable()->comment('แหล่งที่มาวัสดุ');//4.12แหล่งที่มาวัสดุ
            // $table->string('product_lab_test_control', 255)->comment('การควบคุมคุณภาพผลการทดสอบ');//4.14การควบคุมคุณภาพผลการทดสอบ 
            $table->string('product_lab_result_control_other', 255)->nullable()->comment('อื่นๆการควบคุมคุณภาพผลการทดสอบ');//4.14การควบคุมคุณภาพผลการทดสอบ 
            $table->string('proficiency_testing', 255)->nullable()->comment('มีการสดสอบความชำนาญแลปไหม');//4.14.1มีการสดสอบความชำนาญแลปไหม
            $table->string('proficiency_testing_by', 255)->nullable()->comment('ใครทดสอบความชำนาญให้');//4.14.2ใครทดสอบความชำนาญให้
            $table->string('proficiency_testing_year', 255)->nullable()->comment('ทดสอบความชำนาญปีไหน');//4.14.3ทดสอบความชำนาญปีไหน
            $table->integer('certify_laboratory_id')->nullable()->comment('การรับรองความสามารถห้องปฏิบัติการ');//4.15การรับรองความสามารถห้องปฏิบัติการ
            // ขาด 4.5 เครื่องมือที่ใช้ทดสอบที่เกียวข้อง
            $table->timestamps();
        });

        // ข้อ 4.2 ประเภทผลิตภัณฑ์
        Schema::create('product_lab_product_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_lab_id');
            $table->unsignedBigInteger('product_type_id');
            $table->timestamps();
            
            $table->foreign('product_lab_id')
                ->references('id')->on('product_labs');
            $table->foreign('product_type_id')
                ->references('id')->on('product_types');
        });

        // ข้อ 4.14 การควบคุมการทดสอบภายใน
        Schema::create('product_lab_result_control', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_lab_id');
            $table->unsignedBigInteger('result_control_id');
            $table->timestamps();
            
            $table->foreign('product_lab_id')
                ->references('id')->on('product_labs');
            $table->foreign('result_control_id')
                ->references('id')->on('result_controls');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_lab_product_type');
        Schema::dropIfExists('product_lab_result_control');
        // OWNER MUST BE BOTTOM ALWAYS
        Schema::dropIfExists('product_labs');
    }
}

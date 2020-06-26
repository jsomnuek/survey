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
            //4.2ประเภทผลิตภัณฑ์ is multiple select
            $table->string('product_type_other', 255)->nullable()->comment('ประเภทผลิตภัณฑ์อื่นๆ');//4.2.1 ประเภทผลิตภัณฑ์อื่นๆ
            $table->string('product_lab_standard', 255)->nullable()->comment('มาตราฐานผลิตภัณฑ์');//4.3มาตราฐานผลิตภัณฑ์
            $table->string('product_lab_test_name', 255)->nullable()->comment('ชื่อรายการทดสอบ');//4.4 ชื่อรายการทดสอบ/สอบเทียบ
            // ขาด 4.5 เครื่องมือที่ใช้ทดสอบที่เกียวข้อง
            $table->unsignedBigInteger('testing_calibrating_list_id')->comment('ประะเภทรายการทดสอบ');//4.6 ประเภทรายการทดสอบ/สอบเทียบ
            $table->unsignedBigInteger('testing_calibrating_type_id')->comment('ประเภทการทดสอบ');//4.7.1 ประเภทการทดสอบ/สอบเทียบ
            $table->string('testing_calibrating_type_other')->nullable()->comment('ประเภทการทดสอบอื่นๆ');//4.7.2 ประเภทการทดสอบ/สอบเทียบอื่นๆ
            $table->unsignedBigInteger('testing_calibrating_method_id')->comment('วิธีทดสอบ/สอบเทียบ');//4.8.1 วิธีทดสอบ/สอบเทียบ
            $table->string('testing_calibrating_method_detail')->comment('รายละเอียดวิธีทดสอบ/สอบเทียบ');//4.8.2 รายละเอียดวิธีทดสอบ
            $table->string('product_lab_test_unit', 255)->nullable()->comment('ช่วงความสามารถของการวัด');//4.9ช่วงความสามารถของการวัด
            $table->integer('product_lab_test_duration')->nullable()->comment('ระยะเวลาทดสอบ');//4.10ระยะเวลาทดสอบ/สอบเทียบ
            $table->integer('product_lab_test_fee')->nullable()->comment('ค่าธรรมเนียมการทดสอบ');//4.11ค่าธรรมเนียมการทดสอบ
            $table->string('product_lab_material_ref', 255)->nullable()->comment('วัสดุอ้างอิง');//4.12วัสดุอ้างอิง
            $table->string('product_lab_material_ref_from', 255)->nullable()->comment('แหล่งที่มาวัสดุ');//4.13แหล่งที่มาวัสดุ
            // 4.14.1 is multiple select
            $table->string('product_lab_result_control_other', 255)->nullable()->comment('อื่นๆการควบคุมคุณภาพผลการทดสอบ');//4.14.2การควบคุมคุณภาพผลการทดสอบอื่นๆ
            $table->string('proficiency_testing', 255)->nullable()->comment('มีการสดสอบความชำนาญแลปไหม');//4.15.1มีการสดสอบความชำนาญแลปไหม
            $table->string('proficiency_testing_by', 255)->nullable()->comment('ใครทดสอบความชำนาญให้');//4.15.2ใครทดสอบความชำนาญให้
            $table->string('proficiency_testing_year', 255)->nullable()->comment('ทดสอบความชำนาญปีไหน');//4.15.3ทดสอบความชำนาญปีไหน
            $table->unsignedBigInteger('certify_laboratory_id')->nullable()->comment('การรับรองความสามารถห้องปฏิบัติการ');//4.16การรับรองความสามารถห้องปฏิบัติการ

            // Foreign Key to other table
            $table->foreign('testing_calibrating_list_id')->references('id')->on('testing_calibrating_lists'); //FK4.6ของประเภทรายการทดสอบ
            $table->foreign('testing_calibrating_type_id')->references('id')->on('testing_calibrating_types'); //FK4.7.1 ประเภทการทดสอบ/สอบเทียบ
            $table->foreign('testing_calibrating_method_id')->references('id')->on('testing_calibrating_methods'); //FK4.8.1 วิธีทดสอบ/สอบเทียบ
            $table->foreign('certify_laboratory_id')->references('id')->on('certify_laboratories'); //FK4.16 การรับรองความสามารถแลป
            $table->timestamps();
        });


        // for multiple select dont forget to order alphabet for table name  

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

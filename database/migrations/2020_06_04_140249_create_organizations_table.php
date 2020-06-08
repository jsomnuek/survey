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
            $table->string('org_name')->comment('ชื่อหน่วยงาน'); // 1.1 ชื่อหน่วยงาน :
            $table->string('org_code')->nullable()->comment('รหัสหน่วยงาน'); // 1.2 รหัสหน่วยงาน  (AABCC)  :
            $table->string('org_number')->nullable()->comment('หมายเลขประจำหน่วยงาน'); // 1.3 หมายเลขประจำหน่วยงาน  (ถ้ามี) :
            $table->string('org_location')->nullable()->comment('ที่ตั้งของห้องปฏิบัติการ'); // 1.4 ที่ตั้งของห้องปฏิบัติการ :
            $table->string('org_location_other')->nullable()->comment('ที่ตั้งของห้องปฏิบัติการ อื่น ๆ'); // 1.4 ที่ตั้งของห้องปฏิบัติการ  (ถ้ามี) : other
            // 1.5	ที่อยู่ :
            $table->string('org_building')->nullable()->comment('อาคาร'); // อาคาร
            $table->string('org_floor')->nullable()->comment('ชั้น'); // ชั้น
            $table->string('org_address')->comment('เลขที่'); // เลขที่ 
            $table->string('org_soi')->nullable()->comment('ซอย'); // ซอย
            $table->string('org_road')->nullable()->comment('ถนน'); // ถนน
            $table->integer('province_info_ch_id')->comment('จังหวัด'); // จังหวัด FK => ch_id
            $table->integer('province_info_am_id')->comment('เขต/อำเภอ'); // เขต/อำเภอ FK => am_id
            $table->integer('province_info_ta_id')->comment('แขวง/ตำบล'); // แขวง/ตำบล FK => ta_id
            $table->integer('org_postcode')->comment('รหัสไปรษณีย์'); // รหัสไปรษณีย์
            $table->string('org_phone')->comment('โทรศัพท์'); // โทรศัพท์
            $table->string('org_fax')->nullable()->comment('โทรสาร'); // โทรสาร
            $table->string('org_email')->comment('อีเมล'); // อีเมล
            $table->string('org_website')->nullable()->comment('เว็บไซต์'); // เว็บไซต์
            // พิกัดที่ตั้งห้องปฏิบัติการ
            $table->float('org_lat')->nullable()->comment('ละติจูด'); // ละติจูด
            $table->float('org_long')->nullable()->comment('ลองติจูด'); // ลองติจูด
            $table->string('org_type')->nullable()->comment('ประเภทองค์กร'); // 1.6 ประเภทองค์กร
            $table->string('org_type_other')->nullable()->comment('ประเภทองค์กร อื่น ๆ'); // 1.6 ประเภทองค์กร other
            $table->string('org_type_of_business')->nullable()->comment('ประเภทกิจการ'); // 1.7 ประเภทกิจการ
            $table->string('org_distribution')->nullable()->comment('การจำหน่าย/ส่งออกสินค้า/บริการ'); // 1.8 การจำหน่าย/ส่งออกสินค้า/บริการ
            $table->string('org_distribution_other')->nullable()->comment('การจำหน่าย/ส่งออกสินค้า/บริการ อื่น ๆ'); // 1.8 การจำหน่าย/ส่งออกสินค้า/บริการ other
            $table->integer('org_capital')->nullable()->comment('ทุนจดทะเบียน'); // 1.9 ทุนจดทะเบียน (ล้านบาท) 
            $table->integer('org_employee_amount')->nullable()->comment('จำนวนบุคลากร'); // 1.10	จำนวนบุคลากร (คน)
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

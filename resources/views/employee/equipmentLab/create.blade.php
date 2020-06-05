@extends('layouts.admin')

@section('page')
    Equipment Laboratory Create
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark">เพิ่มข้อมูลเครื่องมือในห้องปฏิบัติการ</h1>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <form action="" method="post">
              
                <div class="card-header bg-primary">
                    <h1 class="card-title">ส่วนที่ 2 เครื่องมือวิทยาศาสตร์ </h1>
                </div>
        
                <div class="card-body">
                  {{-- 2.1equipmentID--}}
                  <div class="row form-group">
                      <div class="col-md-4">
                        <label for="">2.1 รหัสเครื่องมือ (AABCC-MNN-RRRSS)</label>
                        <input type="text" class="form-control" name="equipmentID" id="equipmentID" required>
                      </div>
                  </div>
                  {{-- 2.2equipmentNameEN /2.3equipmentNameTH --}}
                  <div class="row form-group">
                      <div class="col-md-6">
                        <label for="">2.2 ชื่อเครื่องมือ (ภาษาอังกฤษ)</label>
                        <input type="text" class="form-control" name="equipmentNameEN" id="equipmentNameEN" required>
                      </div>
                      <div class="col-md-6">
                        <label for="">2.3 ชื่อเครื่องมือ (ภาษาไทย)</label>
                        <input type="text" class="form-control" name="equipmentNameTH" id="equipmentNameTH" required>
                      </div>
                  </div>
                  {{-- 2.4equipmentBrand /2.5equipmentModel /2.6equipmentOrgCode--}}
                  <div class="row form-group">
                    <div class="col-md-4">
                      <label for="">2.4 ยี่ห้อของเครืองมือ</label>
                      <input type="text" class=form-control name="equipmentBrand" id="equipmentBrand">
                    </div>
                    <div class="col-md-4">
                      <label for="">2.5 รุ่นของเครืองมือ</label>
                      <input type="text" class=form-control name="equipmentModel" id="equipmentModel">
                    </div>
                    <div class="col-md-4">
                      <label for="">2.6 รหัสเครื่องมือของหน่วยงาน (ถ้ามี)</label>
                      <input type="text" class=form-control name="equipmentOrgCode" id="equipmentOrgCode">
                    </div>
                  </div>
                  {{-- 2.7equipmentMajorTech/2.8equipmentTechnical --}}
                  <div class="row form-group">
                      <div class="col-md-6">
                        <label for="">2.7 สาขาเทคโนโลยีของเครื่องมือ</label>
                        <select class="form-control" name="equipmentMajorTech" id="equipmentMajorTech" >
                          <option>สาขาเทคโนโลยีของเครื่องมือ</option>
                            @foreach ($showEquipmentLab ?? '' as $TechnicalEquipmentName)
                              <option value="{{$TechnicalEquipmentName->technical_equipment_name}}"> {{$TechnicalEquipmentName->technical_equipment_name}} </option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="">2.8 เทคนิคของเครื่องมือ</label>
                        <select class="form-control" name="equipmentTechnical" id="equipmentTechnical" >
                          <option>เทคนิคของเครื่องมือ</option>
                            @foreach ($showEquipmentLab ?? '' as $TechnicalEquipmentName)
                              <option value="{{$TechnicalEquipmentName->technical_equipment_name}}"> {{$TechnicalEquipmentName->technical_equipment_name}} </option>
                            @endforeach
                        </select>
                      </div>
                  </div>
                  {{-- 2.9equipmentYear/2.10equipmentPrice/2.11equipmentSupplier --}}
                  <div class="row form-group">
                      <div class="col-md-4">
                        <label for="">2.9 ปีืี่ซื้อ</label>
                        <input type="text" class=form-control name="equipmentYear" id="equipmentYear">
                      </div>
                      <div class="col-md-4">
                        <label for="">2.10 มูลค่า</label>
                        <input type="number" class=form-control name="equipmentPrice" id="equipmentPrice">
                      </div>
                      <div class="col-md-4">
                        <label for="">2.11 บริษัทที่จัดจำหน่าย</label>
                        <input type="text" class=form-control name="equipmentSupplier" id="equipmentSupplier">
                      </div>
                  </div>
                  {{-- 2.12วัตถุประสงค์/2.13ขอบเขต --}}
                  <div class="row form-group">
                    <div class="col-md-6">
                      <label for="">2.12 วัตถุประสงค์การใช้งาน</label>
                      <select class="form-control" name="" id="" >
                        <option>ทดสอบ/สอบเทียบ</option>
                        <option>วิจัย</option>
                        <option>อบรม/การเรียนการสอน</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="">2.13 ขอบเขตการใช้เครื่องมือ</label>
                      <select class="form-control" name="" id="" >
                        <option>ใช้เฉพาะผลิตภัณฑ์</option>
                        <option>ใช้ได้กับหลายผลิตภัณฑ์</option>
                      </select>
                    </div>
                  </div>
                  {{-- 2.14ความละเอียด/2.15รูป --}}
                  <div class="row form-group">
                    <div class="col-md-6">
                      <label for="">2.14 ความสามารถของเครื่อง/ความละเอียด</label>
                      <input type="text" class=form-control name="" id="">
                    </div>
                    <div class="col-md-6">
                      <label for="">2.15 ภาพเครื่องมือ</label>
                      <input type="file" class="form-control" name="" id="">
                    </div>
                  </div>
                  {{-- 2.16สอบเทียบ --}}
                  <div class="row form-group">
                    <div class="col-md-2">
                      <label for="">2.16 การสอบเทียบ</label>
                    </div>
                    <div class="col-md-2">
                      <input type="radio" class="" name="" id=""> ไม่มี
                    </div>
                    <div class="col-md-2">
                      <input type="radio" class="" name="" id=""> มี
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control" name="" id="" placeholder="ชื่อหน่วยงานสอบเทียบ">
                    </div>
                    <div class="col-md-3">
                      <input type="date" class="form-control" name="" id="" placeholder="วัน/เดือน/ปี">
                    </div>
                  </div>
                  {{-- 2.17equipmentMaintenance/2.18equipmentMaintenanceBudget --}}
                  <div class="row form-group">
                    <div class="col-md-6">
                      <label for="">2.17	การตรวจเช็ค/บำรุงรักษาเครื่องมืออุปกรณ์ทางวิทยาศาสตร์</label>
                      <select class="form-control" name="equipmentMaintenance" id="" >
                        <option>ไม่มี</option>
                        <option>มีทุก 1 เดือน</option>
                        <option>มีทุก 3 เดือน</option>
                        <option>มีทุก 6 เดือน</option>
                        <option>มีทุก 1 ปี</option>
                        <option>อื่นๆ</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="">2.18 งบประมาณในการบำรุงรักษา/สอบเทียบ ต่อปี (บาท)</label>
                      <input type="number" class="form-control" name="equipmentMaintenanceBudget" id="equipmentMaintenanceBudget">
                    </div>
                  </div>
                  {{-- 2.19equipmentAdmin --}}
                  {{Form::label('title','2.19 ผู้ดูแลเครื่องมือ')}}
                  <div class="row form-group">
                    <div class="col-md-4">
                      ชื่อผู้ดูแล
                      <input type="text" class="form-control" name="equipmentAdminName" id="equipmentAdminName">
                    </div>
                    <div class="col-md-4">
                      เบอร์โทรศัพท์
                      <input type="text" class="form-control" name="equipmentAdminPhone" id="equipmentAdminPhone">
                    </div>
                    <div class="col-md-4">
                      Email
                      <input type="email" class="form-control" name="equipmentAdminEmail" id="equipmentAdminEmail">
                    </div>
                  </div>
                  {{-- 2.20equipmentManual  --}}
                  <div class="row form-group">
                    <div class="col-md-2">
                      <label for="">2.20 คู่มือการใช้งาน</label>
                    </div>
                    <div class="col-md-1">
                      <input type="radio" class="" name="equipmentManual" id="equipmentManual"> ไม่มี
                    </div>
                    <div class="col-md-1">
                      <input type="radio" class="" name="equipmentManual" id="equipmentManual"> มี
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="equipmentManualName" id="equipmentManualName" placeholder="ชื่อคู่มือ/รหัสคู่มือ">
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="equipmentManualLocate" id="equipmentManualLocate" placeholder="สถานที่จัดเก็บ/ลิงก์ดาวน์โหลด">
                    </div>
                  </div>
                  {{-- 2.21equipmentRent --}}
                  <div class="row form-group">
                    <div class="col-md-3">
                      <label for="">2.21	การให้เช่าใช้เครื่องมือ</label>
                    </div>
                    <div class="col-md-3">
                      <input type="radio" class="" name="equipmentRent" id="equipmentRent"> ไม่ให้บุคคลภายนอกเช่าใช้  
                    </div>
                    <div class="col-md-3">
                      <input type="radio" class="" name="equipmentRent" id="equipmentRent"> ให้บุคคลภายนอกเช่าใช้    
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-6">
                      2.21.1 ค่าบริการต่อครั้ง (บาท)
                      <input type="number" class="form-control" name="" id="">
                    </div>
                    <div class="col-md-6">
                      2.21.2 เงื่อนไขการขอยืม/ใช้งานเครื่องมือ 
                      <input type="text" class="form-control" name="" id="">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                    <a href="/technicalEquipment"  class="btn btn-secondary">ย้อนกลับ</a>
                    {{Form::submit('บันทึก',['class'=>'btn btn-primary'])}}
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection



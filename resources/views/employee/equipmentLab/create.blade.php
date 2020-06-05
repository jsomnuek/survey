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
                {!!Form::open(['action'=>'TechnicalEquipmentController@store','method'=>'POST'])!!}
                <div class="card-header bg-primary">
                    <h1 class="card-title">ส่วนที่ 2 เครื่องมือวิทยาศาสตร์ </h1>
                </div>
        
                <div class="card-body">
                  {{-- 2.1equipmentID--}}
                  <div class="row form-group">
                      <div class="col-md-4">
                            {{Form::label('title','2.1 รหัสเครื่องมือ (AABCC-MNN-RRRSS)')}}
                            {{Form::text('equipmentID','',['class'=>'form-control','required'])}}
                      </div>
                  </div>
                  {{-- 2.2equipmentNameEN /2.3equipmentNameTH --}}
                  <div class="row form-group">
                      <div class="col-md-6">
                            {{Form::label('title','2.2 ชื่อเครื่องมือ (ภาษาอังกฤษ)')}}
                            {{Form::text('equipmentNameEN','',['class'=>'form-control','required'])}}
                      </div>
                      <div class="col-md-6">
                            {{Form::label('title','2.3 ชื่อเครื่องมือ (ภาษาไทย)')}}
                            {{Form::text('equipmentNameTH','',['class'=>'form-control'])}}
                      </div>
                  </div>
                  {{-- 2.4equipmentBrand /2.5equipmentModel /2.6equipmentOrgCode--}}
                  <div class="row form-group">
                    <div class="col-md-4">
                      {{Form::label('title','2.4 ยี่ห้อของเครืองมือ')}}
                      {{Form::text('equipmentBrand','',['class'=>'form-control'])}}
                    </div>
                    <div class="col-md-4">
                      {{Form::label('title','2.5 รุ่นของเครืองมือ')}}
                      {{Form::text('equipmentModel','',['class'=>'form-control'])}}
                    </div>
                    <div class="col-md-4">
                      {{Form::label('title','2.6 รหัสเครื่องมือของหน่วยงาน (ถ้ามี)')}}
                      {{Form::text('equipmentOrgCode','',['class'=>'form-control'])}}
                    </div>
                  </div>
                  {{-- 2.7equipmentMajorTech/2.8equipmentTechnical --}}
                  <div class="row form-group">
                      <div class="col-md-6">
                        {{Form::label('title','2.7 สาขาเทคโนโลยีของเครื่องมือ')}}
                        <select class="form-control" name="equipmentMajorTech" id="equipmentMajorTech" >
                          <option>สาขาเทคโนโลยีของเครื่องมือ</option>
                            @foreach ($showEquipmentLab ?? '' as $TechnicalEquipmentName)
                              <option value="{{$TechnicalEquipmentName->technical_equipment_name}}"> {{$TechnicalEquipmentName->technical_equipment_name}} </option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-md-6">
                        {{Form::label('title','2.8 เทคนิคของเครื่องมือ')}}
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
                        {{Form::label('title','2.9 ปีืี่ซื้อ')}}
                        {{Form::number('equipmentYear','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-4">
                        {{Form::label('title','2.10 มูลค่า')}}
                        {{Form::number('equipmentPrice','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-4">
                        {{Form::label('title','2.11 บริษัทที่จัดจำหน่าย')}}
                        {{Form::text('equipmentSupplier','',['class'=>'form-control',''])}}
                      </div>
                  </div>
                  {{-- 2.12วัตถุประสงค์/2.13ขอบเขต --}}
                  <div class="row form-group">
                    <div class="col-md-6">
                      {{Form::label('title','2.12 วัตถุประสงค์การใช้งาน ')}}
                      <select class="form-control" name="" id="" >
                        <option>ทดสอบ/สอบเทียบ</option>
                        <option>วิจัย</option>
                        <option>อบรม/การเรียนการสอน</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      {{Form::label('title','2.13 ขอบเขตการใช้เครื่องมือ  ')}}
                      <select class="form-control" name="" id="" >
                        <option>ใช้เฉพาะผลิตภัณฑ์</option>
                        <option>ใช้ได้กับหลายผลิตภัณฑ์</option>
                      </select>
                    </div>
                  </div>
                  {{-- 2.14ความละเอียด/2.15รูป --}}
                  <div class="row form-group">
                    <div class="col-md-6">
                      {{Form::label('title','2.14 ความสามารถของเครื่อง/ความละเอียด')}}
                      {{Form::text('equipment','',['class'=>'form-control',''])}}
                    </div>
                    <div class="col-md-6">
                      {{Form::label('title','2.15 ภาพ')}}
                      {{Form::text('equipmentPic','',['class'=>'form-control',''])}}
                    </div>
                  </div>
                  {{-- 2.16สอบเทียบ --}}
                  <div class="row form-group">
                    <div class="col-md-2">
                      {{Form::label('title','2.16 การสอบเทียบ')}}
                    </div>
                    <div class="col-md-2">
                      {{Form::radio('','',['class'=>'form-control',''])}} ไม่มี
                    </div>
                    <div class="col-md-2">
                      {{Form::radio('','',['class'=>'form-control',''])}} มี
                    </div>
                    <div class="col-md-3">
                      {{Form::text('','',['class'=>'form-control','placeholder'=>'ชื่อหน่วยงานสอบเทียบ'])}}
                    </div>
                    <div class="col-md-3">
                      {{Form::date('','',['class'=>'form-control','placeholder'=>'วัน/เดือน/ปี'])}}
                    </div>
                  </div>
                  {{-- 2.17equipmentMaintenance/2.18equipmentMaintenanceBudget --}}
                  <div class="row form-group">
                    <div class="col-md-6">
                      {{Form::label('title','2.17	การตรวจเช็ค/บำรุงรักษาเครื่องมืออุปกรณ์ทางวิทยาศาสตร์')}}
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
                      {{Form::label('title','2.18 งบประมาณในการบำรุงรักษา/สอบเทียบ ต่อปี (บาท)')}}
                      {{Form::number('equipmentMaintenanceBudget','',['class'=>'form-control'])}}
                    </div>
                  </div>
                  {{-- 2.19equipmentAdmin --}}
                  {{Form::label('title','2.19 ผู้ดูแลเครื่องมือ')}}
                  <div class="row form-group">
                    <div class="col-md-4">
                      ชื่อผู้ดูแล {{Form::text('equipmentAdminName','',['class'=>'form-control',''])}}
                    </div>
                    <div class="col-md-4">
                      เบอร์โทรศัพท์ {{Form::text('equipmentAdminPhone','',['class'=>'form-control',''])}}
                    </div>
                    <div class="col-md-4">
                      Email {{Form::email('equipmentAdminEmail','',['class'=>'form-control',''])}}
                    </div>
                  </div>
                  {{-- 2.20equipmentManual  --}}
                  <div class="row form-group">
                    <div class="col-md-2">
                      {{Form::label('title','2.20 คู่มือการใช้งาน ')}}
                    </div>
                    <div class="col-md-1">
                      {{Form::radio('equipmentManual','',['class'=>'form-control',''])}} ไม่มี
                    </div>
                    <div class="col-md-1">
                      {{Form::radio('equipmentManual','',['class'=>'form-control',''])}} มี
                    </div>
                    <div class="col-md-4">
                      {{Form::text('equipmentManualName','',['class'=>'form-control','placeholder'=>'ชื่อคู่มือ/รหัสคู่มือ'])}}
                    </div>
                    <div class="col-md-4">
                      {{Form::text('equipmentManualLocate','',['class'=>'form-control','placeholder'=>'สถานที่จัดเก็บ/ลิงก์ดาวน์โหลด '])}}
                    </div>
                  </div>
                  {{-- 2.21equipmentRent --}}
                  <div class="row form-group">
                    <div class="col-md-3">
                      {{Form::label('title','2.21	การให้เช่าใช้เครื่องมือ')}}
                    </div>
                    <div class="col-md-3">
                      {{Form::radio('equipmentRent','',['class'=>'form-control',''])}} ไม่ให้บุคคลภายนอกเช่าใช้     
                    </div>
                    <div class="col-md-3">
                      {{Form::radio('equipmentRent','',['class'=>'form-control',''])}} ให้บุคคลภายนอกเช่าใช้     
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-6">
                      2.21.1 ค่าบริการต่อครั้ง (บาท){{Form::number('','',['class'=>'form-control','placeholder'=>''])}}
                    </div>
                    <div class="col-md-6">
                      2.21.2 เงื่อนไขการขอยืม/ใช้งานเครื่องมือ {{Form::text('','',['class'=>'form-control','placeholder'=>''])}}
                    </div>
                  </div>
                  
                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio1">
                        <label class="form-check-label form-control">Radio</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio1" >
                        <label class="form-check-label">Radio checked</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="radio1" >
                        <label class="form-check-label">Radio disabled</label>
                      </div>
                    </div>
               


                </div>
                <div class="card-footer">
                    <a href="/technicalEquipment"  class="btn btn-secondary">ย้อนกลับ</a>
                    {{Form::submit('บันทึก',['class'=>'btn btn-primary'])}}
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection



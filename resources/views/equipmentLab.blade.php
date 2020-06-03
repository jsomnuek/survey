@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {!!Form::open(['action'=>'TechnicalEquipmentController@store','method'=>'POST'])!!}
                <div class="card-header">
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
                            @foreach ($showEquipmentLab as $TechnicalEquipmentName)
                              <option value="{{$TechnicalEquipmentName->technical_equipment_name}}"> {{$TechnicalEquipmentName->technical_equipment_name}} </option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-md-6">
                        {{Form::label('title','2.8 เทคนิคของเครื่องมือ')}}
                        <select class="form-control" name="equipmentTechnical" id="equipmentTechnical" >
                          <option>เทคนิคของเครื่องมือ</option>
                            @foreach ($showEquipmentLab as $TechnicalEquipmentName)
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



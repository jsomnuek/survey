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
                            @foreach ($showAllOrg as $orgType)
                              <option value="{{$orgType->estate_name}}"> {{$orgType->estate_name}} </option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-md-6">
                        {{Form::label('title','2.8 เทคนิคของเครื่องมือ')}}
                        <select class="form-control" name="equipmentTechnical" id="equipmentTechnical" >
                          <option>เทคนิคของเครื่องมือ</option>
                            @foreach ($showAllOrg as $orgType)
                              <option value="{{$orgType->estate_name}}"> {{$orgType->estate_name}} </option>
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
                  <div class="row form-group">
                      <div class="col-md-3">
                        {{Form::label('title','รหัสไปรษณีย์')}}
                        {{Form::text('organizePostcode','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-3">
                        {{Form::label('title','จังหวัด')}}
                        {{Form::text('organizeProvince','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-3">
                        {{Form::label('title','อำเภอ')}}
                        {{Form::text('organizeDistrict','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-3">
                        {{Form::label('title','ตำบล')}}
                        {{Form::text('organizeSubDistrict','',['class'=>'form-control',''])}}
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-3">
                        {{Form::label('title','โทรศัพท์')}}
                        {{Form::text('organizePostcode','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-3">
                        {{Form::label('title','โทรสาร')}}
                        {{Form::text('organizeProvince','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-3">
                        {{Form::label('title','Email')}}
                        {{Form::text('organizeDistrict','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-3">
                        {{Form::label('title','Website')}}
                        {{Form::text('organizeSubDistrict','',['class'=>'form-control',''])}}
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-6">
                        {{Form::label('title','ละติจูด')}}
                        {{Form::text('organizeLatitude','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-6">
                        {{Form::label('title','ลองติจูด')}}
                        {{Form::text('organizeLongitude','',['class'=>'form-control',''])}}
                      </div>
                  </div>
                  {{-- END 1.5 --}}

                  {{-- 1.6orgType /1.7orgBusiness --}}
                  <div class="row form-group">
                    <div class="col-md-6">
                      {{Form::label('title','1.6 ประเภทองค์กร')}}
                      <select class="form-control" name="orgEstate" id="orgEstate" >
                        <option>เลือกประเภทองค์กร</option>
                          @foreach ($showAllOrg as $orgType)
                            <option value="{{$orgType->estate_name}}"> {{$orgType->estate_name}} </option>
                          @endforeach
                      </select>
                    </div>
                    <div class="col-md-6">
                      {{Form::label('title','1.7 ประเภทกิจการ')}}
                      <select class="form-control" name="orgฺBusiness" id="orgBusiness" >
                        <option>เลือกประเภทกิจการขององค์กร</option>
                          @foreach ($showAllOrg as $orgType)
                            <option value="{{$orgType->estate_name}}"> {{$orgType->estate_name}} </option>
                          @endforeach
                      </select>
                    </div>
                      
                  </div>
                  {{-- 1.8orgExport /1.9orgRegisterCapital /1.10orgMember --}}
                  <div class="row form-group">
                      <div class="col-md-4">         
                        {{Form::label('title','1.8 การจำหน่าย - ส่งออก')}}
                        {{Form::select('organizeExport',[
                            '1' => 'ไม่มีส่งออก',
                            '2' => 'ยุโรป',
                            '3' => 'อื่นๆ'
                        ],'',['class'=>'form-control js-example-basic-single'])}}
                      </div>
                      <div class="col-md-4">
                        {{Form::label('title','1.9 ทุนจดทะเบียน')}}
                        {{Form::number('organizeRegisterCapital','',['class'=>'form-control'])}}
                      </div>
                      <div class="col-md-4">
                        {{Form::label('title','1.10 จำนวนบุคลากรในหน่วยงาน')}}
                        {{Form::number('organizeMember','',['class'=>'form-control'])}}
                      </div>

                  </div>  
                  {{-- 1.11orgIndustrialType --}}
                  <div class="row form-group">
                    <div class="col-md-12">
                      {{Form::label('title','1.11 ประเภทอุตสาหกรรม')}}
                      <select class="form-control" name="orgEstate" id="orgEstate" >
                        <option>เลือกประเภทองค์กร</option>
                          @foreach ($showAllOrg as $orgType)
                            <option value="{{$orgType->estate_name}}"> {{$orgType->estate_name}} </option>
                          @endforeach
                      </select>
                    </div>
                  </div>  
                  {{-- 1.12orgNQI  --}}
                  <div class="row form-group">
                    <div class="col-md-12">
                      {{Form::label('title','1.12 ข้อมูลระบบคุณภาพของหน่วยงาน (ยังไม่สมบูรณ์)')}}
                      <select class="form-control" name="orgEstate" id="orgEstate" >
                        <option>เลือกประเภทองค์กร</option>
                          @foreach ($showAllOrg as $orgType)
                            <option value="{{$orgType->estate_name}}"> {{$orgType->estate_name}} </option>
                          @endforeach
                      </select>
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



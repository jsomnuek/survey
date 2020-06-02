@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {!!Form::open(['action'=>'TechnicalEquipmentController@store','method'=>'POST', 'class' => 'was-validated'])!!}
                <div class="card-header">
                    <h1 class="card-title">ส่วนที่ 1 ข้อมูลองค์กรและภาพรวมของห้องปฏิบัติการ</h1>
                </div>
        
                <div class="card-body">
                  {{-- 1.1 orgName--}}
                  <div class="row form-group">
                      <div class="col-md-12">
                            {{Form::label('title','1.1 ชื่อหน่วยงาน')}}
                            {{Form::text('organizeName','',['class'=>'form-control',''])}}
                      </div>
                  </div>
                  {{-- 1.2orgID /1.3orgCode --}}
                  <div class="row form-group">
                      <div class="col-md-6">
                            {{Form::label('title','1.2 รหัสหน่วยงาน (AABCC)')}}
                            {{Form::text('organizeCode','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-6">
                            {{Form::label('title','1.3 หมายเลขประจำหน่วยงาน (ถ้ามี)')}}
                            {{Form::text('organizeOwnCode','',['class'=>'form-control'])}}
                            
                      </div>
                  </div>
                  {{-- 1.4orgEstate--}}
                  <div class="row form-group">
                    <div class="col-md-12">
                          {{Form::label('title','1.4 ที่ตั้งของห้องปฏิบัติการ')}}
                          <select class="form-control" name="orgEstate" id="orgEstate" >
                            <option>เลือกที่ตั้งของห้องปฏิบัติการ</option>
                              @foreach ($showAllOrg as $LabsData)
                                <option value="{{$LabsData->estate_name}}"> {{$LabsData->estate_name}} </option>
                              @endforeach
                          </select>
                    </div>
                  </div>
                  {{-- 1.5orgAddress --}}
                  <label for="">1.5 ที่อยู่</label>
                  <div class="row form-group">
                      <div class="col-md-6">
                        {{Form::label('title','อาคาร')}}
                        {{Form::text('organizeAddress','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-6">
                        {{Form::label('title','ชั้น')}}
                        {{Form::text('organizeAddress','',['class'=>'form-control',''])}}
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-4">
                        {{Form::label('title','เลขที่')}}
                        {{Form::text('organizeAddress','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-4">
                        {{Form::label('title','ถนน')}}
                        {{Form::text('organizeAddress','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-4">
                        {{Form::label('title','ซอย')}}
                        {{Form::text('organizeAddress','',['class'=>'form-control',''])}}
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



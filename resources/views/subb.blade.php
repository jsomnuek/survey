@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {!!Form::open(['action'=>'TechnicalEquipmentController@store','method'=>'POST', 'class' => 'was-validated'])!!}
                <div class="card-header">
                    <h1 class="card-title">บันทึกข้อมูลหน่วยงาน</h1>
                </div>
             
                <div class="card-body">
                  <div class="row form-group">
                      <div class="col-md-12">
                            {{Form::label('title','ชื่อหน่วยงาน')}}
                            {{Form::text('organizeName','',['class'=>'form-control',''])}}
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-6">
                            {{Form::label('title','รหัสหน่วยงาน')}}
                            {{Form::text('organizeCode','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-6">
                            {{Form::label('title','ประเภทหน่วยงาน')}}
                            {{Form::select('organizeGroup',[
                                '1' => 'ภาครัฐ',
                                '2' => 'เอกชน',
                                '3' => 'รัฐวิสาหกิจ',
                                '4' => 'สถาบันการศึกษา',
                            ],'',['class'=>'form-control'])}}
                            
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-12">
                        {{Form::label('title','ที่อยู่')}}
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
                      <div class="col-md-6">
                        {{Form::label('title','ละติจูด')}}
                        {{Form::text('organizeLatitude','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-6">
                        {{Form::label('title','ลองติจูด')}}
                        {{Form::text('organizeLongitude','',['class'=>'form-control',''])}}
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-6">         
                        {{Form::label('title','ประเภทกิจการ')}}
                        {{Form::select('organizeType',[
                            '1' => 'วิสาหกิจชุมชน',
                            '2' => 'วิสาหกิจเริ่มต้น',
                            '3' => 'อุตสาหกรรม',
                            '4' => 'ธุรกิจการค้า',
                        ],'',['class'=>'form-control'])}}
                      </div>
                      <div class="col-md-6">
                        {{Form::label('title','ประเภทอุตสาหกรรม')}}
                        {{Form::select('organizeIndustryType',[
                            '1' => 'ยานยนต์ ชิ้นส่วน อะไหล่',
                            '2' => 'อุปกรณ์อิเล็กทรอนิกส์ อุปกรณ์โทรคมนาคม เซ็นเซอร์',
                        ],'',['class'=>'form-control'])}}
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-4">         
                        {{Form::label('title','ข้อมูลระบบคุณภาพ')}}
                        {{Form::select('organizeExport',[
                            '1' => 'ไม่มีส่งออก',
                            '2' => 'ยุโรป',
                            '3' => 'อื่นๆ'
                        ],'',['class'=>'form-control js-example-basic-single'])}}
                      </div>
                      <div class="col-md-4">
                        {{Form::label('title','จำนวนบุคลากรในหน่วยงาน')}}
                        {{Form::number('organizeMember','',['class'=>'form-control'])}}
                      </div>
                      <div class="col-md-4">
                        {{Form::label('title','ทุนจดทะเบียน')}}
                        {{Form::number('organizeRegisterCapital','',['class'=>'form-control'])}}
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-4">         
                        {{Form::label('title','การจำหน่าย-ส่งออก')}}
                        {{Form::select('organizeExport',[
                            '1' => 'ไม่มีส่งออก',
                            '2' => 'ยุโรป',
                            '3' => 'อื่นๆ'
                        ],'',['class'=>'form-control'])}}
                      </div>
                      <div class="col-md-4">
                        {{Form::label('title','จำนวนบุคลากรในหน่วยงาน')}}
                        {{Form::number('organizeMember','',['class'=>'form-control'])}}
                      </div>
                      <div class="col-md-4">
                        {{Form::label('title','ทุนจดทะเบียน')}}
                        {{Form::number('organizeRegisterCapital','',['class'=>'form-control'])}}
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



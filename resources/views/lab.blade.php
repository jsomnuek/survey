@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {!!Form::open(['action'=>'TechnicalEquipmentController@store','method'=>'POST', 'class' => 'was-validated'])!!}
                <div class="card-header">
                    <h1 class="card-title">บันทึกข้อมูลห้องปฏิบัติการ</h1>
                </div>
             
                <div class="card-body">
                  <div class="row form-group">
                      <div class="col-md-6">
                            {{Form::label('title','รหัสห้องปฏิบัติการ')}}
                            {{Form::text('labID','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-6">
                            {{Form::label('title','ประเภทห้องปฏิบัติการ')}}
                            {{Form::select('labType',['C'=>'สอบเทียบ','T'=>'ทดสอบ','R'=>'วิจัย','TC'=>'ทั้งทดสอบและสอบเทียบ'],'',['class'=>'form-control',''])}}
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-6">
                            {{Form::label('title','ชื่อห้องปฏิบัติการ')}}
                            {{Form::text('labName','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-6">
                            {{Form::label('title','ขอบเขตการให้บริการ')}}
                            {{Form::select('labService',[
                                '1' => 'ให้บริการเฉพาะภายในหน่วยงาน',
                                '2' => 'ให้บริการเฉพาะภายนอกหน่วยงาน',
                                '3' => 'ให้บริการทั้งภายในและภายนอกหน่วยงาน',
                            ],'',['class'=>'form-control'])}}  
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-6">
                            {{Form::label('title','รายได้ในห้องปฏิบัติการ/ปี (หน่วยเป็นบาท)')}}
                            {{Form::number('labIncome','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-6">
                            {{Form::label('title','ค่าใช้จ่ายในห้องปฏิบัติการ/ปี (หน่วยเป็นบาท)')}}
                            {{Form::number('labExpense','',['class'=>'form-control',''])}}
                      </div>
                  </div>
                  <div class="row form-group">
                        <div class="col-md-3">
                          {{Form::label('title','การจัดการด้านสิ่งแวดล้อม')}}
                        </div>
                        <div class="col-md-3">
                          {{Form::radio('labEnvironment','',['class'=>'form-control',''])}} ไม่มี
                        </div>
                        <div class="col-md-1">
                          {{Form::radio('labEnvironment','',['class'=>'form-control',''])}} มี ได้แก่ 
                        </div>
                        <div class="col-md-5">
                          {{Form::text('','',['class'=>'form-control'])}} 
                        </div>
                  </div>
                  <label for="">เจ้าหน้าที่ได้รับการฝึกอบรมเพื่อการพัฒนาห้องปฏิบัติการหรือไม่อย่างไร</label>
                  <div class="row form-group">
                        <div class="col-md-3">
                          {{Form::label('title','ISO/IEC17025')}}
                        </div>
                        <div class="col-md-3">
                          {{Form::radio('labEnvironment','',['class'=>'form-control',''])}} ไม่สนใจอบรม
                        </div>
                        <div class="col-md-3">
                          {{Form::radio('labEnvironment','',['class'=>'form-control',''])}} ได้รับการอบรม จำนวน
                        </div>
                        <div class="col-md-3">
                          {{Form::text('','',['class'=>'form-control'])}}
                        </div>
                  </div>
                  <div class="row form-group">
                        <div class="col-md-3">
                          {{Form::label('title','Method Validation')}}
                        </div>
                        <div class="col-md-3">
                          {{Form::radio('labEnvironment','',['class'=>'form-control',''])}} ไม่สนใจอบรม
                        </div>
                        <div class="col-md-3">
                          {{Form::radio('labEnvironment','',['class'=>'form-control',''])}} ได้รับการอบรม จำนวน
                        </div>
                        <div class="col-md-3">
                          {{Form::text('','',['class'=>'form-control'])}}
                        </div>
                  </div>
                  <div class="row form-group">
                        <div class="col-md-3">
                          {{Form::text('','',['class'=>'form-control','placeholder'=>'อื่น ๆ โปรดระบุ'])}}
                        </div>
                        <div class="col-md-3">
                          {{Form::radio('labEnvironment','',['class'=>'form-control',''])}} ไม่สนใจอบรม
                        </div>
                        <div class="col-md-3">
                          {{Form::radio('labEnvironment','',['class'=>'form-control',''])}} ได้รับการอบรม จำนวน
                        </div>
                        <div class="col-md-3">
                          {{Form::text('','',['class'=>'form-control'])}}
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



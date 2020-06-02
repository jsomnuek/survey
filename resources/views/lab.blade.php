@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {!!Form::open(['action'=>'TechnicalEquipmentController@store','method'=>'POST', 'class' => ''])!!}
                <div class="card-header">
                <h1 class="card-title">ส่วนที่ 1 ข้อมูลองค์กรและภาพรวมของห้องปฏิบัติการ (ต่อ)</h1>
                </div>
             
                <div class="card-body">
                  {{-- 1.13labname /1.14labID --}}
                  <div class="row form-group">
                      <div class="col-md-8">
                            {{Form::label('title','1.13 ชื่ิอห้องปฎิบัติการ')}}
                            {{Form::text('labName','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-4">
                            {{Form::label('title','1.14 รหัสห้องปฏิบัติการ (AABCC-MNN)')}}
                            {{Form::text('labID','',['class'=>'form-control',''])}}
                      </div>
                  </div>
                  {{-- 1.15labType /1.16labService --}}
                  <div class="row form-group">
                    <div class="col-md-6">
                      {{Form::label('title','1.15 ประเภทห้องปฏิบัติการ')}}
                      <select class="form-control" name="labType" id="labType" >
                        <option>เลือกประเภทห้องปฏิบัติการ</option>
                        <option value='C'>สอบเทียบ</option>
                        <option value='T'>ทดสอบ</option>
                        <option value='R'>วิจัย</option>
                        <option value='TC'>ทดสอบและสอบเทียบ</option>
                        <option value='TR'>ทดสอบและวิจัย</option>
                        <option value='CR'>สอบเทียบและวิจัย</option>
                        <option value='CTR'>ทั้งทดสอบ สอบเทียบและวิจัย</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      {{Form::label('title','1.16 ขอบเขตการให้บริการของห้องปฏิบัติการ')}}
                      <select class="form-control" name="labService" id="labService" >
                        <option>เลือกขอบเขตการให้บริการของห้องปฏิบัติการ</option>
                        <option value='1'>ให้บริการเฉพาะภายในหน่วยงาน</option>
                        <option value='2'>ให้บริการเฉพาะภายนอกหน่วยงาน</option>
                        <option value='3'>ให้บริการทั้งภายในและภายนอกหน่วยงาน</option>
                      </select>
                    </div>
                  </div>
                  {{-- 1.17labMember --}}
                  <div class="row form-group">
                    <div class="col-md-6">
                      {{Form::label('title','1.17 จำนวนเจ้าหน้าที่ในห้องปฏิบัติการ(คน)')}}
                      {{Form::number('labMember','',['class'=>'form-control',''])}}
                    </div>
                  </div>
                  {{-- 1.18labEducate --}}
                  {{Form::label('title','1.18 ระดับการศึกษาของเจ้าหน้าที่ในห้องปฏิบัติการ')}}
                  <div class="row form-group">
                    <div class="col-md-2">
                      ต่ำกว่า ปวช. {{Form::number('labEdu01','',['class'=>'form-control',''])}}
                    </div>
                    <div class="col-md-2">
                      ปวช. {{Form::number('labEdu01','',['class'=>'form-control',''])}}
                    </div>
                    <div class="col-md-2">
                      ปวส. {{Form::number('labEdu01','',['class'=>'form-control',''])}}
                    </div>
                    <div class="col-md-2">
                      ปริญญาตรี {{Form::number('labEdu01','',['class'=>'form-control',''])}}
                    </div>
                    <div class="col-md-2">
                      ปริญญาโท {{Form::number('labEdu01','',['class'=>'form-control',''])}}
                    </div>
                    <div class="col-md-2">
                      ปริญญาเอกขึ้นไป {{Form::number('labEdu01','',['class'=>'form-control',''])}}
                    </div>
                  </div>
                  {{-- 1.19labCost /1.20labIncome --}}
                  <div class="row form-group">
                    <div class="col-md-6">
                          {{Form::label('title','1.19 ต้นทุนคงที่ (Fix cost) ของห้องปฏิบัติการต่อปี')}}
                          <select class="form-control" name="labCost" id="labCost" >
                            <option value=''>< 500,000 บาท</option>
                            <option value=''>500,001 - 1,000,000 บาท</option>
                            <option value=''>1,000,001 - 5,000,000 บาท</option>
                            <option value=''>5,000,001 - 10,000,000 บาท</option>
                            <option value=''>> 10,000,000 บาท</option>
                          </select>
                    </div>
                    <div class="col-md-6">
                          {{Form::label('title','1.20 รายได้รวมของห้องปฏิบัติการต่อปี')}}
                          <select class="form-control" name="labIncome" id="labIncome" >
                            <option value=''>ไม่มีรายได้</option>
                            <option value=''>< 500,000 บาท</option>
                            <option value=''>500,001 - 1,000,000 บาท</option>
                            <option value=''>1,000,001 - 5,000,000 บาท</option>
                            <option value=''>5,000,001 - 10,000,000 บาท</option>
                            <option value=''>> 10,000,000 บาท</option>
                          </select>
                    </div>
                  </div>
                  {{-- 1.21labUpgrade --}}
                  <label for="">1.21 ข้อมูลการพัฒนาห้องปฎิบัติการ</label><br/>
                  <label for="">1.21.1 เจ้าหน้าที่ได้รับการฝึกอบรมเพื่อการพัฒนาห้องปฏิบัติการหรือไม่อย่างไร</label>
                  <div class="row form-group">
                      <div class="col-md-3">
                        {{Form::label('title','ISO/IEC17025')}}
                      </div>
                      <div class="col-md-3">
                        {{Form::radio('','',['class'=>'form-control',''])}} ไม่สนใจอบรม
                      </div>
                      <div class="col-md-3">
                        {{Form::radio('','',['class'=>'form-control',''])}} ได้รับการอบรม จำนวน(คน)
                      </div>
                      <div class="col-md-3">
                        {{Form::number('','',['class'=>'form-control'])}}
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-3">
                        {{Form::label('title','ความไม่แน่นอนในการวัด')}}
                      </div>
                      <div class="col-md-3">
                        {{Form::radio('','',['class'=>'form-control',''])}} ไม่สนใจอบรม
                      </div>
                      <div class="col-md-3">
                        {{Form::radio('','',['class'=>'form-control',''])}} ได้รับการอบรม จำนวน(คน)
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
                        {{Form::radio('','',['class'=>'form-control',''])}} ไม่สนใจอบรม
                      </div>
                      <div class="col-md-3">
                        {{Form::radio('','',['class'=>'form-control',''])}} ได้รับการอบรม จำนวน(คน)
                      </div>
                      <div class="col-md-3">
                        {{Form::text('','',['class'=>'form-control'])}}
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-3">
                        {{Form::label('title','การควบคุมคุณภาพภายใน')}}
                      </div>
                      <div class="col-md-3">
                        {{Form::radio('','',['class'=>'form-control',''])}} ไม่สนใจอบรม
                      </div>
                      <div class="col-md-3">
                        {{Form::radio('','',['class'=>'form-control',''])}} ได้รับการอบรม จำนวน(คน)
                      </div>
                      <div class="col-md-3">
                        {{Form::text('','',['class'=>'form-control'])}}
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-3">
                        {{Form::label('title','สถิติสำหรับงานทดสอบ')}}
                      </div>
                      <div class="col-md-3">
                        {{Form::radio('','',['class'=>'form-control',''])}} ไม่สนใจอบรม
                      </div>
                      <div class="col-md-3">
                        {{Form::radio('','',['class'=>'form-control',''])}} ได้รับการอบรม จำนวน(คน)
                      </div>
                      <div class="col-md-3">
                        {{Form::text('','',['class'=>'form-control'])}}
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-3">
                        {{Form::label('title','เทคนิคการใช้เครื่องมือพิเศษ.....')}}
                      </div>
                      <div class="col-md-3">
                        {{Form::radio('','',['class'=>'form-control',''])}} ไม่สนใจอบรม
                      </div>
                      <div class="col-md-3">
                        {{Form::radio('','',['class'=>'form-control',''])}} ได้รับการอบรม จำนวน(คน)
                      </div>
                      <div class="col-md-3">
                        {{Form::text('','',['class'=>'form-control'])}}
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-3">
                        {{Form::label('title','ความปลอดภัยในห้องปฏิบัติการ')}}
                      </div>
                      <div class="col-md-3">
                        {{Form::radio('','',['class'=>'form-control',''])}} ไม่สนใจอบรม
                      </div>
                      <div class="col-md-3">
                        {{Form::radio('','',['class'=>'form-control',''])}} ได้รับการอบรม จำนวน(คน)
                      </div>
                      <div class="col-md-3">
                        {{Form::text('','',['class'=>'form-control'])}}
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-3">
                        {{Form::text('','',['class'=>'form-control','placeholder'=>'อื่นๆ โปรดระบุ'])}}
                      </div>
                      <div class="col-md-3">
                        {{Form::radio('','',['class'=>'form-control',''])}} ไม่สนใจอบรม
                      </div>
                      <div class="col-md-3">
                        {{Form::radio('','',['class'=>'form-control',''])}} ได้รับการอบรม จำนวน(คน)
                      </div>
                      <div class="col-md-3">
                        {{Form::text('','',['class'=>'form-control'])}}
                      </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-6">
                      {{Form::label('title','1.21.2 เจ้าหน้าที่ห้องปฏิบัติการได้รับการฝึกอบรมเฉลี่ยต่อปี')}}
                      <select class="form-control" name="labSeminar" id="labSeminar" >
                        <option value=''>0 man-day</option>
                        <option value=''>1-5 man-day</option>
                        <option value=''>6-10 man-day</option>
                        <option value=''>11-15 man-day</option>
                        <option value=''>>15 man-day</option>
                        <option value=''>ไม่แน่นอน</option>
                      </select>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-6">
                      {{Form::label('title','1.21.3 ห้องปฏิบัติการของท่านมีการจัดการทางด้านสิ่งแวดล้อมในสถานที่ทำงานหรือไม่อย่างไร')}}
                    </div>
                    <div class="col-md-1">
                      {{Form::radio('labEnvironment','',['class'=>'form-control',''])}} ไม่มี
                    </div>
                    <div class="col-md-1">
                      {{Form::radio('labEnvironment','',['class'=>'form-control',''])}} มี ได้แก่
                    </div>
                    <div class="col-md-4">
                      {{Form::text('environment','',['class'=>'form-control','placeholder'=>'แนวทางการจัดการสิ่งแวดล้อมของหน่วยงาน คือ'])}}
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-12">
                      {{Form::label('title','1.21.4 ปัญหาและอุปสรรคที่พบในการพัฒนาห้องปฏิบัติการทดสอบ (ถ้ามี)')}}
                      {{Form::textarea('','',['class'=>'form-control','placeholder'=>'อื่นๆ โปรดระบุ','rows'=>'4'])}}
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-12">
                      {{Form::label('title','1.21.5 ความต้องการที่จะได้รับการสนับสนุนเพื่อพัฒนาห้องปฏิบัติการทดสอบ (ถ้ามี)')}}
                      {{Form::textarea('','',['class'=>'form-control','placeholder'=>'อื่นๆ โปรดระบุ','rows'=>'4'])}}
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-12">
                      {{Form::label('title','1.21.6 ข้อเสนอแนะอื่น ๆ (ถ้ามี)')}}
                      {{Form::textarea('','',['class'=>'form-control','placeholder'=>'อื่นๆ โปรดระบุ','rows'=>'4'])}}
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



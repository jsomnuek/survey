@extends('layouts.admin')

@section('page')
    Laboratory Create
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark">เพิ่มข้อมูลห้องปฏิบัติการ</h1>
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <form action="/lab" method="POST">
            @csrf
            <div class="card-header bg-primary">
            <h1 class="card-title">ส่วนที่ 2 ข้อมูลห้องปฏิบัติการ </h1>
            </div>
         
            <div class="card-body">
              {{-- 2.1labname /2.2labID --}}
              <div class="row form-group">
                  <div class="col-md-8">
                    <label for="">2.1 ชื่ิอห้องปฎิบัติการ</label>
                    <input type="text" class="form-control" name="labName" id="labName">
                  </div>
                  <div class="col-md-4">
                    <label for="">2.2 รหัสห้องปฏิบัติการ (AABCC-MNN)</label>
                    <input type="text" class="form-control" name="labID" id="labID">
                  </div>
              </div>
              {{-- 2.3labType /2.4labService --}}
              <div class="row form-group">
                <div class="col-md-6">
                  <label for="">2.3 ประเภทห้องปฏิบัติการ</label>
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
                  <label for="">1.16 ขอบเขตการให้บริการของห้องปฏิบัติการ</label>
                  <select class="form-control" name="labService" id="labService" >
                    <option>เลือกขอบเขตการให้บริการของห้องปฏิบัติการ</option>
                    <option value='1'>ให้บริการเฉพาะภายในหน่วยงาน</option>
                    <option value='2'>ให้บริการเฉพาะภายนอกหน่วยงาน</option>
                    <option value='3'>ให้บริการทั้งภายในและภายนอกหน่วยงาน</option>
                  </select>
                </div>
              </div>
              {{-- 2.5labMember --}}
              <div class="row form-group">
                <div class="col-md-6">
                  <label for="">2.5 จำนวนเจ้าหน้าที่ในห้องปฏิบัติการ(คน)</label>
                  <input type="number" class="form-control" name="labMember" id="labMember">
                </div>
              </div>
              {{-- 2.6labEducate --}}
              <label for=""> 2.6 ระดับการศึกษาของเจ้าหน้าที่ในห้องปฏิบัติการ</label>
              <div class="row form-group">
                <div class="col-md-2">
                  ต่ำกว่า ปวช.
                  <input type="number" class="form-control" name="" id="">
                </div>
                <div class="col-md-2">
                  ปวช.
                  <input type="number" class="form-control" name="" id="">
                </div>
                <div class="col-md-2">
                  ปวส.
                  <input type="number" class="form-control" name="" id="">
                </div>
                <div class="col-md-2">
                  ปริญญาตรี
                  <input type="number" class="form-control" name="" id="">
                </div>
                <div class="col-md-2">
                  ปริญญาโท
                  <input type="number" class="form-control" name="" id="">
                </div>
                <div class="col-md-2">
                  ปริญญาเอกขึ้นไป
                  <input type="number" class="form-control" name="" id="">
                </div>
              </div>
              {{-- 2.7labCost /2.8labIncome --}}
              <div class="row form-group">
                <div class="col-md-6">
                  <label for="">2.7 ต้นทุนคงที่ (Fix cost) ของห้องปฏิบัติการต่อปี</label>
                      <select class="form-control" name="labCost" id="labCost" >
                        <option value=''>< 500,000 บาท</option>
                        <option value=''>500,001 - 1,000,000 บาท</option>
                        <option value=''>1,000,001 - 5,000,000 บาท</option>
                        <option value=''>5,000,001 - 10,000,000 บาท</option>
                        <option value=''>> 10,000,000 บาท</option>
                      </select>
                </div>
                <div class="col-md-6">
                  <label for="">2.8 รายได้รวมของห้องปฏิบัติการต่อปี</label>
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
              {{-- 2.9labUpgrade --}}
              <label for="">2.9 ข้อมูลการพัฒนาห้องปฎิบัติการ</label><br/>
              <label for="">2.9.1 เจ้าหน้าที่ได้รับการฝึกอบรมเพื่อการพัฒนาห้องปฏิบัติการหรือไม่อย่างไร</label>
              <div class="row form-group">
                  <div class="col-md-3">
                    <label for="">ISO/IEC17025</label>
                  </div>
                  <div class="col-md-3">
                    <input type="radio" name="" id="">
                    ไม่สนใจอบรม
                  </div>
                  <div class="col-md-3">
                    <input type="radio" name="" id=""> 
                    ได้รับการอบรม จำนวน(คน)
                  </div>
                  <div class="col-md-3">
                    <input type="number" class="form-control" name="" id="">
                  </div>
              </div>
              <div class="row form-group">
                  <div class="col-md-3">
                    <label for="">ความไม่แน่นอนในการวัด</label>
                  </div>
                  <div class="col-md-3">
                    <input type="radio" name="" id="">
                    ไม่สนใจอบรม
                  </div>
                  <div class="col-md-3">
                    <input type="radio" name="" id=""> 
                    ได้รับการอบรม จำนวน(คน)
                  </div>
                  <div class="col-md-3">
                    <input type="number" class="form-control" name="" id="">
                  </div>
              </div>
              <div class="row form-group">
                  <div class="col-md-3">
                    <label for="">Method Validation</label>
                  </div>
                  <div class="col-md-3">
                    <input type="radio" name="" id="">
                    ไม่สนใจอบรม
                  </div>
                  <div class="col-md-3">
                    <input type="radio" name="" id=""> 
                    ได้รับการอบรม จำนวน(คน)
                  </div>
                  <div class="col-md-3">
                    <input type="number" class="form-control" name="" id="">
                  </div>
              </div>
              <div class="row form-group">
                  <div class="col-md-3">
                    <label for="">การควบคุมคุณภาพภายใน</label>
                  </div>
                  <div class="col-md-3">
                    <input type="radio" name="" id="">
                    ไม่สนใจอบรม
                  </div>
                  <div class="col-md-3">
                    <input type="radio" name="" id=""> 
                    ได้รับการอบรม จำนวน(คน)
                  </div>
                  <div class="col-md-3">
                    <input type="number" class="form-control" name="" id="">
                  </div>
              </div>
              <div class="row form-group">
                  <div class="col-md-3">
                    <label for="">สถิติสำหรับงานทดสอบ</label>
                  </div>
                  <div class="col-md-3">
                    <input type="radio" name="" id="">
                    ไม่สนใจอบรม
                  </div>
                  <div class="col-md-3">
                    <input type="radio" name="" id=""> 
                    ได้รับการอบรม จำนวน(คน)
                  </div>
                  <div class="col-md-3">
                    <input type="number" class="form-control" name="" id="">
                  </div>
              </div>
              <div class="row form-group">
                <div class="col-md-3">
                  <label for="">เทคนิคการใช้เครื่องมือพิเศษ</label>
                </div>
                <div class="col-md-3">
                  <input type="radio" name="" id="">
                  ไม่สนใจอบรม
                </div>
                <div class="col-md-3">
                  <input type="radio" name="" id=""> 
                  ได้รับการอบรม จำนวน(คน)
                </div>
                <div class="col-md-3">
                  <input type="number" class="form-control" name="" id="">
                </div>
              </div>
              <div class="row form-group">
                  <div class="col-md-3">
                    <label for="">ความปลอดภัยในห้องปฏิบัติการ</label>
                  </div>
                  <div class="col-md-3">
                    <input type="radio" name="" id="">
                    ไม่สนใจอบรม
                  </div>
                  <div class="col-md-3">
                    <input type="radio" name="" id=""> 
                    ได้รับการอบรม จำนวน(คน)
                  </div>
                  <div class="col-md-3">
                    <input type="number" class="form-control" name="" id="">
                  </div>
              </div>
              <div class="row form-group">
                <div class="col-md-3">
                  <input type="text" class="form-control" name="" id="" placeholder="อื่นๆ โปรดระบุ">
                </div>
                <div class="col-md-3">
                  <input type="radio" name="" id="">
                  ไม่สนใจอบรม
                </div>
                <div class="col-md-3">
                  <input type="radio" name="" id=""> 
                  ได้รับการอบรม จำนวน(คน)
                </div>
                <div class="col-md-3">
                  <input type="number" class="form-control" name="" id="">
                </div>
            </div>

              <div class="row form-group">
                <div class="col-md-6">
                  <label for="">2.9.2 เจ้าหน้าที่ห้องปฏิบัติการได้รับการฝึกอบรมเฉลี่ยต่อปี</label>
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
                  <label for="">2.9.3 ห้องปฏิบัติการของท่านมีการจัดการทางด้านสิ่งแวดล้อมในสถานที่ทำงานหรือไม่อย่างไร</label>
                </div>
                <div class="col-md-1">
                  <input type="radio" name="labEnvironment" id="labEnvironment"> ไม่มี
                </div>
                <div class="col-md-1">
                  <input type="radio" name="labEnvironment" id="labEnvironment"> มี ได้แก่
                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control" name="environment" id="environment" placeholder="รายละเอียดแนวทางการจัดการสิ่งแวดล้อม">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label for="">2.9.4 ปัญหาและอุปสรรคที่พบในการพัฒนาห้องปฏิบัติการทดสอบ (ถ้ามี)</label>
                  <textarea class="form-control" name="" id="" placeholder="อื่นๆ โปรดระบุ" rows = 4></textarea>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label for="">2.9.5 ความต้องการที่จะได้รับการสนับสนุนเพื่อพัฒนาห้องปฏิบัติการทดสอบ (ถ้ามี)</label>
                  <textarea class="form-control" name="" id="" placeholder="อื่นๆ โปรดระบุ" rows = 4></textarea>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label for="">2.9.6 ข้อเสนอแนะอื่น ๆ (ถ้ามี)</label>
                  <textarea class="form-control" name="" id="" placeholder="อื่นๆ โปรดระบุ" rows = 4></textarea>
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



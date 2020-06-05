@extends('layouts.admin')

@section('page')
    Product Create
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark">เพิ่มข้อมูลผลิตภัณฑ์</h1>
@endsection

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">ส่วนที่ 3 ผลิตภัณฑ์ และรายการทดสอบ/สอบเทียบ</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/organization" method="POST" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">3.1 ชื่อผลิตภัณฑ์ที่ทดสอบ / สอบเทียบ</label>
                                <input type="text" name="productName" class="form-control @error('org_name') is-invalid @enderror" id="productName" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label for="">3.2 ประเภทผลิตภัณฑ์</label>
                                <select class="form-control">
                                    <option>ยานยนต์ ชิ้นส่วน อะไหล่</option>
                                    <option>อุปกรณ์อิเล็กทรอนิกส์</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">3.3 มาตราฐานผลิตภัณฑ์</label>
                                <input type="text" name="productStandard" class="form-control" id="productStandard" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label for="">3.4 ประเภทรายการทดสอบ/สอบเทียบ</label>
                                <select class="form-control" name="" id="">
                                    <option>ดำเนินการแล้ว</option>
                                    <option>อยู่ระหว่างพัฒนา/วิจัย/ทดสอบ</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">3.5 ชื่อรายการทดสอบ/สอบเทียบ</label>
                                <input type="text" name="" class="form-control" id="" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label for="">3.6 ประเภทรายการทดสอบ/สอบเทียบ</label>
                                <select class="form-control" name="" id="">
                                    <option>วิเคราะห์คุณลักษณะทางกายภาพ</option>
                                    <option>วิเคราะห์ทางเคมี</option>
                                    <option>วิเคราะห์ทางเคมี</option>
                                    <option>วิเคราะห์จุลชีววิทยา</option>
                                    <option>วิเคราะห์ทางชีววิทยา ชีวเคมี ชีวโมเลกุล</option>
                                    <option>สอบเทียบ</option>
                                    <option>อื่นๆ </option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="">3.7 วิธีทดสอบ/สอบเทียบตามาตราฐาน </label>
                            </div>
                            <div class="col-md-2">
                                <input class="form-check-input" type="radio" name="radio1">
                                <label class="form-check-label">Inhoused Method</label>
                            </div>
                            <div class="col-md-2">
                                <input class="form-check-input" type="radio" name="radio1">
                                <label class="form-check-label">Inhoused Method</label>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="detail" placeholder="โปรดระบุรายละเอียด">
                            </div>
                        </div>   
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">3.8 ช่วงความสามารถของการวัด</label>
                                <input type="text" name="" class="form-control " id="" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label for="">3.9 ระยะเวลาการทดสอบ/สอบเทียบ</label>
                                <input type="text" name="" class="form-control " id="" placeholder="">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">3.10 ค่าธรรมเนียมการทดสอบ/สอบเทียบ</label>
                                <input type="text" name="" class="form-control " id="" placeholder="">
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">3.11 วัสดุอ้างอิงที่ใช้ทดสอบ</label>
                                <input type="text" name="" class="form-control " id="" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label for="">3.12 แหล่งที่มาของวัสดุอ้างอิง</label>
                                <input type="text" name="" class="form-control " id="" placeholder="">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="">3.13 การควบคุมคุณภาพผลการทดสอบภายใน</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-control" name="" id="">
                                    <option>ไม่มี</option>
                                    <option>มีการใช้ Spike Sample</option>
                                    <option>มีการใช้วัสดุอ้างอิงเพื่อตรวจสอบความถูกต้องของการทดสอบ</option>
                                    <option>มีการวิเคราะห์ Regrant Blank, Field Blank</option>
                                    <option>มีการทำซ้ำ (Replicate)</option>
                                    <option>มีการวิเคราะห์ Checked หรือ Control Sample</option>
                                    <option>มีอื่นๆ </option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="">3.14 การทดสอบความชำนาญห้องปฏิบัติการ </label>
                            </div>
                            <div class="col-md-1">
                                <input class="form-check-input" type="radio" name="radio2">
                                <label class="form-check-label">ไม่มี</label>
                            </div>
                            <div class="col-md-1">
                                <input class="form-check-input" type="radio" name="radio2">
                                <label class="form-check-label">มี</label>
                            </div>
                            <div class="col-md-3">
                                {{-- <label class="form-check-label">ชื่อผู้จัด</label> --}}
                                <input class="form-control" type="text" name="detail" placeholder="โปรดระบุชื่อผู้จัด">
                            </div>
                            <div class="col-md-3">
                                {{-- <label class="form-check-label">ปีที่เข้าร่วม</label> --}}
                                <input class="form-control" type="text" name="detail" placeholder="โปรดระบุปีที่เข้าร่วม">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="">3.15 การรับรองความสามารถห้องปฏิบัติการ</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-control" name="" id="">
                                    <option>ไม่ได้รับการรับรอง</option>
                                    <option>ได้รับการรับรอง ISO/IEC 17025</option>
                                    <option>ได้รับการรับรอง ISO 15189</option>
                                    <option>จะขอการรับรอง ISO/IEC 17025</option>
                                    <option>จะขอการรับรอง ISO 15189</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">3.16 เครื่องมือที่ใช้ทดสอบ/สอบเทียบ (ระบุโดยรหัสเครื่องมือจากส่วนที่ 2)</label>
                            </div>
                            <input class="form-control" type="text" name="detail" placeholder="Ex.AABCC-MNN-RRRSS"><br/>
                            <input class="form-control" type="text" name="detail" placeholder="Ex.AABCC-MNN-RRRSS"><br/>
                            <input class="form-control" type="text" name="detail" placeholder="Ex.AABCC-MNN-RRRSS">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
                <!-- /.form end -->
            </div>
            <!-- /.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection
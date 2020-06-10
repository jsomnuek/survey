@extends('layouts.admin')

@section('page')
    Product Create
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark">เพิ่มรายการทดสอบ/สอบเทียบ</h1>
@endsection

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">ส่วนที่ 4 ผลิตภัณฑ์ และรายการทดสอบ/สอบเทียบ</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="POST" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">4.1 ชื่อผลิตภัณฑ์ที่ทดสอบ / สอบเทียบ</label>
                                <input type="text" name="product_lab_name" class="form-control @error('product_lab_name') is-invalid @enderror" id="product_lab_name" placeholder="" value="{{ old('product_lab_name') }}"  required >
                                @error('product_lab_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    {{-- <strong>text assignment</strong> --}}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">4.2 ประเภทผลิตภัณฑ์</label>
                                <select class="form-control @error('product_type_id') is-invalid @enderror" name="product_type_id" id="product_type_id">
                                    <option value="">โปรดเลือกรายการประเภทผลิตภัณฑ์</option>
                                    @foreach ($productTypes as $productType)
                                        <option value="{{$productType->id}}"> {{$productType->product_lab_type_name}} </option>
                                    @endforeach
                                </select>
                                @error('product_type_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    {{-- <strong>text assignment</strong> --}}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">4.3 มาตราฐานผลิตภัณฑ์</label>
                                <input type="text" name="product_lab_standard" class="form-control" id="product_lab_standard" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label for="">4.4 ชื่อรายการทดสอบ/สอบเทียบ</label>
                                <input type="text" name="product_lab_test_name" class="form-control" id="product_lab_test_name" placeholder="">
                            </div>

                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">4.5 ประเภทรายการทดสอบ/สอบเทียบ</label>
                                <select class="form-control" name="product_lab_test_process" id="product_lab_test_process">
                                    <option value="">โปรดเลือกรายการทดสอบ/สอบเทียบ</option>
                                    <option value=">ดำเนินการแล้ว">ดำเนินการแล้ว</option>
                                    <option value="อยู่ระหว่างพัฒนา/วิจัย/ทดสอบ">อยู่ระหว่างพัฒนา/วิจัย/ทดสอบ</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">4.6 ประเภทการทดสอบ/สอบเทียบ</label>
                                <select class="form-control" name="product_lab_test" id="product_lab_test">
                                    <option value="">โปรดเลือกประเภทการทดสอบ/สอบเทียบ</option>
                                    @foreach ($testingCalibratingTypes as $testingCalibratingTypes)
                                        <option value="{{$testingCalibratingTypes->id}}"> {{$testingCalibratingTypes->testing_calibrating_type_name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="">4.7 วิธีทดสอบ/สอบเทียบตามมาตราฐาน </label>
                            </div>
                            <div class="col-md-2 custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="product_lab_test_method1" name="product_lab_test_method" value="Inhoused Method">
                                <label class="custom-control-label" for="product_lab_test_method1">Inhoused Method</label>
                            </div>
                            <div class="col-md-2 custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="product_lab_test_method2" name="product_lab_test_method" value="Standard Method">
                                <label class="custom-control-label" for="product_lab_test_method2">Standard Method</label>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control form-control-sm" type="text" name="product_lab_test_method_detail" placeholder="โปรดระบุรายละเอียด">
                            </div>
                        </div>   
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">4.8 ช่วงความสามารถของการวัด</label>
                                <input type="text" name="product_lab_test_unit" class="form-control " id="" placeholder="ตัวอย่างเช่น %, ppm, ppb">
                            </div>
                            <div class="col-md-6">
                                <label for="">4.9 ระยะเวลาการทดสอบ/สอบเทียบ (วัน)</label>
                                <input type="number" name="product_lab_test_duration" class="form-control " id="" placeholder="">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">4.10 ค่าธรรมเนียมการทดสอบ/สอบเทียบ </label>
                                <input type="text" name="product_lab_test_fee" class="form-control " id="" placeholder="ระบุค่าธรรมเนียมการทดสอบ/สอบเทียบ (หน่วยบาท)">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">4.11 วัสดุอ้างอิงที่ใช้ทดสอบ</label>
                                <input type="text" name="product_lab_material_ref" class="form-control " id="" placeholder="หากไม่ใช้ กรุณากรอกไม่ใช้">
                            </div>
                            <div class="col-md-6">
                                <label for="">4.12 แหล่งที่มาของวัสดุอ้างอิง</label>
                                <input type="text" name="product_lab_material_ref_from" class="form-control " id="" placeholder="หากไม่ใช้กรุณากรอก ไม่มี">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">4.13 การควบคุมคุณภาพผลการทดสอบภายใน</label>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="product_lab_test_control1" name="product_lab_test_control" value="ไม่มี">
                                        <label for="product_lab_test_control1" class="custom-control-label">ไม่มี</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="product_lab_test_control2" name="product_lab_test_control" value="มีการใช้ Spiked Sample">
                                        <label for="product_lab_test_control2" class="custom-control-label">มีการใช้ Spiked Sample</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="product_lab_test_control3" name="product_lab_test_control" value="มีการใช้วัสดุอ้างอิงเพื่อตรวจสอบความถูกต้องของการทดสอบ">
                                        <label for="product_lab_test_control3" class="custom-control-label">มีการใช้วัสดุอ้างอิงเพื่อตรวจสอบความถูกต้องของการทดสอบ</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="product_lab_test_control4" name="product_lab_test_control" value="มีการวิเคราะห์ Regrant Blank ,Field Blank">
                                        <label for="product_lab_test_control4" class="custom-control-label">มีการวิเคราะห์ Regrant Blank ,Field Blank</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="product_lab_test_control5" name="product_lab_test_control" value="มีการทำซ้ำ">
                                        <label for="product_lab_test_control5" class="custom-control-label">มีการทำซ้ำ</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="product_lab_test_control6" name="product_lab_test_control" value="มีการวิเคราะห์ Checked หรือ Control Sample">
                                        <label for="product_lab_test_control6" class="custom-control-label">มีการวิเคราะห์ Checked หรือ Control Sample</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="custom-control-input" type="radio" id="product_lab_test_control7" >
                                                <label for="product_lab_test_control7" class="custom-control-label">อื่น ๆ</label>
                                            </div>
                                            <div class="col-md-10">
                                                <input class="form-control form-control-sm" type="text" name="product_lab_test_control" id="product_lab_test_control8" placeholder="โปรดระบุ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">4.14 การทดสอบความชำนาญห้องปฏิบัติการ </label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="proficiency_testing1" name="proficiency_testing" value='0'>
                                    <label for="proficiency_testing1" class="custom-control-label">ไม่มี</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input class="custom-control-input" type="radio" id="proficiency_testing2" name="proficiency_testing" value='1'>
                                            <label for="proficiency_testing2" class="custom-control-label">มี</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-control form-control-sm" type="text" name="proficiency_testing_by" id="" placeholder="โปรดระบุชื่ผู้จัด">
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-control form-control-sm" type="text" name="proficiency_testing_year" id="" placeholder="โปรดระบุปี">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="">4.15 การรับรองความสามารถห้องปฏิบัติการ</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-control" name="product_lab_certify" id="product_lab_certify">
                                    <option value="">โปรดเลือกประเภทการทดสอบ/สอบเทียบ</option>
                                    @foreach ($cerifyLaboratories as $cerifyLaboratory)
                                        <option value="{{$cerifyLaboratory->id}}"> {{$cerifyLaboratory->cert_lab_name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">4.16 เครื่องมือที่ใช้ทดสอบ/สอบเทียบ (ระบุโดยรหัสเครื่องมือจากส่วนที่ 2)</label>
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
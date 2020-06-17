@extends('layouts.admin')

@section('page')
    Product Create
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark">แก้ไขผลิตภัณฑ์ และรายการทดสอบ</h1>
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
                <form action="/productLab/{{$productLabs->id}}" method="POST" role="form">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">4.1 ชื่อผลิตภัณฑ์ที่ทดสอบ / สอบเทียบ</label>
                                <input type="text" name="product_lab_name" class="form-control @error('product_lab_name') is-invalid @enderror" id="product_lab_name" placeholder="" value="{{ $productLabs->product_lab_name }}"  >
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
                                    @foreach ($productTypes ?? '' as $productType)
                                        <option value="{{$productType->id}}" {{ $productLabs->product_type_id ==  $productType->id ? 'selected' : ''}}> {{$productType->product_type_name}} </option>
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
                                <input type="text" name="product_lab_standard" class="form-control  @error('product_lab_standard') is-invalid @enderror" id="product_lab_standard" placeholder="" value="{{ $productLabs->product_lab_standard }}">
                                @error('product_lab_standard')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    {{-- <strong>text assignment</strong> --}}
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">4.4 ชื่อรายการทดสอบ/สอบเทียบ</label>
                                <input type="text" name="product_lab_test_name" class="form-control @error('product_lab_test_name') is-invalid @enderror" id="product_lab_test_name" placeholder="" value="{{ $productLabs->product_lab_test_name }}" >
                                @error('product_lab_test_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    {{-- <strong>text assignment</strong> --}}
                                </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">4.5 ประเภทรายการทดสอบ/สอบเทียบ</label>
                                <select class="form-control  @error('product_lab_test_process') is-invalid @enderror" name="product_lab_test_process" id="product_lab_test_process" value="{{ $productLabs->product_lab_test_process}}">
                                    <option value="" >โปรดเลือกรายการทดสอบ/สอบเทียบ</option>
                                    <option value='1' {{ $productLabs->product_lab_test_process ==  1? 'selected' : ''}}>ดำเนินการแล้ว</option>
                                    <option value='2' {{ $productLabs->product_lab_test_process ==  2? 'selected' : ''}}>อยู่ระหว่างพัฒนา/วิจัย/ทดสอบ</option>
                                </select>
                                @error('product_lab_test_process')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    {{-- <strong>text assignment</strong> --}}
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">4.6 ประเภทการทดสอบ/สอบเทียบ</label>
                                <select class="form-control  @error('testing_calibrating_type_id') is-invalid @enderror" name="testing_calibrating_type_id" id="testing_calibrating_type_id">
                                    <option value="">โปรดเลือกประเภทการทดสอบ/สอบเทียบ</option>
                                    @foreach ($testingCalibratingTypes as $testingCalibratingTypes)
                                        <option value="{{$testingCalibratingTypes->id}}" {{ $productLabs->testing_calibrating_type_id ==  $testingCalibratingTypes->id ? 'selected' : ''}} > {{$testingCalibratingTypes->testing_calibrating_type_name}} </option>
                                    @endforeach
                                </select>
                                @error('testing_calibrating_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    {{-- <strong>text assignment</strong> --}}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="">4.7 วิธีทดสอบ/สอบเทียบตามมาตราฐาน </label>
                            </div>
                            <div class="col-md-2 custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="product_lab_test_method1" name="product_lab_test_method" value="1" {{$productLabs->product_lab_test_method ==  1? 'checked' : ''}}>
                                <label class="custom-control-label" for="product_lab_test_method1">Inhoused Method</label>
                            </div>
                            <div class="col-md-2 custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="product_lab_test_method2" name="product_lab_test_method" value="2" {{$productLabs->product_lab_test_method ==  2? 'checked' : ''}}>
                                <label class="custom-control-label" for="product_lab_test_method2">Standard Method</label>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control form-control-sm" type="text" name="product_lab_test_method_detail" placeholder="โปรดระบุรายละเอียด" value="{{ $productLabs->product_lab_test_method_detail}}">
                            </div>
                        </div>   
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">4.8 ช่วงความสามารถของการวัด</label>
                                <input type="text" name="product_lab_test_unit" class="form-control " id="" placeholder="ตัวอย่างเช่น %, ppm, ppb" value="{{ $productLabs->product_lab_test_unit}}">
                            </div>
                            <div class="col-md-6">
                                <label for="">4.9 ระยะเวลาการทดสอบ/สอบเทียบ (วัน)</label>
                                <input type="number" name="product_lab_test_duration" class="form-control " id="" placeholder="" value="{{ $productLabs->product_lab_test_duration}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">4.10 ค่าธรรมเนียมการทดสอบ/สอบเทียบ </label>
                                <input type="text" name="product_lab_test_fee" class="form-control " id="" placeholder="ระบุค่าธรรมเนียมการทดสอบ/สอบเทียบ (หน่วยบาท)" value="{{ $productLabs->product_lab_test_fee}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">4.11 วัสดุอ้างอิงที่ใช้ทดสอบ</label>
                                <input type="text" name="product_lab_material_ref" class="form-control " id="" placeholder="หากไม่ใช้ กรุณากรอกไม่ใช้" value="{{ $productLabs->product_lab_material_ref }}">
                            </div>
                            <div class="col-md-6">
                                <label for="">4.12 แหล่งที่มาของวัสดุอ้างอิง</label>
                                <input type="text" name="product_lab_material_ref_from" class="form-control " id="" placeholder="หากไม่ใช้กรุณากรอก ไม่มี" value="{{ $productLabs->product_lab_material_ref_from}} ">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">4.13 การควบคุมคุณภาพผลการทดสอบภายใน</label>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="product_lab_test_control1" name="product_lab_test_control" value='1' {{ $productLabs->product_lab_test_control == 1 ? 'checked' : ''}}>
                                        <label for="product_lab_test_control1" class="custom-control-label">ไม่มี</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="product_lab_test_control2" name="product_lab_test_control" value='2' {{ $productLabs->product_lab_test_control == 2 ? 'checked' : ''}}>
                                        <label for="product_lab_test_control2" class="custom-control-label">มีการใช้ Spiked Sample</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="product_lab_test_control3" name="product_lab_test_control" value='3' {{ $productLabs->product_lab_test_control == 3 ? 'checked' : ''}}>
                                        <label for="product_lab_test_control3" class="custom-control-label">มีการใช้วัสดุอ้างอิงเพื่อตรวจสอบความถูกต้องของการทดสอบ</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="product_lab_test_control4" name="product_lab_test_control" value='4' {{ $productLabs->product_lab_test_control == 4 ? 'checked' : ''}}>
                                        <label for="product_lab_test_control4" class="custom-control-label">มีการวิเคราะห์ Regrant Blank ,Field Blank</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="product_lab_test_control5" name="product_lab_test_control" value='5' {{ $productLabs->product_lab_test_control == 5 ? 'checked' : ''}}>
                                        <label for="product_lab_test_control5" class="custom-control-label">มีการทำซ้ำ</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="product_lab_test_control6" name="product_lab_test_control" value='6' {{ $productLabs->product_lab_test_control == 6 ? 'checked' : ''}}>
                                        <label for="product_lab_test_control6" class="custom-control-label">มีการวิเคราะห์ Checked หรือ Control Sample</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input class="custom-control-input" type="radio" id="product_lab_test_control7" name="product_lab_test_control" value='7' {{ old('product_lab_test_control') == 7 ? 'checked' : ''}}>
                                                <label for="product_lab_test_control7" class="custom-control-label">อื่น ๆ</label>
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
                                    <input class="custom-control-input" type="radio" id="proficiency_testing1" name="proficiency_testing" value='1' {{ $productLabs->proficiency_testing == 1 ? 'checked' : ''}}>
                                    <label for="proficiency_testing1" class="custom-control-label">ไม่มี</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input class="custom-control-input" type="radio" id="proficiency_testing2" name="proficiency_testing" value='2' {{ $productLabs->proficiency_testing == 2 ? 'checked' : ''}}>
                                            <label for="proficiency_testing2" class="custom-control-label">มี</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-control form-control-sm" type="text" name="proficiency_testing_by" id="" placeholder="โปรดระบุชื่ผู้จัด" value="{{ $productLabs->proficiency_testing_by}}">
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-control form-control-sm" type="text" name="proficiency_testing_year" id="" placeholder="โปรดระบุปี" value="{{ $productLabs->proficiency_testing_year}}">
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
                                <select class="form-control" name="certify_laboratory_id" id="certify_laboratory_id">
                                    <option value="">โปรดเลือกการรับรองความสามารถห้องปฏิบัติการ</option>
                                    @foreach ($cerifyLaboratories as $cerifyLaboratory)
                                        <option value="{{$cerifyLaboratory->id}}" {{ $productLabs->certify_laboratory_id ==  $cerifyLaboratory->id ? 'selected' : ''}}> {{$cerifyLaboratory->cert_lab_name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">4.16 เครื่องมือที่ใช้ทดสอบ/สอบเทียบ (ระบุโดยรหัสเครื่องมือจากส่วนที่ 2)</label>
                            </div>
                            <input class="form-control" type="text" name="" placeholder="Ex.AABCC-MNN-RRRSS"><br/>
                            <input class="form-control" type="text" name="" placeholder="Ex.AABCC-MNN-RRRSS"><br/>
                            <input class="form-control" type="text" name="" placeholder="Ex.AABCC-MNN-RRRSS">
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
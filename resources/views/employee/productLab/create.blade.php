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
                <form action="/productLab" method="POST" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">4.1 ชื่อผลิตภัณฑ์ที่ทดสอบ / สอบเทียบ</label>
                                <input type="text" name="product_lab_name" class="form-control @error('product_lab_name') is-invalid @enderror" id="product_lab_name" placeholder="" value="{{ old('product_lab_name')}}"  >
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
                                <select class="form-control custom-select select2 @error('product_type_id') is-invalid @enderror" multiple="multiple" data-placeholder="โปรดเลือกรายการ"  name="product_type_id[]" id="product_type_id" data-value="{{ old('product_type_id[]') }}">
                                    <option value="" disabled="disabled">disabled</option>
                                    @foreach ($productTypes ?? '' as $productType)
                                        <option value="{{ $productType->id }}" {{ in_array($productType->id, old('product_type_id') ? : []) ? 'selected' : '' }}>{{ $productType->product_type_name }}</option>
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
                                <input type="text" name="product_lab_standard" class="form-control " id="product_lab_standard" placeholder="" value="{{ old('product_lab_standard')}}">
                            </div>
                            <div class="col-md-6">
                                <label for="">4.4 ชื่อรายการทดสอบ/สอบเทียบ</label>
                                <input type="text" name="product_lab_test_name" class="form-control" id="product_lab_test_name" placeholder="" value="{{ old('product_lab_test_name')}}" >
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">4.5 เครื่องมือที่ใช้ทดสอบ/สอบเทียบ (ระบุโดยรหัสเครื่องมือจากส่วนที่ 2)</label>
                            </div>
                                <input class="form-control" type="text" name="" placeholder="Ex.AABCC-MNN-RRRSS"><br/>
                                <input class="form-control" type="text" name="" placeholder="Ex.AABCC-MNN-RRRSS"><br/>
                            <input class="form-control" type="text" name="" placeholder="Ex.AABCC-MNN-RRRSS">
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">4.6 ประเภทรายการทดสอบ/สอบเทียบ</label>
                                <select class="form-control  @error('product_lab_test_process') is-invalid @enderror" name="product_lab_test_process" id="product_lab_test_process" value="{{ old('product_lab_test_process')}}">
                                    <option value='' >โปรดเลือกรายการทดสอบ/สอบเทียบ</option>
                                    <option value='1' {{ old('product_lab_test_process') ==  1? 'selected' : ''}}>ดำเนินการแล้ว</option>
                                    <option value='2' {{ old('product_lab_test_process') ==  2? 'selected' : ''}}>อยู่ระหว่างพัฒนา/วิจัย/ทดสอบ</option>
                                </select>
                                @error('product_lab_test_process')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    {{-- <strong>text assignment</strong> --}}
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">4.7 ประเภทการทดสอบ/สอบเทียบ</label>
                                <select class="form-control  @error('testing_calibrating_type_id') is-invalid @enderror" name="testing_calibrating_type_id" id="testing_calibrating_type_id">
                                    <option value="">โปรดเลือกประเภทการทดสอบ/สอบเทียบ</option>
                                    @foreach ($testingCalibratingTypes as $testingCalibratingTypes)
                                        <option value="{{$testingCalibratingTypes->id}}" {{ old('testing_calibrating_type_id') ==  $testingCalibratingTypes->id ? 'selected' : ''}} > {{$testingCalibratingTypes->testing_calibrating_type_name}} </option>
                                    @endforeach
                                </select>
                                @error('testing_calibrating_type_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    {{-- <strong>text assignment</strong> --}}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">4.8 วิธีทดสอบ/สอบเทียบตามมาตราฐาน </label>
                                <div class="custom-control custom-radio">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input class="custom-control-input @error('product_lab_test_method') is-invalid @enderror" type="radio" id="product_lab_test_method1" name="product_lab_test_method" value="1" {{ old('product_lab_test_method') ==  1? 'checked' : ''}}>
                                            <label class="custom-control-label" for="product_lab_test_method1">Standard Method</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control form-control-sm" type="text" name="product_lab_test_method_detail" placeholder="โปรดระบุรายละเอียด" value="{{ old('product_lab_test_method_detail')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-control custom-radio">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input class="custom-control-input @error('product_lab_test_method') is-invalid @enderror" type="radio" id="product_lab_test_method2" name="product_lab_test_method" value="2" {{ old('product_lab_test_method') ==  2? 'checked' : ''}}>
                                            <label class="custom-control-label" for="product_lab_test_method2">Inhoused Method</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control form-control-sm" type="text" name="product_lab_test_method_detail" placeholder="โปรดระบุรายละเอียด" value="{{ old('product_lab_test_method_detail')}}">
                                        </div>
                                    </div>
                                </div>
                                @error('product_lab_test_method')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    {{-- <strong>text assignment</strong> --}}
                                </span>
                                @enderror
                            </div>
                        </div>  
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">4.9 ช่วงความสามารถของการวัด</label>
                                <input type="text" name="product_lab_test_unit" class="form-control " id="" placeholder="ตัวอย่างเช่น %, ppm, ppb" value="{{ old('product_lab_test_unit')}}">
                            </div>
                            <div class="col-md-6">
                                <label for="">4.10 ระยะเวลาการทดสอบ/สอบเทียบ (วัน)</label>
                                <input type="number" name="product_lab_test_duration" class="form-control @error('product_lab_test_duration') is-invalid @enderror" id="" placeholder="" value="{{ old('product_lab_test_duration')}}">
                                @error('product_lab_test_duration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    {{-- <strong>text assignment</strong> --}}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="">4.11 ค่าธรรมเนียมการทดสอบ/สอบเทียบ </label>
                                <input type="text" name="product_lab_test_fee" class="form-control " id="" placeholder="หน่วยบาท" value="{{ old('product_lab_test_fee')}}">
                            </div>
                            <div class="col-md-4">
                                <label for="">4.12 วัสดุอ้างอิงที่ใช้ทดสอบ</label>
                                <input type="text" name="product_lab_material_ref" class="form-control " id="" placeholder="หากไม่ใช้ กรุณากรอกไม่ใช้" value="{{ old('product_lab_material_ref')}}">
                            </div>
                            <div class="col-md-4">
                                <label for="">4.13 แหล่งที่มาของวัสดุอ้างอิง</label>
                                <input type="text" name="product_lab_material_ref_from" class="form-control " id="" placeholder="หากไม่ใช้กรุณากรอก ไม่มี" value="{{ old('product_lab_material_ref_from')}}">
                            </div>
                        </div>
                        <label for="">4.14 การควบคุมคุณภาพผลการทดสอบภายใน</label>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <select class="form-control custom-select select2" multiple="multiple" data-placeholder="-- โปรดเลือก --"  name="product_lab_test_control[]" id="product_lab_test_control" data-value="{{ old('product_lab_test_control[]') }}">
                                    <option value="" disabled="disabled">disabled</option>
                                    @foreach ($resultControls ?? '' as $resultControl)
                                        <option value="{{ $resultControl->id }}" {{ in_array($resultControl->id, old('product_lab_test_control') ? : []) ? 'selected' : '' }}>{{ $resultControl->result_control_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 text-right">
                                <label for="">อื่นๆ โปรดระบุ  : </label>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control form-control" type="text" name="product_lab_test_control_other" id="" placeholder="หากเลือกอื่นๆ โปรดระบุรายละเอียด" value="{{ old('product_lab_test_control_other')}}">
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">4.15 การทดสอบความชำนาญห้องปฏิบัติการ </label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="proficiency_testing1" name="proficiency_testing" value='1' {{ old('proficiency_testing') == 1 ? 'checked' : ''}}>
                                    <label for="proficiency_testing1" class="custom-control-label">ไม่มี</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input class="custom-control-input" type="radio" id="proficiency_testing2" name="proficiency_testing" value='2' {{ old('proficiency_testing') == 2 ? 'checked' : ''}}>
                                            <label for="proficiency_testing2" class="custom-control-label">มี</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-control form-control-sm" type="text" name="proficiency_testing_by" id="" placeholder="โปรดระบุชื่ผู้จัด" value="{{ old('proficiency_testing_by')}}">
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-control form-control-sm" type="text" name="proficiency_testing_year" id="" placeholder="โปรดระบุปี" value="{{ old('proficiency_testing_year')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="">4.16 การรับรองความสามารถห้องปฏิบัติการ</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-control @error('certify_laboratory_id') is-invalid @enderror" name="certify_laboratory_id" id="certify_laboratory_id">
                                    <option value="">โปรดเลือกการรับรองความสามารถห้องปฏิบัติการ</option>
                                    @foreach ($cerifyLaboratories as $cerifyLaboratory)
                                        <option value="{{$cerifyLaboratory->id}}" {{ old('certify_laboratory_id') ==  $cerifyLaboratory->id ? 'selected' : ''}} > {{$cerifyLaboratory->cert_lab_name}} </option>
                                    @endforeach
                                </select>
                                @error('certify_laboratory_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    {{-- <strong>text assignment</strong> --}}
                                </span>
                                @enderror
                            </div>
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

@section('scripts')
    {{-- <script src="{{ asset('js/components.js') }}"></script> --}}
    <script src="{{ asset('js/form-productLab.js') }}"></script>
@endsection
@extends('layouts.admin')

@section('page')
    Edit Product Lab
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-info">
                <div class="card-header">
					<h3 class="card-title"><i class="far fa-edit"></i> แก้ไขข้อมูลผลิตภัณฑ์ และรายการทดสอบ/สอบเทียบ :</h3>
				</div>
				<!-- /.card-header -->                
                <!-- form start -->
                <form action="/productlab/{{ $productLab->id }}" method="POST" role="form">
                    @csrf
                    @method('PUT')
                    <div class="card-body py-2">
                        <div class="row">
                            <div class="col-md-12">
                                <blockquote class="m-0 bg-light">
                                    <mark>Ref.รหัสเอกสาร</mark> : {{ $productLab->id }}
                                    <strong>|</strong>
                                    <mark>Create</mark> : <i class="far fa-clock"></i> {{ $productLab->created_at }}
                                    <strong>|</strong> 
                                    <mark>Update</mark> : <i class="far fa-clock"></i> {{ $productLab->updated_at }}
                                    <strong>|</strong>
                                    <mark>Status</mark> :
                                    @if ($productLab->completed == 1)
                                    <small class="badge badge-success">approved</small>                                            
                                    @else
                                    <small class="badge badge-secondary">pending</small>
                                    @endif
                                </blockquote>
							</div>
							{{-- /.col Ref.รหัสเอกสาร --}}
                            <div class="col-md-12">
                                <blockquote class="m-0 bg-light">
                                    <mark>ห้องปฏิบัตการ</mark>
                                    <strong>|</strong>
                                    <a href="{{ route('lab.show', $productLab->lab->id) }}">
                                        {{ $productLab->lab->lab_name }}
                                    </a>
                                </blockquote>
                            </div>
                            {{-- /.col --}}
							<div class="col-md-12 my-2">
                                <strong>ส่วนที่ 4 ผลิตภัณฑ์ และรายการทดสอบ/สอบเทียบ : หมายเหตุ :<span><sup class="text-danger"> * </sup>จำเป็น</span></strong>
                            </div>
							{{-- /.col --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="product_lab_name">
                                        4.1 ชื่อผลิตภัณฑ์ที่ทดสอบ/สอบเทียบ : <span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <input type="text" name="product_lab_name" class="form-control @error('product_lab_name') is-invalid @enderror" id="product_lab_name" placeholder="" value="{{ $productLab->product_lab_name }}" required>
                                    @error('product_lab_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col 4.1 ชื่อผลิตภัณฑ์ที่ทดสอบ/สอบเทียบ : --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="product_type_id">
                                        4.2 ประเภทผลิตภัณฑ์ (เลือกได้มากกว่า 1 คำตอบ) :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <select class="form-control custom-select select2-multi @error('product_type_id') is-invalid @enderror" style="width: 100%;" multiple="multiple" name="product_type_id[]" id="product_type_id" required>
                                        @foreach ($productTypes as $item)
                                        <option value="{{ $item->id }}" {{ in_array($item->id, old('product_type_id') ? : []) ? 'selected' : '' }}>
                                            {{ $item->product_type_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('product_type_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group d-none" id="display_product_type_other">
                                    <label for="product_type_other">
                                        ในกรณีเลือกอื่นๆ โปรดระบุ :<span><sup class="text-danger"> *</sup> 
                                    </label>
                                    <input class="form-control" type="text" name="product_type_other" id="product_type_other" placeholder="" value="{{ $productLab->product_type_other }}">
                                </div>
                            </div>
                            {{-- /.col 4.2 ประเภทผลิตภัณฑ์ (เลือกได้มากกว่า 1 คำตอบ) : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_lab_standard">4.3 มาตราฐานผลิตภัณฑ์ : </label>
                                    <input type="text" name="product_lab_standard" class="form-control" id="product_lab_standard" placeholder="" value="{{ $productLab->product_lab_standard }}">
                                </div>
                            </div>
                            {{-- /.col 4.3 มาตราฐานผลิตภัณฑ์ : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_lab_test_name">
                                        4.4 ชื่อรายการทดสอบ/สอบเทียบ : <span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <input type="text" name="product_lab_test_name" class="form-control @error('product_lab_test_name') is-invalid @enderror" id="product_lab_test_name" placeholder="" value="{{ $productLab->product_lab_test_name }}" required>
                                    @error('product_lab_test_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col 4.4 ชื่อรายการทดสอบ/สอบเทียบ : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="equipment_id">
                                        4.5 เครื่องมือที่ใช้ทดสอบ/สอบเทียบ (เลือกได้มากกว่า 1 คำตอบ) :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <select class="form-control custom-select select2-multi @error('equipment_id') is-invalid @enderror" style="width: 100%;" multiple="multiple" name="equipment_id[]" id="equipment_id">
                                        @foreach ($equipments as $item)
                                        <option value="{{ $item->id }}" {{ in_array($item->id, old('equipment_id') ? : []) ? 'selected' : '' }}>
                                            {{ $item->equipment_code }} : {{ $item->scienceTool->science_tool_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('equipment_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>    
                            </div>
                            {{-- /.col 4.5 เครื่องมือที่ใช้ทดสอบ/สอบเทียบ : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="testing_calibrating_list_id">
                                        4.6 ประเภทรายการทดสอบ/สอบเทียบ :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <select class="form-control custom-select select2 @error('testing_calibrating_list_id') is-invalid @enderror" style="width: 100%;" name="testing_calibrating_list_id" id="testing_calibrating_list_id" data-placeholder="-- โปรดเลือก --">
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($testingCalibratingLists as $item)
                                        <option value="{{ $item->id }}" {{ $productLab->testing_calibrating_list_id ==  $item->id ? 'selected' : '' }}>
                                            {{ $item->testing_list_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('testing_calibrating_list_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col 4.6 ประเภทรายการทดสอบ/สอบเทียบ : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="testing_calibrating_type_id">
                                        4.7 ประเภทการทดสอบ/สอบเทียบ :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <select class="form-control custom-select select2 @error('testing_calibrating_type_id') is-invalid @enderror" style="width: 100%;" name="testing_calibrating_type_id" id="testing_calibrating_type_id" data-placeholder="-- โปรดเลือก --">
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($testingCalibratingTypes as $item)
                                        <option value="{{ $item->id }}" {{ $productLab->testing_calibrating_type_id ==  $item->id ? 'selected' : '' }}>
                                            {{ $item->testing_calibrating_type_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('testing_calibrating_type_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group d-none"  id="display_testing_calibrating_type_other">
                                    <label for="testing_calibrating_type_other">
                                        ในกรณีเลือกอื่นๆ โปรดระบุ ประเภทการทดสอบ/สอบเทียบ :<span><sup class="text-danger"> *</sup> 
                                    </label>
                                    <input class="form-control" type="text" name="testing_calibrating_type_other" id="testing_calibrating_type_other" placeholder="" value="{{ $productLab->testing_calibrating_type_other }}">
                                </div>
                            </div>
                            {{-- /.col 4.7 ประเภทการทดสอบ/สอบเทียบ : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="testing_calibrating_method_id">
                                        4.8 วิธีทดสอบ/สอบเทียบตามมาตรฐาน :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <select class="form-control custom-select select2 @error('testing_calibrating_method_id') is-invalid @enderror" style="width: 100%;" name="testing_calibrating_method_id" id="testing_calibrating_method_id" data-placeholder="-- โปรดเลือก --">
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($testingCalibratingMethods as $item)
                                        <option value="{{ $item->id }}" {{ $productLab->testing_calibrating_method_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->testing_method_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('testing_calibrating_method_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group d-none"  id="display_testing_calibrating_method_detail">
                                    <label for="testing_calibrating_method_detail">
                                        โปรดระบุ รายละเอียด วิธีทดสอบ/สอบเทียบตามมาตรฐาน :<span><sup class="text-danger"> *</sup>
                                    </label>
                                    <input class="form-control" type="text" name="testing_calibrating_method_detail" id="testing_calibrating_method_detail" placeholder="" value="{{ $productLab->testing_calibrating_method_detail }}">
                                </div>
                            </div>
                            {{-- /.col 4.8 วิธีทดสอบ/สอบเทียบตามมาตรฐาน : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_lab_test_unit">4.9 ช่วงความสามารถของการวัด :</label>
                                    <input type="text" name="product_lab_test_unit" class="form-control" id="product_lab_test_unit" placeholder="" value="{{ $productLab->product_lab_test_unit }}">
                                </div>
                            </div>
                            {{-- /.col 4.9 ช่วงความสามารถของการวัด : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_lab_test_duration">
                                        4.10 ระยะเวลาการทดสอบ/สอบเทียบ (วัน โดย 1 วัน = 8 ชั่วโมง) :<span><sup class="text-danger"> *</sup>
                                    </label>
                                    <input type="number" name="product_lab_test_duration" class="form-control @error('product_lab_test_duration') is-invalid @enderror" id="product_lab_test_duration" placeholder="" value="{{ $productLab->product_lab_test_duration }}">
                                    @error('product_lab_test_duration')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col 4.10 ระยะเวลาการทดสอบ/สอบเทียบ : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_lab_test_fee">
                                        4.11 ค่าธรรมเนียมการทดสอบ/สอบเทียบ (บาท) :
                                    </label>
                                    <input type="number" name="product_lab_test_fee" class="form-control" id="product_lab_test_fee" placeholder="" value="{{ $productLab->product_lab_test_fee }}">
                                </div>
                            </div>
                            {{-- /.col 4.11 ค่าธรรมเนียมการทดสอบ/สอบเทียบ (บาท) : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_lab_material_ref">
                                        4.12 วัสดุอ้างอิงที่ใช้ :
                                    </label>
                                    <input type="text" name="product_lab_material_ref" class="form-control" id="product_lab_material_ref" placeholder="" value="{{ $productLab->product_lab_material_ref }}">
                                </div>
                            </div>
                            {{-- /.col 4.12 วัสดุอ้างอิงที่ใช้ : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_lab_material_ref_from">
                                        4.13 แหล่งที่มาของวัสดุอ้างอิง :
                                    </label>
                                    <input type="text" name="product_lab_material_ref_from" class="form-control" id="product_lab_material_ref_from" placeholder="" value="{{ $productLab->product_lab_material_ref_from }}">
                                </div>
                            </div>
                            {{-- /.col 4.13 แหล่งที่มาของวัสดุอ้างอิง : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="result_control_id">
                                        4.14 การควบคุมคุณภาพผลการทดสอบภายใน (เลือกได้มากกว่า 1 คำตอบ) :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <select class="form-control custom-select select2-multi @error('result_control_id') is-invalid @enderror" style="width: 100%;" multiple="multiple" name="result_control_id[]" id="result_control_id">
                                        @foreach ($resultControls as $item)
                                        <option value="{{ $item->id }}" {{ in_array($item->id, old('result_control_id') ? : []) ? 'selected' : '' }}>
                                            {{ $item->result_control_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('result_control_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group d-none" id="display_result_control_other">
                                    <label for="result_control_other">
                                        กรณีเลือก "มี อื่นๆ" โปรดระบุ :<span><sup class="text-danger"> *</sup>
                                    </label>
                                    <input class="form-control" type="text" name="result_control_other" id="result_control_other" placeholder="" value="{{ $productLab->result_control_other }}">
                                </div> 
                            </div>
                            {{-- /.col 4.14 การควบคุมคุณภาพผลการทดสอบภายใน (เลือกได้มากกว่า 1 คำตอบ) : --}}
                            <div class="col-md-6">
								<div class="form-group">
									<label for="proficiency_testing_id">
                                        4.15 การทดสอบความสามารถห้องปฏิบัติการ (Proficiency Testing, PT) :
                                    </label>
									<select class="form-control custom-select select2"  data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="proficiency_testing_id" id="proficiency_testing_id">
										<option value="" selected disabled="disabled">disabled</option>
										<option value="1" {{ $productLab->proficiency_testing_id ==  1 ? 'selected' : '' }}>ไม่มี</option>
										<option value="2" {{ $productLab->proficiency_testing_id ==  2 ? 'selected' : '' }}>มี</option>
									</select>
								</div>
								<div class="form-group d-none" id="display_proficiency_testing_by">
									<label for="proficiency_testing_by">
                                        ชื่อผู้จัด :<span><sup class="text-danger"> *</sup>
                                    </label>
									<input class="form-control" type="text" name="proficiency_testing_by" id="proficiency_testing_by" placeholder="" value="{{ $productLab->proficiency_testing_by }}">
								</div>
								<div class="form-group d-none" id="display_proficiency_testing_year">
									<label for="proficiency_testing_year">
                                        ปีที่เข้าร่วม :<span><sup class="text-danger"> *</sup>
                                    </label>
									<input class="form-control" type="text" name="proficiency_testing_year" id="proficiency_testing_year" placeholder="" value="{{ $productLab->proficiency_testing_year }}" data-inputmask='"mask": "9999"' data-mask>
								</div>
							</div>
                            {{-- /.col 4.15 การทดสอบความสามารถห้องปฏิบัติการ : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="certify_laboratory_id">
                                        4.16 การรับรองความสามารถห้องปฏิบัติการ :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <select class="form-control custom-select select2 @error('certify_laboratory_id') is-invalid @enderror" style="width: 100%;" name="certify_laboratory_id" id="certify_laboratory_id" data-placeholder="-- โปรดเลือก --">
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($certifyLaboratories as $item)
                                        <option value="{{ $item->id }}" {{ $productLab->certify_laboratory_id ==  $item->id ? 'selected' : '' }}>
                                            {{ $item->cert_lab_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('certify_laboratory_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col 4.16 การรับรองความสามารถห้องปฏิบัติการ : --}}
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="/productlab/{{ $productLab->id }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-undo"></i> ย้อนกลับ
                        </a>
                        <button type="submit" class="btn btn-info btn-sm">
                            <i class="fas fa-save"></i> บันทึกการแก้ไข
                        </button>
                    </div>
                    <!-- /.card-footer -->
                </form>
                <!-- form end -->
            </div>
            <!-- /.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection

@section('scripts')
    <script src="{{ asset('js/components.js') }}"></script>
    <script src="{{ asset('js/form-productlab.js') }}"></script>
    <script>
        // 4.2 product_type_id
        $('#product_type_id').val({{ json_encode($product_type_items) }});
        $('#product_type_id').trigger('change');
        // 4.5 equipment_id
        $('#equipment_id').val({{ json_encode($equipment_items) }});
        $('#equipment_id').trigger('change');
        // 4.14 result_control_id
        $('#result_control_id').val({{ json_encode($result_control_items) }});
        $('#result_control_id').trigger('change');
    </script>
@endsection
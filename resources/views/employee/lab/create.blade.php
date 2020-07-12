@extends('layouts.admin')

@section('page')
    Create Laboratory
@endsection

@section('header-box-1')
		<h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-edit"></i> เพิ่มข้อมูลห้องปฏิบัติการ :</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/lab" method="POST" role="form">
                    @csrf
                    <div class="card-body py-2">
                        <div class="row">                            
                            <div class="col-md-12 my-2">
                                <strong>ส่วนที่ 2 ข้อมูลห้องปฏิบัติการ : หมายเหตุ :<span><sup class="text-danger"> * </sup>จำเป็น</span></strong>
                            </div>
                            {{-- /.col --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="organization_id">โปรดเลือกองค์กร :<span><sup class="text-danger"> *</sup></span></label>
                                    <select class="form-control custom-select select2 @error('organization_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="organization_id" id="organization_id" data-value="{{ old('organization_id') }}" required>
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($organizations as $item)
                                        <option value="{{ $item->id }}" {{ ( old('organization_id') == $item->id) ? 'selected' : '' }}>
                                            {{ $item->org_name }} 
                                            @if(!empty($item->org_name_level_1)){{' : '.$item->org_name_level_1}}@else @endif 
                                            @if(!empty($item->org_name_level_2)){{' : '.$item->org_name_level_2}}@else @endif
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('organization_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col โปรดเลือกข้อมูลองค์กร --}}
                            <div class="col-md-6">
                                <div class=" form-group">
                                    <label for="lab_name">
                                        2.1 ชื่อห้องปฎิบัติการ :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <input type="text" class="form-control @error('lab_name') is-invalid @enderror" name="lab_name" id="lab_name" placeholder="" value="{{ old('lab_name') }}" required>
                                    @error('lab_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            {{-- <strong>text assignment</strong> --}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col 2.1 ชื่อห้องปฎิบัติการ --}}
                            <div class="col-md-6">
                                <div class=" form-group">
                                    <label for="lab_code">
                                        2.2 รหัสห้องปฏิบัติการ (AABCC-MNN) :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <input type="text" class="form-control @error('lab_code') is-invalid @enderror" name="lab_code" id="lab_code" placeholder="" value="{{ old('lab_code') }}" required>
                                    @error('lab_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col 2.2 รหัสห้องปฏิบัติการ (AABCC-MNN) --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location_lab_id">
                                        2.3 ที่ตั้งห้องปฏิบัติการ :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <select class="form-control custom-select select2 @error('location_lab_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="location_lab_id" id="location_lab_id" data-value="{{ old('location_lab_id') }}" required>
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($locationLabs as $item)
                                        <option value="{{ $item->id }}" {{ ( old('location_lab_id') == $item->id) ? 'selected' : '' }}>
                                            {{ $item->location_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('location_lab_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- /.form-group lab_location_id --}}
                                <div class="form-group d-none" id="display_lab_location_other">
                                    <label for="location_lab_other" class="col-md-12 col-form-label">
                                        กรณีเลือกพื้นที่อื่น โปรดระบุ :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" name="location_lab_other" class="form-control" id="location_lab_other" placeholder="" value="{{ old('location_lab_other') }}">
                                        @error('location_lab_other')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                {{-- /.form-group location_lab_other --}}
                                <div class="form-group d-none" id="display_industrial_estate_id">
                                    <label for="industrial_estate_id" class="col-md-12 col-form-label">
                                        กรณีเลือกนิคมอุตสาหกรรม โปรดระบุ :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <div class="col-md-12">
                                        <select class="form-control custom-select select2 @error('industrial_estate_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="industrial_estate_id" id="industrial_estate_id" data-value="{{ old('industrial_estate_id') }}">
                                            <option value="" selected disabled="disabled">disabled</option>
                                            @foreach ($industrialEstates as $item)
                                            <option value="{{ $item->id }}" {{ ( old('industrial_estate_id') == $item->id) ? 'selected' : '' }}>
                                                {{ $item->estate_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('industrial_estate_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- /.form-group industrial_estate_id --}}
                                <div class="form-group d-none" id="display_industrial_estate_other">
                                    <label for="industrial_estate_other" class="col-md-12 col-form-label">
                                        กรณีเลือกอื่นๆ โปรดระบุ :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" name="industrial_estate_other" class="form-control" id="industrial_estate_other" placeholder="" value="{{ old('industrial_estate_other') }}">
                                        @error('industrial_estate_other')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                {{-- /.form-group industrial_estate_other --}}
                            </div>
                            {{-- /.col 2.3 ที่ตั้งห้องปฏิบัติการ : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="laboratory_type_id">
                                        2.4 ประเภทห้องปฏิบัติการ :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <select class="form-control custom-select select2 @error('laboratory_type_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="laboratory_type_id" id="laboratory_type_id" data-value="{{ old('laboratory_type_id') }}" required>
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($laboratoryTypes as $item)
                                        <option value="{{ $item->id }}" {{ ( old('laboratory_type_id') == $item->id) ? 'selected' : '' }}>
                                            {{ $item->lab_type_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('laboratory_type_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col 2.4 ประเภทห้องปฏิบัติการ --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="area_service_id">
                                        2.5 ขอบเขตการให้บริการห้องปฏิบัติการ :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <select class="form-control custom-select select2 @error('area_service_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="area_service_id" id="area_service_id" data-value="{{ old('area_service_id') }}" required>
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($areaServices as $item)
                                        <option value="{{ $item->id }}" {{ ( old('area_service_id') == $item->id) ? 'selected' : '' }}>
                                            {{ $item->area_service_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('area_service_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col 2.5 ขอบเขตการให้บริการห้องปฏิบัติการ : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lab_employee_amount">
                                        2.6 จำนวนเจ้าหน้าที่ในห้องปฏิบัติการ (คน) :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <input type="number" name="lab_employee_amount" min="1" class="form-control @error('lab_employee_amount') is-invalid @enderror" id="lab_employee_amount" placeholder="" value="{{ old('lab_employee_amount') }}" required>
                                    @error('lab_employee_amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col 2.6 จำนวนเจ้าหน้าที่ในห้องปฏิบัติการ (คน) : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">2.7 ระดับการศึกษาของเจ้าหน้าที่ในห้องปฏิบัติการ :</label>
                                    <div class="row mb-1">
                                        <div class="col-md-6 d-flex justify-content-between align-items-center">
                                            <label for="">ประถม</label>
                                            <label for="">จำนวน (คน) :</label>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center">
                                            <input type="number" name="education_primary_amount" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('education_primary_amount') }}">
                                        </div>
                                    </div>
                                    {{-- /.row ประถมศึกษา --}}
                                    <div class="row mb-1">
                                        <div class="col-md-6 d-flex justify-content-between align-items-center">
                                            <label for="">มัธยม</label>
                                            <label for="">จำนวน (คน) :</label>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center">
                                            <input type="number" name="education_secondary_amount" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('education_secondary_amount') }}">
                                        </div>
                                    </div>
                                    {{-- /.row มัธยม --}}
                                    <div class="row mb-1">
                                        <div class="col-md-6 d-flex justify-content-between align-items-center">
                                            <label for="">ปวช.</label>
                                            <label for="">จำนวน (คน) :</label>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center">
                                            <input type="number" name="education_vocational_amount" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('education_vocational_amount') }}">
                                        </div>
                                    </div>
                                    {{-- /.row ปวช. --}}
                                    <div class="row mb-1">
                                        <div class="col-md-6 d-flex justify-content-between align-items-center">
                                            <label for="">ปวส.</label>
                                            <label for="">จำนวน (คน) :</label>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center">
                                            <input type="number" name="education_high_vocational_amount" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('education_high_vocational_amount') }}">
                                        </div>
                                    </div>
                                    {{-- /.row ปวส. --}}
                                    <div class="row mb-1">
                                        <div class="col-md-6 d-flex justify-content-between align-items-center">
                                            <label for="">ปริญญาตรี</label>
                                            <label for="">จำนวน (คน) :</label>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center">
                                            <input type="number" name="education_bachelor_amount" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('education_bachelor_amount') }}">
                                        </div>
                                    </div>
                                    {{-- /.row ปริญญาตรี --}}
                                    <div class="row mb-1">
                                        <div class="col-md-6 d-flex justify-content-between align-items-center">
                                            <label for="">ปริญญาโท</label>
                                            <label for="">จำนวน (คน) :</label>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center">
                                            <input type="number" name="education_master_amount" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('education_master_amount') }}">
                                        </div>
                                    </div>
                                    {{-- /.row ปริญญาโท --}}
                                    <div class="row mb-1">
                                        <div class="col-md-6 d-flex justify-content-between align-items-center">
                                            <label for="">ปริญญาเอก</label>
                                            <label for="">จำนวน (คน) :</label>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center">
                                            <input type="number" name="education_doctor_amount" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('education_doctor_amount') }}">
                                        </div>
                                    </div>
                                    {{-- /.row ปริญญาเอก --}}
                                </div>
                                <div class="form-group">
                                    <label for="">อื่นๆ โปรดระบุ :</label>
                                    <textarea class="form-control col-md-12" name="education_other" rows="2" placeholder="">{{ old('education_other') }}</textarea>
                                </div>
                            </div>
                            {{-- /.col 2.7 ระดับการศึกษาของเจ้าหน้าที่ในห้องปฏิบัติการ : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fixed_cost_id">2.8 ต้นทุนคงที่ (Fix cost) ของห้องปฏิบัติการต่อปี :<br>
                                        <span class="pl-4">
                                            (ค่าใช้จ่ายประจำที่ไม่ขึ้นกับจำนวนการทดสอบ/สอบเทียบ เช่น ค่าบุคลากร ค่าน้ำ ค่าไฟฟ้า ค่าบำรุงรักษา ค่ารับรองระบบงาน)
                                        </span>
                                    </label>
                                    <select class="form-control custom-select select2 @error('fixed_cost_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="fixed_cost_id" id="fixed_cost_id" data-value="{{ old('fixed_cost_id') }}">
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($fixedCosts as $item)
                                        <option value="{{ $item->id }}" {{ ( old('fixed_cost_id') == $item->id) ? 'selected' : '' }}>
                                            {{ $item->fixed_cost_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('fixed_cost_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="income_per_year_id">2.9 รายได้รวมของห้องปฏิบัติการต่อปี :</label>
                                    <select class="form-control custom-select select2 @error('income_per_year_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="income_per_year_id" id="income_per_year_id" data-value="{{ old('income_per_year_id') }}">
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($incomePerYears as $item)
                                        <option value="{{ $item->id }}" {{ ( old('income_per_year_id') == $item->id) ? 'selected' : '' }}>
                                            {{ $item->income_detail }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('income_per_year_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col 2.8 ต้นทุนคงที่ (Fix cost) ของห้องปฏิบัติการต่อปี : & 2.9 รายได้รวมของห้องปฏิบัติการต่อปี : --}}
                            <div class="col-md-12">
                                <label for="">2.10 ข้อมูลการพัฒนาห้องปฏิบัติการ :</label>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">
                                        2.10.1 เจ้าหน้าที่ได้รับการฝึกอบรมเพื่อการพัฒนาห้องปฏิบัติการหรือไม่อย่างไร :
                                        <span><sup class="text-danger"> *</sup></span>
                                        <span>(กรณีไม่เคยได้รับการอบรม โปรดระบุ "0")</span>
                                    </label>
                                    <div class="row">
                                        <div class="col-md-5 d-flex justify-content-between align-items-center ">
                                            <label for="">- ISO/IEC17025</label>
                                            <label for="">ได้รับการอบรม (คน) :</label>
                                        </div>
                                        <div class="col-md-1 d-flex justify-content-start align-items-center">
                                            <input type="number" name="1_development_amount" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('1_development_amount') }}">
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-end align-items-center">
                                            <label for="">จำนวน (วัน) :</label>
                                        </div>
                                        <div class="col-md-1 d-flex justify-content-start align-items-center">
                                            <input type="number" name="1_development_day" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('1_development_day') }}">
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-end align-items-center">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" name="1_development_interested" class="custom-control-input" id="1_development_interested" value="1" {{ (!empty(old('1_development_interested') == 1) ? 'checked' : '') }}>
                                                <label class="custom-control-label" for="1_development_interested">สนใจเข้าอบรม</label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- /.row ISO/IEC17025 key => 1  --}}
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-5 d-flex justify-content-between align-items-center">
                                            <label for="">- ความไม่แน่นอนในการวัด</label>
                                            <label for="">ได้รับการอบรม (คน) :</label>
                                        </div>
                                        <div class="col-md-1 d-flex justify-content-start align-items-center">
                                            <input type="number" name="2_development_amount" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('2_development_amount') }}">
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-end align-items-center">
                                            <label for="">จำนวน (วัน) :</label>
                                        </div>
                                        <div class="col-md-1 d-flex justify-content-start align-items-center">
                                            <input type="number" name="2_development_day" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('2_development_day') }}">
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-end align-items-center">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" name="2_development_interested" class="custom-control-input" id="2_development_interested" value="1" {{ (!empty(old('2_development_interested') == 1) ? 'checked' : '') }}>
                                                <label class="custom-control-label" for="2_development_interested">สนใจเข้าอบรม</label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- /.row ความไม่แน่นอนในการวัด key => 2 --}}
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-5 d-flex justify-content-between align-items-center">
                                            <label for="">- Method Validation</label>
                                            <label for="">ได้รับการอบรม (คน) :</label>
                                        </div>
                                        <div class="col-md-1 d-flex justify-content-start align-items-center">
                                            <input type="number" name="3_development_amount" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('3_development_amount') }}">
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-end align-items-center">
                                            <label for="">จำนวน (วัน) :</label>
                                        </div>
                                        <div class="col-md-1 d-flex justify-content-start align-items-center">
                                            <input type="number" name="3_development_day" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('3_development_day') }}">
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-end align-items-center">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" name="3_development_interested" class="custom-control-input" id="3_development_interested" value="1" {{ (!empty(old('3_development_interested') == 1) ? 'checked' : '') }}>
                                                <label class="custom-control-label" for="3_development_interested">สนใจเข้าอบรม</label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- /.row Method Validation key => 3 --}}
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-5 d-flex justify-content-between align-items-center">
                                            <label for="">- การควบคุมคุณภาพภายใน</label>
                                            <label for="">ได้รับการอบรม (คน) :</label>
                                        </div>
                                        <div class="col-md-1 d-flex justify-content-start align-items-center">
                                            <input type="number" name="4_development_amount" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('4_development_amount') }}">
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-end align-items-center">
                                            <label for="">จำนวน (วัน) :</label>
                                        </div>
                                        <div class="col-md-1 d-flex justify-content-start align-items-center">
                                            <input type="number" name="4_development_day" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('4_development_day') }}">
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-end align-items-center">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" name="4_development_interested" class="custom-control-input" id="4_development_interested" value="1" {{ (!empty(old('4_development_interested') == 1) ? 'checked' : '') }}>
                                                <label class="custom-control-label" for="4_development_interested">สนใจเข้าอบรม</label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- /.row การควบคุมคุณภาพภายใน key => 4 --}}
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-5 d-flex justify-content-between align-items-center">
                                            <label for="">- สถิติสำหรับงานทดสอบ</label>
                                            <label for="">ได้รับการอบรม (คน) :</label>
                                        </div>
                                        <div class="col-md-1 d-flex justify-content-start align-items-center">
                                            <input type="number" name="5_development_amount" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('5_development_amount') }}">
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-end align-items-center">
                                            <label for="">จำนวน (วัน) :</label>
                                        </div>
                                        <div class="col-md-1 d-flex justify-content-start align-items-center">
                                            <input type="number" name="5_development_day" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('5_development_day') }}">
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-end align-items-center">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" name="5_development_interested" class="custom-control-input" id="5_development_interested" value="1" {{ (!empty(old('5_development_interested') == 1) ? 'checked' : '') }}>
                                                <label class="custom-control-label" for="5_development_interested">สนใจเข้าอบรม</label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- /.row สถิติสำหรับงานทดสอบ key => 5 --}}
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-5 d-flex justify-content-between align-items-center">
                                            <label for="">- เทคนิคในการใช้เครื่องมือวิทยาศาสตร์</label>
                                            <label for="">ได้รับการอบรม (คน) :</label>
                                        </div>
                                        <div class="col-md-1 d-flex justify-content-start align-items-center">
                                            <input type="number" name="6_development_amount" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('6_development_amount') }}">
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-end align-items-center">
                                            <label for="">จำนวน (วัน) :</label>
                                        </div>
                                        <div class="col-md-1 d-flex justify-content-start align-items-center">
                                            <input type="number" name="6_development_day" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('6_development_day') }}">
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-end align-items-center">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" name="6_development_interested" class="custom-control-input" id="6_development_interested" value="1" {{ (!empty(old('6_development_interested') == 1) ? 'checked' : '') }}>
                                                <label class="custom-control-label" for="6_development_interested">สนใจเข้าอบรม</label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- /.row เทคนิคในการใช้เครื่องมือวิทยาศาสตร์ key => 6 --}}
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-5 d-flex justify-content-between align-items-center">
                                            <label for="">- ความปลอดภัยในห้องปฏิบัติการ</label>
                                            <label for="">ได้รับการอบรม (คน) :</label>
                                        </div>
                                        <div class="col-md-1 d-flex justify-content-start align-items-center">
                                            <input type="number" name="7_development_amount" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('7_development_amount') }}">
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-end align-items-center">
                                            <label for="">จำนวน (วัน) :</label>
                                        </div>
                                        <div class="col-md-1 d-flex justify-content-start align-items-center">
                                            <input type="number" name="7_development_day" min="0" class="form-control form-control-sm" placeholder="" value="{{ old('7_development_day') }}">
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-end align-items-center">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" name="7_development_interested" class="custom-control-input" id="7_development_interested" value="1" {{ (!empty(old('7_development_interested') == 1) ? 'checked' : '') }}>
                                                <label class="custom-control-label" for="7_development_interested">สนใจเข้าอบรม</label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- /.row ความปลอดภัยในห้องปฏิบัติการ key => 7 --}}
                                    <hr>
                                </div>
                                <div class="form-group">
                                    <label for="">อื่นๆ โปรดระบุ :</label>
                                    <textarea class="form-control col-md-12" name="lab_development_other" rows="3" placeholder=""></textarea>
                                </div>
                            </div>
                            {{-- /.col 2.10.1 เจ้าหน้าที่ได้รับการฝึกอบรมเพื่อการพัฒนาห้องปฏิบัติการหรือไม่อย่างไร : --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee_training_id">
                                        2.10.2 เจ้าหน้าที่ห้องปฏิบัติการได้รับการฝึกอบรมเฉลี่ยต่อปี :<span><sup class="text-danger"> *</sup></span>
                                    </label>
                                    <select class="form-control custom-select select2 @error('employee_training_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="employee_training_id" id="employee_training_id" data-value="{{ old('employee_training_id') }}" required>
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($employeeTrainings as $item)
                                        <option value="{{ $item->id }}" {{ ( old('employee_training_id') == $item->id) ? 'selected' : '' }}>
                                            {{ $item->emp_training_detail }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('employee_training_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- /.col 2.10.2  : --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">2.10.3 ห้องปฏิบัติการของท่านมีการจัดการทางด้านสิ่งแวดล้อมในสถานที่ทำงานอย่างไรบ้าง (ถ้ามี) :</label>
                                    <textarea class="form-control col-md-12" name="lab_environmental_management" rows="3" placeholder="">{{ old('lab_environmental_management') }}</textarea>
                                </div>
                            </div>
                            {{-- /.col 2.20.3 : --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">2.10.4 ปัญหาและอุปสรรคที่พบในการพัฒนาห้องปฏิบัติการทดสอบ (ถ้ามี) :</label>
                                    <textarea class="form-control col-md-12" name="lab_development_problem" rows="3" placeholder="">{{ old('lab_development_problem') }}</textarea>
                                </div>
                            </div>
                            {{-- /.col 2.20.4 : --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">2.10.5 ความต้องการที่จะได้รับการสนับสนุนเพื่อพัฒนาห้องปฏิบัติการทดสอบ (ถ้ามี) :</label>
                                    <textarea class="form-control col-md-12" name="lab_development_request" rows="3" placeholder="">{{ old('lab_development_request') }}</textarea>
                                </div>
                            </div>
                            {{-- /.col 2.20.5 : --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">2.10.6 ข้อเสนอแนะอื่น ๆ (ถ้ามี) :</label>
                                    <textarea class="form-control col-md-12" name="lab_development_suggestion" rows="3" placeholder="">{{ old('lab_development_suggestion') }}</textarea>
                                </div>
                            </div>
                            {{-- /.col 2.20.6 : --}}
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="/organization" class="btn btn-secondary btn-sm">
                            <i class="fas fa-undo"></i> ย้อนกลับ
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-save"></i> บันทึกข้อมูล
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
    <script src="{{ asset('js/form-lab.js') }}"></script>
@endsection



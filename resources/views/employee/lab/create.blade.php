@extends('layouts.admin')

@section('page')
		Laboratory Create
@endsection

@section('header-box-1')
		<h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ส่วนที่ 2 ห้องปฏิบัติการ</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/lab" method="POST" role="form">
                    @csrf
                    <input type="hidden" name="org_id" value="{{ $orgId->id }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 post">
                                <span>สำหรับองค์กร : </span>
                                <a href="{{ route('organization.show', $orgId->id) }}">
                                    {{ $orgId->org_name }}
                                </a>
                            </div>
                            <div class="col-md-12 mb-3">
                                <strong>หมายเหตุ: <span><sup class="text-danger"> * </sup>จำเป็น</span></strong>
                            </div>
                            {{-- ./col --}}
                            <div class="col-md-12 d-none">
                                <div class="form-group">
                                    <label for="organization_id">โปรดเลือกข้อมูลองค์กร :<span><sup class="text-danger"> *</sup></span></label>
                                    <select class="form-control custom-select select2 @error('organization_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="organization_id" id="organization_id" data-value="{{ old('organization_id') }}">
                                        <option value="" selected disabled="disabled">disabled</option>
                                        {{-- @foreach ($organizations as $organization)
                                        <option value="{{ $organization->id }}" {{ ( old('organization_id') == $organization->id) ? 'selected' : '' }}>{{ $organization->org_name }}</option>
                                        @endforeach --}}
                                    </select>
                                    @error('organization_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- ./col โปรดเลือกข้อมูลองค์กร --}}
                            <div class="col-md-6">
                                <div class=" form-group">
                                    <label for="lab_name">2.1 ชื่อห้องปฎิบัติการ :<span><sup class="text-danger"> *</sup></span></label>
                                    <input type="text" class="form-control @error('lab_name') is-invalid @enderror" name="lab_name" id="lab_name" placeholder="" value="{{ old('lab_name') }}">
                                    @error('lab_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            {{-- <strong>text assignment</strong> --}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- ./col 2.1 ชื่อห้องปฎิบัติการ --}}
                            <div class="col-md-6">
                                <div class=" form-group">
                                    <label for="lab_code">2.2 รหัสห้องปฏิบัติการ (AABCC-MNN) :<span><sup class="text-danger"> *</sup></span></label>
                                    <input type="text" class="form-control @error('lab_code') is-invalid @enderror" name="lab_code" id="lab_code" placeholder="" value="{{ old('lab_code') }}">
                                    @error('lab_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- ./col 2.2 รหัสห้องปฏิบัติการ (AABCC-MNN) --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lab_location_id">2.3 ที่ตั้งห้องปฏิบัติการ :<span><sup class="text-danger"> *</sup></span></label>
                                    <select class="form-control custom-select select2 @error('lab_location_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="lab_location_id" id="lab_location_id" data-value="{{ old('lab_location_id') }}">
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($labLocations as $labLocation)
                                        <option value="{{ $labLocation->id }}" {{ ( old('lab_location_id') == $labLocation->id) ? 'selected' : '' }}>{{ $labLocation->location_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('lab_location_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- ./lab_location_id --}}
                                <div class="form-group " id="display_lab_location_other">
                                    <label for="lab_location_other" class="col-md-12 col-form-label">กรณีเลือกพื้นที่อื่น โปรดระบุ :<span><sup class="text-danger"> *</sup></span></label>
                                    <div class="col-md-12">
                                        <input type="text" name="lab_location_other" class="form-control" id="lab_location_other" placeholder="" value="{{ old('lab_location_other') }}">
                                        @error('lab_location_other')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                {{-- ./lab_location_other --}}
                                <div class="form-group " id="display_industrial_estate_id">
                                    <label for="industrial_estate_id" class="col-md-12 col-form-label">กรณีเลือกนิคมอุตสาหกรรม โปรดระบุ :<span><sup class="text-danger"> *</sup></span></label>
                                    <div class="col-md-12">
                                        <select class="form-control custom-select select2 @error('industrial_estate_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="industrial_estate_id" id="industrial_estate_id" data-value="{{ old('industrial_estate_id') }}">
                                            <option value="" selected disabled="disabled">disabled</option>
                                            @foreach ($industrialEstates as $industrialEstate)
                                            <option value="{{ $industrialEstate->id }}" {{ ( old('industrial_estate_id') == $industrialEstate->id) ? 'selected' : '' }}>{{ $industrialEstate->estate_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('industrial_estate_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- ./industrial_estate_id --}}
                                <div class="form-group " id="display_industrial_estate_other">
                                    <label for="industrial_estate_other" class="col-md-12 col-form-label">กรณีเลือกอื่นๆ โปรดระบุ :<span><sup class="text-danger"> *</sup></span></label>
                                    <div class="col-md-12">
                                        <input type="text" name="industrial_estate_other" class="form-control" id="industrial_estate_other" placeholder="" value="{{ old('industrial_estate_other') }}">
                                        @error('industrial_estate_other')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                {{-- ./industrial_estate_other --}}
                            </div>
                            {{-- ./col 2.3 ที่ตั้งห้องปฏิบัติการ --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="laboratory_type_id">2.4 ประเภทห้องปฏิบัติการ :<span><sup class="text-danger"> *</sup></span></label>
                                    <select class="form-control custom-select select2 @error('laboratory_type_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="laboratory_type_id" id="laboratory_type_id" data-value="{{ old('laboratory_type_id') }}">
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($laboratoryTypes as $laboratoryType)
                                        <option value="{{ $laboratoryType->id }}" {{ ( old('laboratory_type_id') == $laboratoryType->id) ? 'selected' : '' }}>{{ $laboratoryType->lab_type_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('laboratory_type_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- ./2.4 ประเภทห้องปฏิบัติการ --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="area_service_id">2.5 ขอบเขตการให้บริการห้องปฏิบัติการ :<span><sup class="text-danger"> *</sup></span></label>
                                    <select class="form-control custom-select select2 @error('area_service_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="area_service_id" id="area_service_id" data-value="{{ old('area_service_id') }}">
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($areaServices as $areaService)
                                        <option value="{{ $areaService->id }}" {{ ( old('area_service_id') == $areaService->id) ? 'selected' : '' }}>{{ $areaService->area_service_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('area_service_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- ./col 2.5 ขอบเขตการให้บริการห้องปฏิบัติการ --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lab_employee_amount">2.6 จำนวนเจ้าหน้าที่ในห้องปฏิบัติการ (คน) :<span><sup class="text-danger"> *</sup></span></label>
                                    <input type="number" name="lab_employee_amount" min="1" class="form-control @error('lab_employee_amount') is-invalid @enderror" id="lab_employee_amount" placeholder="" value="{{ old('lab_employee_amount') }}">
                                    @error('lab_employee_amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- ./ --}}
                        </div>
                        <!-- /.row -->
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
    <script src="{{ asset('js/components.js') }}"></script>
    <script src="{{ asset('js/form-lab.js') }}"></script>
@endsection



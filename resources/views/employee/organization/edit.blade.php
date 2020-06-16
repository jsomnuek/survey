@extends('layouts.admin')

@section('page')
    Organization Edit
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">ส่วนที่ 1 ข้อมูลองค์กรและภาพรวมของห้องปฎิบัติการ</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/organization/{{ $org->id }}" method="POST" role="form">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <strong>หมายเหตุ: <span><sup class="text-danger"> * </sup>จำเป็น</span></strong>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_name">1.1 ชื่อหน่วยงาน :<span><sup class="text-danger"> *</sup></span></label>
                                    <input type="text" name="org_name" class="form-control @error('org_name') is-invalid @enderror" id="org_name" placeholder="เช่น กรมวิทยาศาสตร์บริการ" value="{{ $org->org_name }}">
                                    @error('org_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            {{-- <strong>text assignment</strong> --}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_name_level_1">ชื่อหน่วยงานย่อย ระดับที่ 1 :</label>
                                    <input type="text" name="org_name_level_1" class="form-control" id="org_name_level_1" placeholder="เช่น สำนักงานเลขานุการกรม" value="{{ $org->org_name_level_1 }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_name_level_2">ชื่อหน่วยงานย่อย ระดับที่ 2 :</label>
                                    <input type="text" name="org_name_level_2" class="form-control" id="org_name_level_2" placeholder="เช่น ฝ่ายเทคโนโลยีดิจิทัล" value="{{ $org->org_name_level_2 }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_code">1.2 รหัสหน่วยงาน (AABCC) :</label>
                                    <input type="text" name="org_code" class="form-control" id="org_code" placeholder="เช่น 10G01" value="{{ $org->org_code }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_number">1.3	หมายเลขประจำหน่วยงาน  (ถ้ามี) :</label>
                                    <input type="text" name="org_number" class="form-control" id="org_number" placeholder="" value="{{ $org->org_number }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="org_location">1.4 ที่ตั้งของห้องปฏิบัติการ :</label>                                
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control custom-select select2" style="width: 100%;" name="lab_location_id" id="lab_location_id" data-value="{{ $org->lab_location_id }}">
                                        <option value="">-- โปรดเลือก --</option>
                                        @foreach ($labLocations as $lablocation)
                                        <option value="{{ $lablocation->id }}" {{ ($org->lab_location_id == $lablocation->id) ? 'selected' : '' }}>{{ $lablocation->location_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group row d-none" id="display_estate_id">
                                    <label for="" class="col-md-3 col-form-label">รายชื่อนิคมอุตสาหกรรม :</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select select2" style="width: 100%;" name="industrial_estate_id" id="industrial_estate_id" data-value="{{ $org->industrial_estate_id }}">
                                            <option value="">-- โปรดเลือก --</option>
                                            @foreach ($industrialEstates as $industrialEstate)
                                            <option value="{{ $industrialEstate->id }}" {{ ($org->industrial_estate_id == $industrialEstate->id) ? 'selected' : '' }}>{{ $industrialEstate->estate_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row d-none" id="display_location_other">
                                    <label for="" class="col-md-2 col-form-label">โปรดระบุ :</label>
                                    <div class="col-md-10">
                                        <input type="text" name="lab_location_other" class="form-control" id="lab_location_other" placeholder="" value="{{ $org->lab_location_other }}" readonly>
                                    </div>
                                </div>                               
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row d-none" id="display_estate_other">
                                    <label for="" class="col-md-2 col-form-label">โปรดระบุ :</label>
                                    <div class="col-md-10">
                                        <input type="text" name="industrial_estate_other" class="form-control" id="industrial_estate_other" placeholder="" value="{{ $org->industrial_estate_other }}" readonly>
                                    </div>
                                </div>                               
                            </div>
                            <div class="col-md-12">
                                <label>1.5	ที่อยู่ :</label>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_building">อาคาร</label>
                                    <input type="text" name="org_building" class="form-control" id="org_building" placeholder="" value="{{ $org->org_building }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_floor">ชั้น</label>
                                    <input type="text" name="org_floor" class="form-control" id="org_floor" placeholder="" value="{{ $org->org_floor }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_address">เลขที่ <span><sup class="text-danger"> *</sup></span></label>
                                    <input type="text" name="org_address" class="form-control @error('org_address') is-invalid @enderror" id="org_address" placeholder="" value="{{ $org->org_address }}">
                                    @error('org_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_soi">ซอย</label>
                                    <input type="text" name="org_soi" class="form-control" id="org_soi" placeholder="" value="{{ $org->org_soi }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_road">ถนน</label>
                                    <input type="text" name="org_road" class="form-control" id="org_road" placeholder="" value="{{ $org->org_road }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="province_info_ch_id">จังหวัด <span><sup class="text-danger"> *</sup></span></label>
                                    <select class="form-control custom-select select2 @error('province_info_ch_id') is-invalid @enderror" style="width: 100%;" name="province_info_ch_id" id="province_info_ch_id" data-value="{{ $org->province_info_ch_id }}">
                                        <option value="">-- เลือกจังหวัด --</option>
                                    </select>
                                    @error('province_info_ch_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="province_info_am_id">เขต/อำเภอ <span><sup class="text-danger"> *</sup></span></label>
                                    <select class="form-control custom-select select2 @error('province_info_am_id') is-invalid @enderror" style="width: 100%;" name="province_info_am_id" id="province_info_am_id" data-value="{{ $org->province_info_am_id }}">
                                        <option value="">-- เลือกเขต/อำเภอ --</option>
                                    </select>
                                    @error('province_info_am_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="province_info_ta_id">แขวง/ตำบล <span><sup class="text-danger"> *</sup></span></label>
                                    <select class="form-control custom-select select2 @error('province_info_ta_id') is-invalid @enderror" style="width: 100%;" name="province_info_ta_id" id="province_info_ta_id" data-value="{{ $org->province_info_ta_id }}">
                                        <option value="">-- เลือกแขวง/ตำบล --</option>
                                    </select>
                                    @error('province_info_ta_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_postcode">รหัสไปรษณีย์ <span><sup class="text-danger"> *</sup></span></label>
                                    <input type="number" name="org_postcode" min="0" class="form-control @error('org_postcode') is-invalid @enderror" id="org_postcode" placeholder="" value="{{ $org->org_postcode }}">
                                    @error('org_postcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_phone">โทรศัพท์ <span><sup class="text-danger"> *</sup></span></label>
                                    <input type="text" name="org_phone" class="form-control @error('org_phone') is-invalid @enderror" id="org_phone" placeholder="" value="{{ $org->org_phone }}">
                                    @error('org_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_fax">โทรสาร</label>
                                    <input type="text" name="org_fax" class="form-control" id="org_fax" placeholder="" value="{{ $org->org_fax }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_email">อีเมล</label>
                                    <input type="email" name="org_email" class="form-control" id="org_email" placeholder="" value="{{ $org->org_email }}" autocomplete="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_website">เว็บไซต์</label>
                                    <input type="text" name="org_website" class="form-control" id="org_website" placeholder="" value="{{ $org->org_website }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_lat">ละติจูด</label>
                                    <input type="number" name="org_lat" class="form-control" id="org_lat" placeholder="" value="{{ $org->org_lat }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_long">ลองติจูด</label>
                                    <input type="number" name="org_long" class="form-control" id="org_long" placeholder="" value="{{ $org->org_long }}">
                                </div>
                            </div>
                            {{-- .col --}}                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="'organisation_type_id">1.6 ประเภทองค์กร :</label>
                                    <select class="form-control custom-select select2" style="width: 100%;" name="organisation_type_id" id="organisation_type_id" data-value="{{ $org->organisation_type_id }}">
                                        <option value="">-- โปรดเลือก --</option>
                                        @foreach ($organisationTypes as $organisationType)
                                        <option value="{{ $organisationType->id }}" {{ ($org->organisation_type_id == $organisationType->id) ? 'selected' : '' }}>{{ $organisationType->org_type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row d-none" id="org_type_other">
                                    <label for="organisation_type_other" class="col-md-3 col-form-label">โปรดระบุ :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="organisation_type_other" class="form-control" id="organisation_type_other" placeholder="" value="{{ $org->organisation_type_other }}" readonly>
                                    </div>
                                </div>
                            </div>
                            {{-- ./col --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="'business_type_id">1.7 ประเภทกิจการ :</label>
                                    <select class="form-control custom-select select2" style="width: 100%;" name="business_type_id" id="business_type_id" data-value="{{ $org->business_type_id }}">
                                        <option value="">-- โปรดเลือก --</option>
                                        @foreach ($businessTypes as $businessType)
                                        <option value="{{ $businessType->id }}" {{ ($org->business_type_id == $businessType->id) ? 'selected' : '' }}>{{ $businessType->business_type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- ./col --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="'sale_product_id">1.8 การจำหน่าย/ส่งออกสินค้า/บริการ :</label>
                                    <select class="form-control custom-select select2" style="width: 100%;" name="sale_product_id" id="sale_product_id" data-value="{{ $org->sale_product_id }}">
                                        <option value="">-- โปรดเลือก --</option>
                                        @foreach ($saleProducts as $saleProduct)
                                        <option value="{{ $saleProduct->id }}" {{ ($org->sale_product_id == $saleProduct->id) ? 'selected' : '' }}>{{ $saleProduct->sale_product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- ./col --}}
                            <div class="col-md-6">                        
                                <div class="form-group">
                                    <label for="org_capital">1.9 ทุนจดทะเบียน (ล้านบาท) :</label>
                                    <input type="number" name="org_capital" min="0" class="form-control" id="org_capital" placeholder="" value="{{ $org->org_capital }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_employee_amount">1.10 จำนวนบุคลากร (คน) :</label>
                                    <input type="number" name="org_employee_amount" min="0" class="form-control" id="org_employee_amount" placeholder="" value="{{ $org->org_employee_amount }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="industrial_type_id">1.11 ประเภทอุตสาหกรรม :</label>
                                    <select class="form-control custom-select select2" style="width: 100%;" name="industrial_type_id" id="industrial_type_id" data-value="{{ $org->industrial_type_id }}">
                                        <option value="">-- โปรดเลือก --</option>
                                        @foreach ($industrialTypes as $industrialType)
                                        <option value="{{ $industrialType->id }}" {{ ($org->industrial_type_id == $industrialType->id) ? 'selected' : '' }}>{{ $industrialType->industrial_type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row d-none" id="display_industrial_type_other">
                                    <label for="industrial_type_other" class="col-md-2 col-form-label">โปรดระบุ :</label>
                                    <div class="col-md-6">
                                        <input type="text" name="industrial_type_other" class="form-control" id="industrial_type_other" placeholder="" value="{{ $org->industrial_type_other }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
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
    <script src="{{ asset('js/form_org.js') }}"></script>
@endsection
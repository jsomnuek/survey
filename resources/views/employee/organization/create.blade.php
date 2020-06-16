@extends('layouts.admin')

@section('page')
    Organization Create
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
                    <h3 class="card-title">ส่วนที่ 1 ข้อมูลองค์กร</h3>           
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/organization" method="POST" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <strong>หมายเหตุ: <span><sup class="text-danger"> * </sup>จำเป็น</span></strong>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_name">1.1 ชื่อหน่วยงาน :<span><sup class="text-danger"> *</sup></span></label>
                                    <input type="text" name="org_name" class="form-control @error('org_name') is-invalid @enderror" id="org_name" placeholder="เช่น กรมวิทยาศาสตร์บริการ" value="{{ old('org_name') }}">
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
                                    <input type="text" name="org_name_level_1" class="form-control" id="org_name_level_1" placeholder="" value="{{ old('org_name_level_1') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_name_level_2">ชื่อหน่วยงานย่อย ระดับที่ 2 :</label>
                                    <input type="text" name="org_name_level_2" class="form-control" id="org_name_level_2" placeholder="" value="{{ old('org_name_level_2') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_code">1.2 รหัสหน่วยงาน (AABCC) :<span><sup class="text-danger"> *</sup></span></label>
                                    <input type="text" name="org_code" class="form-control @error('org_name') is-invalid @enderror" id="org_code" placeholder="" value="{{ old('org_code') }}">
                                    @error('org_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_number">1.3	หมายเลขประจำหน่วยงาน  (ถ้ามี) :</label>
                                    <input type="text" name="org_number" class="form-control" id="org_number" placeholder="" value="{{ old('org_number') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>1.4	ที่อยู่ :</label>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_building">อาคาร</label>
                                    <input type="text" name="org_building" class="form-control" id="org_building" placeholder="" value="{{ old('org_building') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_floor">ชั้น</label>
                                    <input type="text" name="org_floor" class="form-control" id="org_floor" placeholder="" value="{{ old('org_floor') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_address">เลขที่ <span><sup class="text-danger"> *</sup></span></label>
                                    <input type="text" name="org_address" class="form-control @error('org_address') is-invalid @enderror" id="org_address" placeholder="" value="{{ old('org_address') }}">
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
                                    <input type="text" name="org_soi" class="form-control" id="org_soi" placeholder="" value="{{ old('org_soi') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_road">ถนน</label>
                                    <input type="text" name="org_road" class="form-control" id="org_road" placeholder="" value="{{ old('org_road') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="province_info_ch_id">จังหวัด<span><sup class="text-danger"> *</sup></span></label>
                                    <select class="form-control custom-select select2 @error('province_info_ch_id') is-invalid @enderror" style="width: 100%;" name="province_info_ch_id" id="province_info_ch_id" data-value="{{ old('province_info_ch_id') }}">
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
                                    <label for="province_info_am_id">เขต/อำเภอ<span><sup class="text-danger"> *</sup></span></label>
                                    <select class="form-control custom-select select2 @error('province_info_am_id') is-invalid @enderror" style="width: 100%;" name="province_info_am_id" id="province_info_am_id" data-value="{{ old('province_info_am_id') }}">
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
                                    <label for="province_info_ta_id">แขวง/ตำบล<span><sup class="text-danger"> *</sup></span></label>
                                    <select class="form-control custom-select select2 @error('province_info_ta_id') is-invalid @enderror" style="width: 100%;" name="province_info_ta_id" id="province_info_ta_id" data-value="{{ old('province_info_ta_id') }}">
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
                                    <label for="org_postcode">รหัสไปรษณีย์<span><sup class="text-danger"> *</sup></span></label>
                                    <input type="number" name="org_postcode" min="0" class="form-control @error('org_postcode') is-invalid @enderror" id="org_postcode" placeholder="" value="{{ old('org_postcode') }}">
                                    @error('org_postcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_phone">โทรศัพท์</label>
                                    <input type="text" name="org_phone" class="form-control @error('org_phone') is-invalid @enderror" id="org_phone" placeholder="" value="{{ old('org_phone') }}">
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
                                    <input type="text" name="org_fax" class="form-control" id="org_fax" placeholder="" value="{{ old('org_fax') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_email">อีเมล</label>
                                    <input type="email" name="org_email" class="form-control" id="org_email" placeholder="" value="{{ old('org_email') }}" autocomplete="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_website">เว็บไซต์</label>
                                    <input type="text" name="org_website" class="form-control" id="org_website" placeholder="" value="{{ old('org_website') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_lat">ละติจูด</label>
                                    <input type="number" name="org_lat" class="form-control" id="org_lat" placeholder="" value="{{ old('org_lat') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_long">ลองจิจูด</label>
                                    <input type="number" name="org_long" class="form-control" id="org_long" placeholder="" value="{{ old('org_long') }}">
                                </div>
                            </div>
                            {{-- .col --}}
                            <div class="col-md-6">                        
                                <div class="form-group">
                                    <label for="org_capital">1.5 ทุนจดทะเบียน (ล้านบาท) :</label>
                                    <input type="number" name="org_capital" min="1" class="form-control" id="org_capital" placeholder="" value="{{ old('org_capital') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_employee_amount">1.6 จำนวนบุคลากร (คน) :<span><sup class="text-danger"> *</sup></span></label>
                                    <input type="number" name="org_employee_amount" min="1" class="form-control @error('org_employee_amount') is-invalid @enderror" id="org_employee_amount" placeholder="" value="{{ old('org_employee_amount') }}">
                                    @error('org_employee_amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- ./col --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="'sale_products">1.7 การจำหน่าย/ส่งออกสินค้า/บริการ :</label>
                                    <select class="select2  @error('sale_products') is-invalid @enderror" multiple="multiple" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="sale_products[]" id="sale_products" data-value="{{ old('sale_products[]') }}">
                                        <option value="">-- โปรดเลือก --</option>
                                        @foreach ($saleProducts as $saleProduct)
                                        <option value="{{ $saleProduct->id }}" {{ in_array($saleProduct->id, old('sale_products') ? : []) ? 'selected' : '' }}>{{ $saleProduct->sale_product_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('sale_products')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row " id="display_sale_product_other">
                                    <label for="sale_product_other" class="col-md-3 col-form-label">โปรดระบุ :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="sale_product_other" class="form-control" id="sale_product_other" placeholder="" value="{{ old('sale_product_other') }}" readonly>
                                    </div>
                                </div>
                            </div>
                            {{-- ./col --}}                    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="'organisation_type_id">1.8 ประเภทองค์กร :</label>
                                    <select class="form-control custom-select select2 @error('organisation_type_id') is-invalid @enderror" style="width: 100%;" name="organisation_type_id" id="organisation_type_id" data-value="{{ old('organisation_type_id') }}">
                                        <option value="">-- โปรดเลือก --</option>
                                        @foreach ($organisationTypes as $organisationType)
                                        <option value="{{ $organisationType->id }}" {{ (old('organisation_type_id') == $organisationType->id) ? 'selected' : '' }}>{{ $organisationType->org_type_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('organisation_type_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row d-none" id="org_type_other">
                                    <label for="organisation_type_other" class="col-md-3 col-form-label">โปรดระบุ :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="organisation_type_other" class="form-control" id="organisation_type_other" placeholder="" value="{{ old('organisation_type_other') }}" readonly>
                                    </div>
                                </div>
                            </div>
                            {{-- ./col --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="'business_type_id">1.9 ประเภทกิจการ :</label>
                                    <select class="form-control custom-select select2" style="width: 100%;" name="business_type_id" id="business_type_id" data-value="{{ old('business_type_id') }}">
                                        <option value="">-- โปรดเลือก --</option>
                                        @foreach ($businessTypes as $businessType)
                                        <option value="{{ $businessType->id }}" {{ (old('business_type_id') == $businessType->id) ? 'selected' : '' }}>{{ $businessType->business_type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- ./col --}}                           
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="industrial_type_id">1.11 ประเภทอุตสาหกรรม :</label>
                                    <select class="form-control custom-select select2" style="width: 100%;" name="industrial_type_id" id="industrial_type_id" data-value="{{ old('industrial_type_id') }}">
                                        <option value="">-- โปรดเลือก --</option>
                                        @foreach ($industrialTypes as $industrialType)
                                        <option value="{{ $industrialType->id }}" {{ (old('industrial_type_id') == $industrialType->id) ? 'selected' : '' }}>{{ $industrialType->industrial_type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row d-none" id="display_industrial_type_other">
                                    <label for="industrial_type_other" class="col-md-2 col-form-label">โปรดระบุ :</label>
                                    <div class="col-md-6">
                                        <input type="text" name="industrial_type_other" class="form-control" id="industrial_type_other" placeholder="" value="{{ old('industrial_type_other') }}" readonly>
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
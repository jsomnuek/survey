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
                                    <input type="text" name="org_name" class="form-control @error('org_name') is-invalid @enderror" id="org_name" placeholder="เช่น กรมวิทยาศาสตร์บริการ" value="{{ $org->org_name }}" required>
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
                                    <input type="text" name="org_name_level_1" class="form-control" id="org_name_level_1" placeholder="" value="{{ $org->org_name_level_1 }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_name_level_2">ชื่อหน่วยงานย่อย ระดับที่ 2 :</label>
                                    <input type="text" name="org_name_level_2" class="form-control" id="org_name_level_2" placeholder="" value="{{ $org->org_name_level_2 }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="org_code">1.2 รหัสหน่วยงาน (AABCC) :<span><sup class="text-danger"> *</sup></span></label>
                                    <input type="text" name="org_code" class="form-control @error('org_name') is-invalid @enderror" id="org_code" placeholder="" value="{{ $org->org_code }}" required>
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
                                    <input type="text" name="org_number" class="form-control" id="org_number" placeholder="" value="{{ $org->org_number }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>1.4	ที่อยู่ :</label>
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
                                    <input type="text" name="org_address" class="form-control @error('org_address') is-invalid @enderror" id="org_address" placeholder="" value="{{ $org->org_address }}" required>
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
                                    <label for="province_info_ch_id">จังหวัด<span><sup class="text-danger"> *</sup></span></label>
                                    <select class="form-control custom-select select2 @error('province_info_ch_id') is-invalid @enderror" style="width: 100%;" name="province_info_ch_id" id="province_info_ch_id" data-value="{{ $org->province_info_ch_id }}" required>
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
                                    <select class="form-control custom-select select2 @error('province_info_am_id') is-invalid @enderror" style="width: 100%;" name="province_info_am_id" id="province_info_am_id" data-value="{{ $org->province_info_am_id }}" required>
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
                                    <select class="form-control custom-select select2 @error('province_info_ta_id') is-invalid @enderror" style="width: 100%;" name="province_info_ta_id" id="province_info_ta_id" data-value="{{ $org->province_info_ta_id }}" required>
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
                                    <input type="number" name="org_postcode" min="0" class="form-control @error('org_postcode') is-invalid @enderror" id="org_postcode" placeholder="" value="{{ $org->org_postcode }}" required>
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
                                    <label for="org_long">ลองจิจูด</label>
                                    <input type="number" name="org_long" class="form-control" id="org_long" placeholder="" value="{{ $org->org_long }}">
                                </div>
                            </div>
                            {{-- .col --}}
                            <div class="col-md-6">                        
                                <div class="form-group">
                                    <label for="org_capital">1.5 ทุนจดทะเบียน (ล้านบาท) :</label>
                                    <input type="number" name="org_capital" min="1" class="form-control" id="org_capital" placeholder="" value="{{ $org->org_capital }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="org_employee_amount">1.6 จำนวนบุคลากร (คน) :<span><sup class="text-danger"> *</sup></span></label>
                                    <input type="number" name="org_employee_amount" min="1" class="form-control @error('org_employee_amount') is-invalid @enderror" id="org_employee_amount" placeholder="" value="{{ $org->org_employee_amount }}" required>
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
                                    <label for="'sale_products">1.7 การจำหน่าย/ส่งออกสินค้า/บริการ : (เลือกได้มากกว่า 1 คำตอบ)</label>
                                    <select class="form-control custom-select select2-multi" multiple="multiple" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="sale_products[]" id="sale_products" data-value="{{ old('sale_products[]') }}">
                                        <option value=""  disabled="disabled">-- โปรดเลือก --</option>
                                        @foreach ($saleProducts as $saleProduct)
                                        <option value="{{ $saleProduct->id }}" {{ in_array($saleProduct->id, old('sale_products') ? : []) ? 'selected' : '' }}>{{ $saleProduct->sale_product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" id="display_countries">
                                    <label for="countries" class="col-md-12 col-form-label">กรณีต่างประเทศ โปรดระบุ : (เลือกได้มากกว่า 1 คำตอบ)</label>
                                    <div class="col-md-12">
                                        <select class="form-control custom-select select2-multi" multiple="multiple" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="country[]" id="country">
                                            <option value=""  disabled="disabled">-- โปรดเลือก --</option>
                                            @foreach ($countrys as $country)
                                            <option value="{{ $country->id }}">{{ $country->country_name_thai }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- ./col --}}                    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="'organisation_type_id">1.8 ประเภทองค์กร :<span><sup class="text-danger"> *</sup></span></label>
                                    <select class="form-control custom-select select2 @error('organisation_type_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="organisation_type_id" id="organisation_type_id" data-value="{{ $org->organisation_type_id }}" required>
                                        <option value="" selected disabled="disabled">-- โปรดเลือก --</option>
                                        @foreach ($organisationTypes as $organisationType)
                                        <option value="{{ $organisationType->id }}" {{ ($org->organisation_type_id == $organisationType->id) ? 'selected' : '' }}>{{ $organisationType->org_type_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('organisation_type_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row d-none" id="org_type_other">
                                    <label for="organisation_type_other" class="col-md-2 col-form-label">โปรดระบุ :</label>
                                    <div class="col-md-10">
                                        <input type="text" name="organisation_type_other" class="form-control" id="organisation_type_other" placeholder="" value="{{ $org->organisation_type_other }}">
                                    </div>
                                </div>
                            </div>
                            {{-- ./col --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="'business_type_id">1.9 ประเภทกิจการ :<span><sup class="text-danger"> *</sup></span></label>
                                    <select class="form-control custom-select select2 @error('business_type_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="business_type_id" id="business_type_id" data-value="{{ $org->business_type_id }}" required>
                                        <option value="" selected disabled="disabled">-- โปรดเลือก --</option> --}}
                                        @foreach ($businessTypes as $businessType)
                                        <option value="{{ $businessType->id }}" {{ ($org->business_type_id == $businessType->id) ? 'selected' : '' }}>{{ $businessType->business_type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row d-none" id="">
                                    <label for="business_type_other" class="col-md-2 col-form-label">โปรดระบุ :</label>
                                    <div class="col-md-10">
                                        <input type="text" name="business_type_other" class="form-control" id="business_type_other" placeholder="" value="{{ $org->business_type_other }}" readonly>
                                    </div>
                                </div>
                            </div>
                            {{-- ./col --}}                           
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="industrial_type">1.11 ประเภทอุตสาหกรรม :</label>
                                    <select class="form-control custom-select select2" multiple="multiple" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="industrial_type[]" id="industrial_type" data-value="{{ old('industrial_type[]') }}">
                                        <option value=""  disabled="disabled">disabled</option>
                                        @foreach ($industrialTypes as $industrialType)
                                        <option value="{{ $industrialType->id }}" {{ in_array($industrialType->id, old('industrial_type') ? : []) ? 'selected' : '' }}>{{ $industrialType->industrial_type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row" id="">
                                    <label for="" class="col-md-2 col-form-label">โปรดระบุ :</label>
                                    <div class="col-md-10">
                                        <input type="text" name="industrial_type_other" class="form-control" id="industrial_type_other" placeholder="" value="{{ $org->industrial_type_other }}">
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
    <script src="{{ asset('js/form.js') }}"></script>
    <script type="text/javascript">
        // 1.7 sale_products
        $('#sale_products').val({{ json_encode($sale_product_items) }});
        $('#sale_products').trigger('change');
    </script>
@endsection
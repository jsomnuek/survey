@extends('layouts.admin')

@section('page')
    Organization Edit
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark">Organization Edit</h1>
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="org_name">1.1 ชื่อหน่วยงาน :<span><sup class="text-danger"> *</sup></span></label>
                                    <input type="text" name="org_name" class="form-control @error('org_name') is-invalid @enderror" id="org_name" placeholder="" value="{{ $org->org_name }}">
                                    @error('org_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            {{-- <strong>text assignment</strong> --}}
                                        </span>
                                    @enderror
                                </div>
                                {{-- ./org_name --}}
                                <div class="form-group">
                                    <label for="org_code">1.2 รหัสหน่วยงาน (AABCC) :</label>
                                    <input type="text" name="org_code" class="form-control @error('org_code') is-invalid @enderror" id="org_code" placeholder="" value="{{ $org->org_code }}">
                                    @error('org_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            {{-- <strong>text assignment</strong> --}}
                                        </span>
                                    @enderror
                                </div>
                                {{-- ./org_code --}}
                                <div class="form-group">
                                    <label for="org_number">1.3	หมายเลขประจำหน่วยงาน  (ถ้ามี) :</label>
                                    <input type="text" name="org_number" class="form-control" id="org_number" placeholder="" value="{{ $org->org_number }}">
                                </div>
                                {{-- ./org_number --}}
                                <div class="form-group">
                                    <label for="org_location">1.4 ที่ตั้งของห้องปฏิบัติการ :</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="org_location1" name="org_location" value="{{ $org->org_location }}" {{ (old('org_location') == 'มหาวิทยาลัย') ? 'checked' : '' }}>
                                        <label for="org_location1" class="custom-control-label">มหาวิทยาลัย</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="org_location2" name="org_location" value="{{ $org->org_location }}" {{ (old('org_location') == 'อุทยานวิทยาศาสตร์') ? 'checked' : '' }}>
                                        <label for="org_location2" class="custom-control-label">อุทยานวิทยาศาสตร์</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="org_location3" name="org_location" value="{{ $org->org_location }}" {{ (old('org_location') == 'นิคมอุตสาหกรรม') ? 'checked' : '' }}>
                                        <label for="org_location3" class="custom-control-label">นิคมอุตสาหกรรม</label>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2 col-form-label">โปรดระบุรหัสตามคู่มือฯ</label>
                                            <div class="col-md-4">
                                                <input type="text" name="" class="form-control form-control-sm" id="" placeholder="" value="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="org_location4" name="org_location" value="{{ $org->org_location }}" {{ (old('org_location') == 'พื้นที่อื่น') ? 'checked' : '' }}>
                                        <label for="org_location4" class="custom-control-label">พื้นที่อื่น</label>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2 col-form-label">โปรดระบุ</label>
                                            <div class="col-md-4">
                                                <input type="text" name="" class="form-control form-control-sm" id="" placeholder="" value="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- ./org_location --}}                                
                            </div>
                            {{-- ./col --}}
                            <div class="col-md-12">
                                <label>1.5	ที่อยู่ :<span><sup class="text-danger"> * </sup>จำเป็น</span></label>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="org_building">อาคาร</label>
                                    <input type="text" name="org_building" class="form-control" id="org_building" placeholder="" value="{{ $org->org_building }}">
                                </div>
                                {{-- ./org_building --}}
                                <div class="form-group">
                                    <label for="org_floor">ชั้น</label>
                                    <input type="text" name="org_floor" class="form-control" id="org_floor" placeholder="" value="{{ $org->org_floor }}">
                                </div>
                                {{-- ./org_floor --}}
                                <div class="form-group">
                                    <label for="org_address">เลขที่ <span><sup class="text-danger"> *</sup></span></label>
                                    <input type="text" name="org_address" class="form-control @error('org_address') is-invalid @enderror" id="org_address" placeholder="" value="{{ $org->org_address }}">
                                    @error('org_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- ./org_address --}}
                                <div class="form-group">
                                    <label for="org_soi">ซอย</label>
                                    <input type="text" name="org_soi" class="form-control" id="org_soi" placeholder="" value="{{ $org->org_soi }}">
                                </div>
                                {{-- ./org_soi --}}
                                <div class="form-group">
                                    <label for="org_road">ถนน</label>
                                    <input type="text" name="org_road" class="form-control" id="org_road" placeholder="" value="{{ $org->org_road }}">
                                </div>
                                {{-- ./org_road --}}
                                <div class="form-group">
                                    <label for="province_info_ch_id">จังหวัด <span><sup class="text-danger"> *</sup></span></label>
                                    <select class="form-control custom-select @error('province_info_ch_id') is-invalid @enderror" name="province_info_ch_id" id="province_info_ch_id" data-value="{{ $org->province_info_ch_id }}">
                                        <option value="">-- เลือกจังหวัด --</option>
                                    </select>
                                    @error('province_info_ch_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                                    
                                </div>
                                {{-- ./province_info_ch_id --}}
                                <div class="form-group">
                                    <label for="province_info_am_id">เขต/อำเภอ <span><sup class="text-danger"> *</sup></span></label>
                                    <select class="form-control custom-select @error('province_info_am_id') is-invalid @enderror" name="province_info_am_id" id="province_info_am_id" data-value="{{ $org->province_info_am_id }}">
                                        <option value="">-- เลือกเขต/อำเภอ --</option>
                                    </select>
                                    @error('province_info_am_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- ./province_info_am_id --}}
                                <div class="form-group">
                                    <label for="province_info_ta_id">แขวง/ตำบล <span><sup class="text-danger"> *</sup></span></label>
                                    <select class="form-control custom-select @error('province_info_ta_id') is-invalid @enderror" name="province_info_ta_id" id="province_info_ta_id" data-value="{{ $org->province_info_ta_id }}">
                                        <option value="">-- เลือกแขวง/ตำบล --</option>
                                    </select>
                                    @error('province_info_ta_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- ./province_info_ta_id --}}                                
                                <div class="form-group">
                                    <label for="org_postcode">รหัสไปรษณีย์ <span><sup class="text-danger"> *</sup></span></label>
                                    <input type="number" name="org_postcode" min="0" class="form-control @error('org_postcode') is-invalid @enderror" id="org_postcode" placeholder="" value="{{ $org->org_postcode }}">
                                    @error('org_postcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                                
                                {{-- ./org_postcode --}}                        
                                <div class="form-group">
                                    <label for="org_phone">โทรศัพท์ <span><sup class="text-danger"> *</sup></span></label>
                                    <input type="text" name="org_phone" class="form-control @error('org_phone') is-invalid @enderror" id="org_phone" placeholder="" value="{{ $org->org_phone }}">
                                    @error('org_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- ./org_phone --}}
                                <div class="form-group">
                                    <label for="org_fax">โทรสาร</label>
                                    <input type="text" name="org_fax" class="form-control" id="org_fax" placeholder="" value="{{ $org->org_fax }}">
                                </div>
                                {{-- ./org_fax --}}
                                <div class="form-group">
                                    <label for="org_email">อีเมล <span><sup class="text-danger"> *</sup></span></label>
                                    <input type="email" name="org_email" class="form-control @error('org_email') is-invalid @enderror" id="org_email" placeholder="" value="{{ $org->org_email }}" autocomplete="email">
                                    @error('org_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- ./org_email --}}
                                <div class="form-group">
                                    <label for="org_website">เว็บไซต์</label>
                                    <input type="text" name="org_website" class="form-control" id="org_website" placeholder="" value="{{ $org->org_website }}">
                                </div>
                                {{-- ./org_website --}}
                                <div class="form-group">
                                    <label for="org_lat">ละติจูด</label>
                                    <input type="number" name="org_lat" class="form-control" id="org_lat" placeholder="" value="{{ $org->org_lat }}">
                                </div>
                                {{-- ./org_lat --}}
                                <div class="form-group">
                                    <label for="org_long">ลองติจูด</label>
                                    <input type="number" name="org_long" class="form-control" id="org_long" placeholder="" value="{{ $org->org_long }}">
                                </div>
                                {{-- ./org_long --}}
                            </div>
                            {{-- .col --}}                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="'org_type">1.6 ประเภทองค์กร :</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="org_type1" name="org_type" value="{{ $org->org_type }}" {{ (old('org_type') == 'ภาครัฐ') ? 'checked' : '' }}>
                                        <label for="org_type1" class="custom-control-label">ภาครัฐ</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="org_type2" name="org_type" value="{{ $org->org_type }}" {{ (old('org_type') == 'รัฐวิสาหกิจ') ? 'checked' : '' }}>
                                        <label for="org_type2" class="custom-control-label">รัฐวิสาหกิจ</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="org_type3" name="org_type" value="{{ $org->org_type }}"  {{ (old('org_type') == 'เอกชน') ? 'checked' : '' }}>
                                        <label for="org_type3" class="custom-control-label">เอกชน</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="org_type4" name="org_type" value="{{ $org->org_type }}"  {{ (old('org_type') == 'สถาบันการศึกษา') ? 'checked' : '' }}>
                                        <label for="org_type4" class="custom-control-label">สถาบันการศึกษา</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="org_type5" name="org_type" value="{{ $org->org_type }}"  {{ (old('org_type') == 'อื่น ๆ') ? 'checked' : '' }}>
                                        <label for="org_type5" class="custom-control-label">อื่น ๆ</label>
                                        <div class="form-group row">
                                            <label for="org_type5_other" class="col-md-3 col-form-label">โปรดระบุ</label>
                                            <div class="col-md-9">
                                                <input type="text" name="org_type_other" class="form-control form-control-sm" id="org_type5_other" placeholder="" value="{{ $org->org_type_other }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- ./'org_type --}}
                            </div>
                            {{-- ./col-md-4 --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="'org_type_of_business">1.7 ประเภทกิจการ :</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="org_type_of_business1" name="org_type_of_business" value="{{ $org->org_type_of_business }}" {{ (old('org_type_of_business') == 'วิสาหกิจชุมชน') ? 'checked' : '' }}>
                                        <label for="org_type_of_business1" class="custom-control-label">วิสาหกิจชุมชน</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="org_type_of_business2" name="org_type_of_business" value="{{ $org->org_type_of_business }}" {{ (old('org_type_of_business') == 'วิสาหกิจเริ่มต้น') ? 'checked' : '' }}>
                                        <label for="org_type_of_business2" class="custom-control-label">วิสาหกิจเริ่มต้น</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="org_type_of_business3" name="org_type_of_business" value="{{ $org->org_type_of_business }}" {{ (old('org_type_of_business') == 'อุตสาหกรรม') ? 'checked' : '' }}>
                                        <label for="org_type_of_business3" class="custom-control-label">อุตสาหกรรม</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="org_type_of_business4" name="org_type_of_business" value="{{ $org->org_type_of_business }}" {{ (old('org_type_of_business') == 'ธุรกิจการค้า') ? 'checked' : '' }}>
                                        <label for="org_type_of_business4" class="custom-control-label">ธุรกิจการค้า</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="org_type_of_business5" name="org_type_of_business" value="{{ $org->org_type_of_business }}" {{ (old('org_type_of_business') == 'หน่วยวิจัย') ? 'checked' : '' }}>
                                        <label for="org_type_of_business5" class="custom-control-label">หน่วยวิจัย</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="org_type_of_business6" name="org_type_of_business" value="{{ $org->org_type_of_business }}" {{ (old('org_type_of_business') == 'บริการ/ที่ปรึกษา') ? 'checked' : '' }}>
                                        <label for="org_type_of_business6" class="custom-control-label">บริการ/ที่ปรึกษา</label>
                                    </div>
                                </div>
                                {{-- ./'org_type_of_business --}}
                            </div>
                            {{-- ./col-md-4 --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="'org_distribution">1.8 การจำหน่าย/ส่งออกสินค้า/บริการ :</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="org_distribution1" name="org_distribution" value="{{ $org->org_distribution }}" {{ (old('org_distribution') == 'ในประเทศ') ? 'checked' : '' }}>
                                        <label for="org_distribution1" class="custom-control-label">ในประเทศ</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="org_distribution2" name="org_distribution" value="{{ $org->org_distribution }}" {{ (old('org_distribution') == 'ต่างประเทศ') ? 'checked' : '' }}>
                                        <label for="org_distribution2" class="custom-control-label">ต่างประเทศ</label>
                                        <div class="form-group row">
                                            <label for="org_distribution2_other" class="col-md-3 col-form-label">โปรดระบุ</label>
                                            <div class="col-md-9">
                                                <input type="text" name="org_distribution_other" class="form-control form-control-sm" id="org_distribution2_other" placeholder="" value="{{ $org->org_distribution_other }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- ./'org_distribution --}}
                            </div>
                            {{-- ./col-md-4 --}}
                            <div class="col-md-12">                        
                                <div class="form-group">
                                    <label for="org_capital">1.9 ทุนจดทะเบียน (ล้านบาท) :</label>
                                    <input type="number" name="org_capital" min="0" class="form-control" id="org_capital" placeholder="" value="{{ $org->org_capital }}">
                                </div>
                                {{-- ./org_capital --}}
                                <div class="form-group">
                                    <label for="org_employee_amount">1.10 จำนวนบุคลากร (คน) :</label>
                                    <input type="number" name="org_employee_amount" min="0" class="form-control" id="org_employee_amount" placeholder="" value="{{ $org->org_employee_amount }}">
                                </div>
                                {{-- ./org_employee_amount --}}
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
@endsection
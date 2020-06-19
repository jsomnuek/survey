@extends('layouts.admin')

@section('page')
    Equipment Laboratory Create
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark">เพิ่มข้อมูลเครื่องมือในห้องปฏิบัติการ</h1>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <form action="/equipmentLab" role="form" method="post">
                @csrf
                <div class="card-header bg-primary">
                    <h1 class="card-title">ส่วนที่ 3 เครื่องมือวิทยาศาสตร์ </h1>
                </div>
                <div class="card-body">
                  {{-- 3.1equipmentID--}}
                  <div class="row form-group">
                      <div class="col-md-4">
                        <label for="">3.1 รหัสเครื่องมือ (AABCC-MNN-RRRSS)</label>
                        <input type="text" name="equipment_lab_id" id="equipment_lab_id" class="form-control @error('equipment_lab_id') is-invalid @enderror" value="{{ old('equipment_lab_id')}}">
                        @error('equipment_lab_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            {{-- <strong>text assignment</strong> --}}
                        </span>
                        @enderror
                      </div>
                  </div>
                  {{-- 3.2equipmentNameEN /3.3equipmentNameTH --}}
                  <div class="row form-group">
                      <div class="col-md-6">
                        <label for="">3.2 ชื่อเครื่องมือ (ภาษาอังกฤษ)</label>
                        <select class="form-control @error('equipments_id') is-invalid @enderror" name="equipments_id" id="equipments_id" >
                          <option value="">โปรดเลือกเครื่องมือ</option>
                          @foreach ($equipments as $equipment)
                              <option value="{{$equipment->id}}" {{ old('equipments_id') ==  $equipment->id ? 'selected' : ''}}> {{$equipment->equipment_abbr}} : {{$equipment->equipment_name}} </option>
                          @endforeach
                        </select>
                        @error('equipments_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            {{-- <strong>text assignment</strong> --}}
                        </span>
                        @enderror
                      </div>
                      <div class="col-md-6">
                        <label for="">3.3 ชื่อเครื่องมือ (ภาษาไทย)</label>
                        <input type="text" name="equipment_name_th" id="equipment_name_th" class="form-control" value="{{ old('equipment_name_th')}}">
                      </div>
                  </div>
                  {{-- 3.4equipmentBrand /3.5equipmentModel /3.6equipmentOrgCode--}}
                  <div class="row form-group">
                    <div class="col-md-4">
                      <label for="">3.4 ยี่ห้อของเครืองมือ</label>
                      <input type="text" name="equipment_brand" id="equipment_brand" class="form-control" value="{{ old('equipment_brand')}}">
                    </div>
                    <div class="col-md-4">
                      <label for="">3.5 รุ่นของเครืองมือ</label>
                      <input type="text" class=form-control name="equipment_model" id="equipment_model" value="{{ old('equipment_model')}}">
                    </div>
                    <div class="col-md-4">
                      <label for="">3.6 รหัสเครื่องมือของหน่วยงาน (ถ้ามี)</label>
                      <input type="text" class=form-control name="equipment_org_code" id="equipment_org_code" value="{{ old('equipment_org_code')}}">
                    </div>
                  </div>
                  {{-- 3.7 3.8 3.9 --}}
                  <div class="row form-group">
                    <div class="col-md-4">
                      <label for="">3.7 ปีที่ซื้อ</label>
                      <input type="number" class=form-control name="equipment_year" id="equipment_year" value="{{ old('equipment_year')}}">
                    </div>
                    <div class="col-md-4">
                      <label for="">3.8 มูลค่า</label>
                      <input type="number" class=form-control name="equipment_price" id="equipment_price" value="{{ old('equipment_price')}}">
                    </div>
                    <div class="col-md-4">
                      <label for="">3.9 บริษัทที่จัดจำหน่าย</label>
                      <input type="text" class=form-control name="equipment_supplier" id="equipment_supplier" value="{{ old('equipment_supplier')}}">
                    </div>
                </div>
                  {{-- 3.10equipmentMajorTech/3.11objective_usages --}}
                  <div class="row form-group">
                      <div class="col-md-6">
                        <label for="">3.10 สาขาเทคโนโลยีของเครื่องมือ</label>
                        {{-- <select name="major_technologies_id" id="major_technologies_id" class="form-control @error('major_technologies_id') is-invalid @enderror"  >
                          <option value="">โปรดเลือกสาขาเทคโนโลยีของเครื่องมือ</option>
                          @foreach ($majorTechnologies as $majorTechnology)
                              <option value="{{$majorTechnology->id}}" {{ old('major_technologies_id') ==  $majorTechnology->id ? 'selected' : ''}}> {{$majorTechnology->major_tech_name}} </option>
                          @endforeach
                        </select> --}}
                        <select class="form-control custom-select select2 @error('major_technologies_id') is-invalid @enderror" multiple="multiple" data-placeholder="โปรดเลือกรายการ"  name="major_technologies_id[]" id="major_technologies_id" data-value="{{ old('major_technologies_id[]') }}">
                          <option value="" disabled="disabled">disabled</option>
                          @foreach ($majorTechnologies ?? '' as $majorTechnology)
                              <option value="{{ $majorTechnology->id }}" {{ in_array($majorTechnology->id, old('major_technologies_id') ? : []) ? 'selected' : '' }}>{{ $majorTechnology->major_tech_name }}</option>
                          @endforeach
                        </select>
                        @error('major_technologies_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            {{-- <strong>text assignment</strong> --}}
                        </span>
                        @enderror
                      </div>
                      <div class="col-md-6">
                        <label for="">3.11 วัตถุประสงค์การใช้งาน</label>
                        <select class="form-control custom-select select2 @error('objective_usages_id') is-invalid @enderror" multiple="multiple" data-placeholder="โปรดเลือกรายการ"  name="objective_usages_id[]" id="objective_usages_id" data-value="{{ old('objective_usages_id[]') }}">
                          <option value="" disabled="disabled">disabled</option>
                          @foreach ($objectiveUsages ?? '' as $objectiveUsage)
                              <option value="{{ $objectiveUsage->id }}" {{ in_array($objectiveUsage->id, old('objective_usages_id') ? : []) ? 'selected' : '' }}>{{ $objectiveUsage->obj_usage_name }}</option>
                          @endforeach
                        </select>
                        @error('objective_usages_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            {{-- <strong>text assignment</strong> --}}
                        </span>
                        @enderror
                      </div>
                  
                  </div>
                  {{-- 3.12ขอบเขต / 3.13 / 3.14--}}
                  <div class="row form-group">
                    <div class="col-md-4">
                      <label for="">3.12 ขอบเขตการใช้เครื่องมือ</label>
                      <select class="form-control @error('equipment_usages_id') is-invalid @enderror" name="equipment_usages_id" id="equipment_usages_id"  >
                        <option value="">โปรดเลือกขอบเขตการใช้งานเครื่องมือ</option>
                          @foreach ($equipmentUsages as $equipmentUsage)
                            <option value="{{$equipmentUsage->id}}" {{ old('equipment_usages_id') ==  $equipmentUsage->id ? 'selected' : ''}}> {{$equipmentUsage->equipment_usage_name}} </option>
                          @endforeach
                      </select>
                      @error('equipment_usages_id')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        {{-- <strong>text assignment</strong> --}}
                      </span>
                      @enderror
                    </div>
                    <div class="col-md-4">
                      <label for="">3.13 ความสามารถของเครื่อง/ความละเอียด</label>
                      <input type="text" class=form-control name="equipment_ability" id="equipment_ability" value="{{old('equipment_ability')}}">
                    </div>
                    <div class="col-md-4">
                      <label for="">3.14 ภาพเครื่องมือ</label>
                      <input type="file" class="form-control" name="equipment_pic" id="equipment_pic" value="">
                    </div>
                  </div>
                  {{-- 3.15สอบเทียบ --}}
                  <div class="row form-group">
                    <div class="col-md-2">
                      <label for="">3.15 การสอบเทียบ</label>
                    </div>
                    <div class="col-md-2 custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="equipment_calibrations_id1" name="equipment_calibrations_id" value='1' {{ old('equipment_calibrations_id') == 1 ? 'checked' : ''}}>
                      <label for="equipment_calibrations_id1" class="custom-control-label">ไม่มี</label> 
                    </div>
                    <div class="col-md-2 custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="equipment_calibrations_id2" name="equipment_calibrations_id" value='2' {{ old('equipment_calibrations_id') == 2 ? 'checked' : ''}}>
                      <label for="equipment_calibrations_id2" class="custom-control-label">มี</label> 
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control" name="equipment_calibration_by" id="equipment_calibration_by" value="{{old('equipment_calibration_by')}}" placeholder="ชื่อหน่วยงานสอบเทียบ">
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control" name="equipment_calibration_year" id="equipment_calibration_year" value="{{ old('equipment_calibration_year')}}" placeholder="วัน/เดือน/ปี">
                    </div>
                    
                  </div>
                  {{-- 2.16equipmentMaintenance/2.18equipmentMaintenanceBudget --}}
                  <div class="row form-group">
                    <div class="col-md-6">
                      <label for="">3.16	การตรวจเช็ค/บำรุงรักษาเครื่องมืออุปกรณ์ทางวิทยาศาสตร์</label>
                      <select name="equipment_maintenances_id" id="equipment_maintenances_id" class="form-control @error('equipment_maintenances_id') is-invalid @enderror">
                        <option value="">โปรดเลือกขอบเขตการใช้งานเครื่องมือ</option>
                        @foreach ($equipmentMaintenances as $equipmentMaintenance)
                          <option value="{{$equipmentMaintenance->id}}" {{ old('equipment_maintenances_id') ==  $equipmentMaintenance->id ? 'selected' : ''}} > {{$equipmentMaintenance->equipment_maintenance_name}} </option>
                        @endforeach
                      </select>
                      @error('equipment_maintenances_id')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        {{-- <strong>text assignment</strong> --}}
                      </span>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="">3.17 งบประมาณในการบำรุงรักษา/สอบเทียบ ต่อปี (บาท)</label>
                      <input type="number" class="form-control" name="equipment_maintenance_budget" id="equipment_maintenance_budget" value="{{ old('equipment_maintenance_budget')}}">
                    </div>
                  </div>
                  {{-- 2.19equipmentAdmin --}}
                  <label for="">3.18 ผู้ดูแลเครื่องมือ</label>
                  <div class="row form-group">
                    <div class="col-md-4">
                      ชื่อผู้ดูแล
                      <input type="text" class="form-control @error('equipment_admin_name') is-invalid @enderror" name="equipment_admin_name" id="equipment_admin_name" value="{{ old('equipment_admin_name')}}">
                      @error('equipment_admin_name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        {{-- <strong>text assignment</strong> --}}
                      </span>
                      @enderror
                    </div>
                    <div class="col-md-4">
                      เบอร์โทรศัพท์
                      <input type="text" class="form-control" name="equipment_admin_phone" id="equipment_admin_phone" value="{{ old('equipment_admin_phone')}}">
                    </div>
                    <div class="col-md-4">
                      Email
                      <input type="email" class="form-control" name="equipment_admin_email" id="equipment_admin_email" value="{{ old('equipment_admin_email')}}">
                    </div>
                  </div>
                  {{-- 2.20equipmentManual  --}}
                  <div class="row form-group">
                    <div class="col-md-2">
                      <label for="">3.19 คู่มือการใช้งาน</label>
                    </div>
                    <div class="col-md-1 custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="equipment_manuals_id1" name="equipment_manuals_id" value='1' {{ old('equipment_manuals_id') == 1 ? 'checked' : ''}}>
                      <label for="equipment_manuals_id1" class="custom-control-label">ไม่มี</label> 
                    </div>
                    <div class="col-md-1 custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="equipment_manuals_id2" name="equipment_manuals_id" value='2' {{ old('equipment_manuals_id') == 2 ? 'checked' : ''}}>
                      <label for="equipment_manuals_id2" class="custom-control-label">มี</label> 
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="equipment_manual_name" id="equipment_manual_name" placeholder="ชื่อคู่มือ/รหัสคู่มือ" value="{{ old('equipment_manual_name')}}">
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="equipment_manual_locate" id="equipment_manual_locate" placeholder="สถานที่จัดเก็บ/ลิงก์ดาวน์โหลด" value="{{ old('equipment_manual_locate')}}">
                    </div>
                  </div>
                  {{-- 2.21equipmentRent --}}
                  <div class="row form-group">
                    <div class="col-md-3 ">
                      <label for="">3.20 การให้เช่าใช้เครื่องมือ</label>
                      @error('equipment_rent_id')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        {{-- <strong>text assignment</strong> --}}
                      </span>
                      @enderror
                    </div>
                    <div class="col-md-3 custom-control custom-radio">
                      <input class="custom-control-input @error('equipment_rent_id') is-invalid @enderror" type="radio" id="equipment_rent1" name="equipment_rent_id" value=1 {{ old('equipment_rent_id') == 1 ? 'checked' : ''}}>
                      <label for="equipment_rent1" class="custom-control-label">ไม่ให้บุคคลภายนอกเช่าใช้</label> 
                    </div>
                    <div class="col-md-3 custom-control custom-radio">
                      <input class="custom-control-input @error('equipment_rent_id') is-invalid @enderror" type="radio" id="equipment_rent2" name="equipment_rent_id" value=2 {{ old('equipment_rent_id') == 2 ? 'checked' : ''}}>
                      <label for="equipment_rent2" class="custom-control-label">ให้บุคคลภายนอกเช่าใช้</label> 
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-6">
                      3.20.1 ค่าบริการต่อครั้ง (บาท)
                      <input type="number" class="form-control" name="equipment_rent_fee" id="equipment_rent_fee" value="{{ old('equipment_rent_fee')}}">
                    </div>
                    <div class="col-md-6">
                      3.20.2 เงื่อนไขการขอยืม/ใช้งานเครื่องมือ 
                      <input type="text" class="form-control" name="equipment_rent_detail" id="equipment_rent_detail" value="{{ old('equipment_rent_detail')}}">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                    {{-- a href="/technicalEquipment"  class="btn btn-secondary">ย้อนกลับ</a> --}}
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/components.js') }}"></script>
    <script src="{{ asset('js/form-org.js') }}"></script>
@endsection

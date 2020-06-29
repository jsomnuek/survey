@extends('layouts.admin')

@section('page')
    Equipment Laboratory Edit
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark">เพิ่มข้อมูลเครื่องมือในห้องปฏิบัติการ</h1>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <form action="/equipmentLab/{{$equipmentLabs->id}}" role="form" method="post">
                @csrf
                @method('PUT')
                <div class="card-header bg-primary">
                    <h1 class="card-title">ส่วนที่ 3 เครื่องมือวิทยาศาสตร์ </h1>
                </div>
                <div class="card-body">
                  <div class="row">
                    {{-- 3.1equipmentID--}}
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="">3.1 รหัสเครื่องมือ (AABCC-MNN-RRRSS)</label>
                          <input type="text" name="equipment_lab_id" id="equipment_lab_id" class="form-control @error('equipment_lab_id') is-invalid @enderror" value="{{ $equipmentLabs->equipment_lab_id }}">
                          @error('equipment_lab_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              {{-- <strong>text assignment</strong> --}}
                          </span>
                          @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                    </div>
                    {{-- 3.2equipmentNameEN /3.3equipmentNameTH --}}
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="">3.2 ชื่อเครื่องมือ (ภาษาอังกฤษ)</label>
                          <select class="form-control custom-select select2 @error('science_tool_id') is-invalid @enderror" name="science_tool_id" id="science_tool_id" >
                            <option value="">โปรดเลือกชื่อเครื่องมือ</option>
                            @foreach ($scienceTools as $scienceTool)
                                <option value="{{$scienceTool->id}}" {{ $equipmentLabs->science_tool_id ==  $scienceTool->id ? 'selected' : ''}}> {{$scienceTool->science_tool_abbr}} : {{$scienceTool->science_tool_name}} </option>
                            @endforeach
                          </select>
                          @error('science_tool_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              {{-- <strong>text assignment</strong> --}}
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group d-none" id="display_science_tool_other_name">
                        <label for="">ชื่อเครื่องมือ : </label>
                        <input class="form-control @error('science_tool_other_name') is-invalid @enderror" type="text" name="science_tool_other_name" id="science_tool_other_name" placeholder="หากเลือกอื่นๆ โปรดระบุรายละเอียด" value="{{ $equipmentLabs->science_tool_other_name}}">
                        @error('science_tool_other_name')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group d-none" id="display_science_tool_other_abbr">
                        <label for="">ชื่อย่อเครื่องมือ :</label>
                        <input class="form-control @error('science_tool_other_abbr') is-invalid @enderror" type="text" name="science_tool_other_abbr" id="science_tool_other_abbr" placeholder="เช่น ABR" value="{{ $equipmentLabs->science_tool_other_abbr }}">
                        @error('science_tool_other_abbr')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            {{-- <strong>text assignment</strong> --}}
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">3.3 ชื่อเครื่องมือ (ภาษาไทย)</label>
                        <input type="text" name="equipment_name_th" id="equipment_name_th" class="form-control" value="{{ $equipmentLabs->equipment_name_th}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    {{-- 3.4equipmentBrand /3.5equipmentModel /3.6equipmentOrgCode--}}
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">3.4 ยี่ห้อของเครืองมือ</label>
                        <input type="text" name="equipment_brand" id="equipment_brand" class="form-control" value="{{ $equipmentLabs->equipment_brand }}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">3.5 รุ่นของเครืองมือ</label>
                        <input type="text" class=form-control name="equipment_model" id="equipment_model" value="{{ $equipmentLabs->equipment_model }}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">3.6 รหัสเครื่องมือของหน่วยงาน (ถ้ามี)</label>
                        <input type="text" class=form-control name="equipment_org_code" id="equipment_org_code" value="{{ $equipmentLabs->equipment_org_code }}">
                      </div>
                    </div>
                    {{-- 3.7 3.8 3.9 --}}
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">3.7 ปีที่ซื้อ</label>
                        <input type="number" class=form-control name="equipment_year" id="equipment_year" value="{{ $equipmentLabs->equipment_year }}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">3.8 มูลค่า</label>
                        <input type="number" class=form-control name="equipment_price" id="equipment_price" value="{{ $equipmentLabs->equipment_price }}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">3.9 บริษัทที่จัดจำหน่าย</label>
                        <input type="text" class=form-control name="equipment_supplier" id="equipment_supplier" value="{{ $equipmentLabs->equipment_supplier }}">
                      </div>
                    </div>
                    {{-- 3.10equipmentMajorTech/3.11objective_usages --}}
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="">3.10 สาขาเทคโนโลยีของเครื่องมือ</label>
                          <select class="form-control custom-select select2 @error('major_technology_id') is-invalid @enderror" multiple="multiple" data-placeholder="โปรดเลือกรายการ"  name="major_technology_id[]" id="major_technology_id" data-value="{{ old('major_technology_id[]') }}">
                            @foreach ($majorTechnologies as $majorTechnology)
                                <option value="{{ $majorTechnology->id }}" {{ in_array($majorTechnology->id,  old('major_technology_id') ? : []) ? 'selected' : '' }}>{{ $majorTechnology->major_tech_name }}</option>
                            @endforeach
                          </select>
                          @error('major_technology_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              {{-- <strong>text assignment</strong> --}}
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group d-none" id="display_major_technology_other" >
                        <label for="">อื่นๆ โปรดระบุ  : </label>
                        <input class="form-control" type="text" name="major_technology_other" id="" placeholder="" value="{{ $equipmentLabs->major_technologies_other }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">3.11 วัตถุประสงค์การใช้งาน</label>
                        <select class="form-control custom-select select2 @error('objective_usages_id') is-invalid @enderror" multiple="multiple" data-placeholder="โปรดเลือกรายการ"  name="objective_usages_id[]" id="objective_usages_id" data-value="{{ old('objective_usages_id[]') }}">
                          <option value="" disabled="">disabled</option>
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
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">3.12 ขอบเขตการใช้เครื่องมือ</label>
                        <select class="form-control @error('equipment_usage_id') is-invalid @enderror" name="equipment_usage_id" id="equipment_usage_id"  >
                          {{-- <option value="">โปรดเลือกขอบเขตการใช้งานเครื่องมือ</option> --}}
                            @foreach ($equipmentUsages as $equipmentUsage)
                              <option value="{{$equipmentUsage->id}}" {{ $equipmentLabs->equipment_usage_id ==  $equipmentUsage->id ? 'selected' : ''}}> {{$equipmentUsage->equipment_usage_name}} </option>
                            @endforeach
                        </select>
                        @error('equipment_usage_id')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                          {{-- <strong>text assignment</strong> --}}
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">3.13 ความสามารถของเครื่อง/ความละเอียด</label>
                        <input type="text" class=form-control name="equipment_ability" id="equipment_ability" value="{{ $equipmentLabs->equipment_ability }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">3.14 ภาพเครื่องมือ</label>
                        <input type="file" class="form-control" name="equipment_pic" id="equipment_pic" value="">
                      </div>
                    </div>
                    {{-- 3.15สอบเทียบ --}}
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="row">
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
                          <input type="text" class="form-control" name="equipment_calibration_by" id="equipment_calibration_by" value="{{$equipmentLabs->equipment_calibration_by}}" placeholder="ชื่อหน่วยงานสอบเทียบ">
                        </div>
                        <div class="col-md-3">
                          <input type="text" class="form-control" name="equipment_calibration_year" id="equipment_calibration_year" value="{{ $equipmentLabs->equipment_calibration_year}}" placeholder="วัน/เดือน/ปี">
                        </div>
                        </div>
                      </div>
                    </div>
                    {{-- 3.16equipmentMaintenance/3.17equipmentMaintenanceBudget --}}
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">3.16	การตรวจเช็ค/บำรุงรักษาเครื่องมืออุปกรณ์ทางวิทยาศาสตร์</label>
                        <select name="equipment_maintenance_id" id="equipment_maintenance_id" class="form-control custom-select select2 @error('equipment_maintenance_id') is-invalid @enderror">
                          <option value="">โปรดเลือกขอบเขตการใช้งานเครื่องมือ</option>
                          @foreach ($equipmentMaintenances as $equipmentMaintenance)
                            <option value="{{$equipmentMaintenance->id}}" {{ $equipmentLabs->equipment_maintenance_id ==  $equipmentMaintenance->id ? 'selected' : ''}} > {{$equipmentMaintenance->equipment_maintenance_name}} </option>
                          @endforeach
                        </select>
                        @error('equipment_maintenance_id')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                          {{-- <strong>text assignment</strong> --}}
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group d-none" id="display_equipment_maintenance_other">
                        <label for="">อื่นๆ โปรดระบุ  : </label>
                        <input class="form-control" type="text" name="equipment_maintenance_other" id="equipment_maintenance_other" placeholder="หากเลือกอื่นๆ โปรดระบุรายละเอียด" value="{{  $equipmentLabs->equipment_maintenance_other }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">    
                        <label for="">3.17 งบประมาณในการบำรุงรักษา/สอบเทียบ ต่อปี (บาท)</label>
                        <input type="number" class="form-control" name="equipment_maintenance_budget" id="equipment_maintenance_budget" value="{{  $equipmentLabs->equipment_maintenance_budget }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                      
                      </div>
                    </div>
                    {{-- 3.18equipmentAdmin --}}
                    <div class="col-md-12">
                      <label for="">3.18 ผู้ดูแลเครื่องมือ</label>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        ชื่อผู้ดูแล
                        <input type="text" class="form-control @error('equipment_admin_name') is-invalid @enderror" name="equipment_admin_name" id="equipment_admin_name" value="{{  $equipmentLabs->equipment_admin_name }}">
                        @error('equipment_admin_name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                          {{-- <strong>text assignment</strong> --}}
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        เบอร์โทรศัพท์
                        <input type="text" class="form-control" name="equipment_admin_phone" id="equipment_admin_phone" value="{{  $equipmentLabs->equipment_admin_phone }}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        Email
                        <input type="email" class="form-control" name="equipment_admin_email" id="equipment_admin_email" value="{{ $equipmentLabs->equipment_admin_email }}">
                      </div>
                    </div>
                    {{-- 3.19equipmentManual  --}}
                    <div class="col-md-12">
                      <label for="">3.19 คู่มือการใช้งาน</label>
                    </div>
                    <div class="col-md-12">
                      <div class="row form-group">
                        <div class="col-md-2 custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="equipment_manuals_id1" name="equipment_manuals_id" value='1' {{ old('equipment_manuals_id') == 1 ? 'checked' : ''}}>
                          <label for="equipment_manuals_id1" class="custom-control-label">ไม่มี</label> 
                        </div>
                        <div class="col-md-2 custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="equipment_manuals_id2" name="equipment_manuals_id" value='2' {{ old('equipment_manuals_id') == 2 ? 'checked' : ''}}>
                          <label for="equipment_manuals_id2" class="custom-control-label">มี</label> 
                        </div>
                        <div class="col-md-4">
                          <div class="" id="display_equipment_manual_name">
                          <input type="text" class="form-control" name="equipment_manual_name" id="equipment_manual_name" placeholder="ชื่อคู่มือ/รหัสคู่มือ" value="{{ $equipmentLabs->equipment_manual_name}}">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="" id="display_equipment_manual_locate">
                            <input type="text" class="form-control" name="equipment_manual_locate" id="equipment_manual_locate" placeholder="สถานที่จัดเก็บ/ลิงก์ดาวน์โหลด" value="{{ $equipmentLabs->equipment_manual_locate}}">
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- 2.21equipmentRent --}}
                    <div class="col-md-4">
                      <div class="form-group">
                      <label for="">3.20 การให้เช่าใช้เครื่องมือ</label>
                      @error('equipment_rent_id')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                          {{-- <strong>text assignment</strong> --}}
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-4 custom-control custom-radio">
                      <div class="form-group">
                        <input class="custom-control-input @error('equipment_rent_id') is-invalid @enderror" type="radio" id="equipment_rent1" name="equipment_rent_id" value=1 {{ old('equipment_rent_id') == 1 ? 'checked' : ''}}>
                        <label for="equipment_rent1" class="custom-control-label">ไม่ให้บุคคลภายนอกเช่าใช้</label>
                      </div>
                    </div>
                    <div class="col-md-4 custom-control custom-radio">
                      <div class="form-group">
                        <input class="custom-control-input @error('equipment_rent_id') is-invalid @enderror" type="radio" id="equipment_rent2" name="equipment_rent_id" value=2 {{ old('equipment_rent_id') == 2 ? 'checked' : ''}}>
                        <label for="equipment_rent2" class="custom-control-label">ให้บุคคลภายนอกเช่าใช้</label>
                      </div> 
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        3.20.1 ค่าบริการต่อครั้ง (บาท)
                        <input type="number" class="form-control" name="equipment_rent_fee" id="equipment_rent_fee" value="{{ $equipmentLabs->equipment_rent_fee}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">    
                        3.20.2 เงื่อนไขการขอยืม/ใช้งานเครื่องมือ 
                        <input type="text" class="form-control" name="equipment_rent_detail" id="equipment_rent_detail" value="{{ $equipmentLabs->equipment_rent_detail}}">
                      </div>
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
    <script src="{{ asset('js/form-equipmentLab.js') }}"></script>
    <script type="text/javascript">
      // 3.10
      $('#major_technology_id').val({{ json_encode($majorTechnologyItem) }});
      $('#major_technology_id').trigger('change');
      // 3.11
      $('#objective_usages_id').val({{ json_encode($objectiveUsageItem) }});
      $('#objective_usages_id').trigger('change');
      
      // 3.19
      //$('.equipment_manuals_id').val($equipment_manuals_id);
      //$('.equipment_manuals_id').trigger('onClick');
    </script>
@endsection

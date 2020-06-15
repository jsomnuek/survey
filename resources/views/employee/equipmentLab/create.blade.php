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
                        <select class="form-control" name="equipments_id" id="equipments_id" >
                          <option value="">โปรดเลือกเครื่องมือ</option>
                          @foreach ($equipments as $equipment)
                              <option value="{{$equipment->id}}" {{ old('equipments_id') ==  $equipment->id ? 'selected' : ''}}> {{$equipment->equipment_abbr}} : {{$equipment->equipment_name}} </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="">3.3 ชื่อเครื่องมือ (ภาษาไทย)</label>
                        <input type="text" class="form-control" name="equipmentNameTH" id="equipmentNameTH" required>
                      </div>
                  </div>
                  {{-- 2.4equipmentBrand /2.5equipmentModel /2.6equipmentOrgCode--}}
                  <div class="row form-group">
                    <div class="col-md-4">
                      <label for="">3.4 ยี่ห้อของเครืองมือ</label>
                      <input type="text" name="equipmentBrand" id="equipmentBrand" class="form-control @error('equipmentBrand') is-invalid @enderror">
                      @error('equipmentBrand')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            {{-- <strong>text assignment</strong> --}}
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                      <label for="">3.5 รุ่นของเครืองมือ</label>
                      <input type="text" class=form-control name="equipmentModel" id="equipmentModel">
                    </div>
                    <div class="col-md-4">
                      <label for="">3.6 รหัสเครื่องมือของหน่วยงาน (ถ้ามี)</label>
                      <input type="text" class=form-control name="equipmentOrgCode" id="equipmentOrgCode">
                    </div>
                  </div>
                  {{-- 2.7equipmentMajorTech/2.8equipmentTechnical --}}
                  <div class="row form-group">
                      <div class="col-md-6">
                        <label for="">3.7 สาขาเทคโนโลยีของเครื่องมือ</label>
                        <select class="form-control" name="major_technologies_id" id="major_technologies_id" >
                          <option value="">โปรดเลือกสาขาเทคโนโลยีของเครื่องมือ</option>
                          @foreach ($majorTechnologies as $majorTechnology)
                              <option value="{{$majorTechnology->id}}" {{ old('major_technologies_id') ==  $majorTechnology->id ? 'selected' : ''}}> {{$majorTechnology->major_tech_name}} </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="">3.8 เทคนิคของเครื่องมือ</label>
                        <select class="form-control" name="technical_equipments_id" id="technical_equipments_id" >
                          <option>โปรดเลือกเทคนิคของเครื่องมือ</option>
                            @foreach ($technicalEquipments ?? '' as $technicalEquipment)
                              <option value="{{$technicalEquipment->id}}"> {{$technicalEquipment->technical_equipment_name}} </option>
                            @endforeach
                        </select>
                      </div>
                  </div>
                  {{-- 2.9equipmentYear/2.10equipmentPrice/2.11equipmentSupplier --}}
                  <div class="row form-group">
                      <div class="col-md-4">
                        <label for="">3.9 ปีที่ซื้อ</label>
                        <input type="number" class=form-control name="equipmentYear" id="equipmentYear">
                      </div>
                      <div class="col-md-4">
                        <label for="">3.10 มูลค่า</label>
                        <input type="number" class=form-control name="equipmentPrice" id="equipmentPrice">
                      </div>
                      <div class="col-md-4">
                        <label for="">3.11 บริษัทที่จัดจำหน่าย</label>
                        <input type="text" class=form-control name="equipmentSupplier" id="equipmentSupplier">
                      </div>
                  </div>
                  {{-- 3.12วัตถุประสงค์/3.13ขอบเขต --}}
                  <div class="row form-group">
                    <div class="col-md-6">
                      <label for="">3.12 วัตถุประสงค์การใช้งาน</label>
                      <select class="form-control" name="objective_usages_id" id="objective_usages_id" >
                        <option>โปรดเลือกวัตถุประสงค์การใช้งาน</option>
                          @foreach ($objectiveUsages ?? '' as $objectiveUsage)
                            <option value="{{$objectiveUsage->id}}"> {{$objectiveUsage->obj_usage_name}} </option>
                          @endforeach
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="">3.13 ขอบเขตการใช้เครื่องมือ</label>
                      <select class="form-control" name="equipment_usages_id" id="equipment_usages_id" >
                        <option>โปรดเลือกขอบเขตการใช้งานเครื่องมือ</option>
                          @foreach ($equipmentUsages ?? '' as $equipmentUsage)
                            <option value="{{$equipmentUsage->id}}"> {{$equipmentUsage->equipment_usage_name}} </option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  {{-- 3.14ความละเอียด/3.15รูป --}}
                  <div class="row form-group">
                    <div class="col-md-6">
                      <label for="">3.14 ความสามารถของเครื่อง/ความละเอียด</label>
                      <input type="text" class=form-control name="equipmentAbility" id="equipmentAbility">
                    </div>
                    <div class="col-md-6">
                      <label for="">3.15 ภาพเครื่องมือ</label>
                      <input type="file" class="form-control" name="equipmentPic" id="equipmentPic">
                    </div>
                  </div>
                  {{-- 3.16สอบเทียบ --}}
                  <div class="row form-group">
                    <div class="col-md-2">
                      <label for="">3.16 การสอบเทียบ</label>
                    </div>
                    <div class="col-md-2">
                      <input type="radio" class="" name="equipment_calibrations_id" id="equipment_calibrations_id"> ไม่มี
                    </div>
                    <div class="col-md-2">
                      <input type="radio" class="" name="equipment_calibrations_id" id="equipment_calibrations_id" > มี
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control" name="equipmentCalibrationBy" id="equipmentCalibrationBy" placeholder="ชื่อหน่วยงานสอบเทียบ">
                    </div>
                    <div class="col-md-3">
                      <input type="date" class="form-control" name="equipmentCalibrationYear" id="equipmentCalibrationYear" placeholder="วัน/เดือน/ปี">
                    </div>
                  </div>
                  {{-- 2.17equipmentMaintenance/2.18equipmentMaintenanceBudget --}}
                  <div class="row form-group">
                    <div class="col-md-6">
                      <label for="">3.17	การตรวจเช็ค/บำรุงรักษาเครื่องมืออุปกรณ์ทางวิทยาศาสตร์</label>
                      <select class="form-control" name="equipment_usages_id" id="equipment_usages_id" >
                        <option>โปรดเลือกขอบเขตการใช้งานเครื่องมือ</option>
                          @foreach ($equipmentMaintenances ?? '' as $equipmentMaintenance)
                            <option value="{{$equipmentMaintenance->id}}"> {{$equipmentMaintenance->equipment_maintenance_name}} </option>
                          @endforeach
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="">3.18 งบประมาณในการบำรุงรักษา/สอบเทียบ ต่อปี (บาท)</label>
                      <input type="number" class="form-control" name="equipmentMaintenanceBudget" id="equipmentMaintenanceBudget">
                    </div>
                  </div>
                  {{-- 2.19equipmentAdmin --}}
                  <label for="">3.19 ผู้ดูแลเครื่องมือ</label>
                  <div class="row form-group">
                    <div class="col-md-4">
                      ชื่อผู้ดูแล
                      <input type="text" class="form-control" name="equipmentAdminName" id="equipmentAdminName">
                    </div>
                    <div class="col-md-4">
                      เบอร์โทรศัพท์
                      <input type="text" class="form-control" name="equipmentAdminPhone" id="equipmentAdminPhone">
                    </div>
                    <div class="col-md-4">
                      Email
                      <input type="email" class="form-control" name="equipmentAdminEmail" id="equipmentAdminEmail">
                    </div>
                  </div>
                  {{-- 2.20equipmentManual  --}}
                  <div class="row form-group">
                    <div class="col-md-2">
                      <label for="">3.20 คู่มือการใช้งาน</label>
                    </div>
                    <div class="col-md-1">
                      <input type="radio" class="" name="equipment_manuals_id" id="equipment_manuals_id"> ไม่มี
                    </div>
                    <div class="col-md-1">
                      <input type="radio" class="" name="equipment_manuals_id" id="equipment_manuals_id"> มี
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="equipmentManualName" id="equipmentManualName" placeholder="ชื่อคู่มือ/รหัสคู่มือ">
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="equipmentManualLocate" id="equipmentManualLocate" placeholder="สถานที่จัดเก็บ/ลิงก์ดาวน์โหลด">
                    </div>
                  </div>
                  {{-- 2.21equipmentRent --}}
                  <div class="row form-group">
                    <div class="col-md-3">
                      <label for="">3.21	การให้เช่าใช้เครื่องมือ</label>
                    </div>
                    <div class="col-md-3">
                      <input type="radio" class="" name="equipmentRent" id="equipmentRent"> ไม่ให้บุคคลภายนอกเช่าใช้  
                    </div>
                    <div class="col-md-3">
                      <input type="radio" class="" name="equipmentRent" id="equipmentRent"> ให้บุคคลภายนอกเช่าใช้    
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-6">
                      3.21.1 ค่าบริการต่อครั้ง (บาท)
                      <input type="number" class="form-control" name="equipmentRentFee" id="equipmentRentFee">
                    </div>
                    <div class="col-md-6">
                      3.21.2 เงื่อนไขการขอยืม/ใช้งานเครื่องมือ 
                      <input type="text" class="form-control" name="equipmentRentDetail" id="equipmentRentDetail">
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



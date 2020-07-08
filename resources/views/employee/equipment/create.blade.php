@extends('layouts.admin')

@section('page')
    Create Equipment
@endsection

@section('header-box-1')
    {{-- <h1 class="m-0 text-dark">เพิ่มข้อมูลเครื่องมือในห้องปฏิบัติการ</h1> --}}
@endsection

@section('content')
	<div class="row">
		<!-- column -->
		<div class="col-md-12">
			<!-- general form elements -->
            <div class="card">
				<!-- form start -->
				<form action="/equipments" method="POST" enctype="multipart/form-data" role="form">
					@csrf
					<div class="card-header">
						<h3 class="card-title">ส่วนที่ 3 เครื่องมือวิทยาศาสตร์</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body py-2">
						<div class="row">
							<div class="col-md-12 mb-3">
                                <strong>หมายเหตุ: <span><sup class="text-danger"> * </sup>จำเป็น</span></strong>
                            </div>
							{{-- ./col --}}
							<div class="col-md-12">
                                <div class="form-group">
                                    <label for="lab_id">โปรดเลือกห้องปฏิบัติการ :<span><sup class="text-danger"> *</sup></span></label>
                                    <select class="form-control custom-select select2 @error('lab_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="lab_id" id="lab_id" data-value="{{ old('lab_id') }}" required>
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($labs as $lab)
                                        <option value="{{ $lab->id }}" {{ ( old('lab_id') == $lab->id) ? 'selected' : '' }}>
                                            {{ $lab->lab_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('lab_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
							</div>
							{{-- ./col --}}
							{{-- 3.1 equipment_code --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_code">3.1 รหัสเครื่องมือ (AABCC-MNN-RRRSS) :<span><sup class="text-danger"> *</sup></span></label>
									<input type="text" name="equipment_code" id="equipment_code" class="form-control @error('equipment_code') is-invalid @enderror" value="{{ old('equipment_code') }}" >
									@error('equipment_code')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
										{{-- <strong>text assignment</strong> --}}
									</span>
									@enderror
								</div>
							</div>
							{{-- ./col --}}
							{{-- 3.2 science_tool_id --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="science_tool_id">3.2 ชื่อเครื่องมือ (ภาษาอังกฤษ) :<span><sup class="text-danger"> *</sup></span></label>
									<select class="form-control custom-select select2 @error('science_tool_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="science_tool_id" id="science_tool_id" data-value="{{ old('science_tool_id') }}" >
                                        <option value="" selected disabled="disabled">disabled</option>
                                        @foreach ($scienceTools as $scienceTool)
                                        <option value="{{ $scienceTool->id }}" {{ ( old('science_tool_id') == $scienceTool->id) ? 'selected' : '' }}>
                                            {{ $scienceTool->science_tool_name }} : {{ $scienceTool->science_tool_abbr }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('science_tool_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
							</div>
							{{-- ./col --}}
							<div class="col-md-6">
								<div class="form-group d-none" id="display_science_tool_other_name">
									<label for="science_tool_other_name">ชื่อเครื่องมือ (ภาษาอังกฤษ) :<span><sup class="text-danger"> *</sup></span></label>
									<input class="form-control @error('science_tool_other_name') is-invalid @enderror" type="text" name="science_tool_other_name" id="science_tool_other_name" placeholder="กรณีเลือก Other โปรดระบุรายละเอียด" value="{{ old('science_tool_other_name') }}">
									@error('science_tool_other_name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							{{-- ./col --}}
							<div class="col-md-6">
								<div class="form-group d-none" id="display_science_tool_other_abbr">
									<label for="science_tool_other_abbr">ชื่อย่อเครื่องมือ (ภาษาอังกฤษ) :<span><sup class="text-danger"> *</sup></span></label>
									<input class="form-control @error('science_tool_other_abbr') is-invalid @enderror" type="text" name="science_tool_other_abbr" id="science_tool_other_abbr" placeholder="กรณีเลือก Other โปรดระบุ เช่น ABR" value="{{ old('science_tool_other_abbr') }}">
									@error('science_tool_other_abbr')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							{{-- ./col --}}
							{{-- 3.3 equipment_name_th --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_name_th">3.3 ชื่อเครื่องมือ (ภาษาไทย) :</label>
									<input type="text" name="equipment_name_th" id="equipment_name_th" class="form-control" value="{{ old('equipment_name_th') }}">
								</div>
							</div>
							{{-- ./col --}}
							{{-- 3.4 equipment_brand --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_brand">3.4 ยี่ห้อของเครืองมือ :</label>
									<input type="text" name="equipment_brand" id="equipment_brand" class="form-control" value="{{ old('equipment_brand') }}">
								</div>
							</div>
							{{-- ./col --}}
							{{-- 3.5 equipment_model --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="">3.5 รุ่นของเครืองมือ :</label>
									<input type="text" name="equipment_model" id="equipment_model" class="form-control" value="{{ old('equipment_model') }}">
								</div>
							</div>
							{{-- ./col --}}
							{{-- 3.6 equipment_number --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_number">3.6 รหัสเครื่องมือของหน่วยงาน/รหัสครุภัณฑ์ (ถ้ามี) :</label>
									<input type="text" name="equipment_number" id="equipment_number" class="form-control" value="{{ old('equipment_number') }}">
								</div>							
							</div>
							{{-- ./col --}}
							{{-- 3.7 equipment_year --}}
							<div class="col-md-4">
								<div class="form-group">
									<label for="equipment_year">3.7 ปีที่ซื้อ :</label>
									<input type="text" name="equipment_year" id="equipment_year" class="form-control" min="0" value="{{ old('equipment_year')}}" data-inputmask='"mask": "9999"' data-mask>
								</div>
							</div>
							{{-- ./col --}}
							{{-- 3.8 equipment_price --}}
							<div class="col-md-4">
								<div class="form-group">
									<label for="equipment_price">3.8 มูลค่า (บาท) :</label>
									<input type="number" name="equipment_price" id="equipment_price" class="form-control" min="0" value="{{ old('equipment_price')}}">
								</div>
							</div>
							{{-- ./col --}}
							{{-- 3.9 equipment_supplier --}}
							<div class="col-md-4">
								<div class="form-group">
									<label for="equipment_supplier">3.9 บริษัทที่จัดจำหน่าย :</label>
									<input type="text" name="equipment_supplier" id="equipment_supplier" class="form-control" value="{{ old('equipment_supplier')}}">
								</div>
							</div>
							{{-- ./col --}}
							{{-- 3.10 major_technology_id --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="major_technology_id">3.10 สาขาเทคโนโลยีของเครื่องมือ (เลือกได้มากกว่า 1 คำตอบ) : <span><sup class="text-danger"> *</sup></span></label>
									<select class="form-control custom-select select2-multi @error('major_technology_id') is-invalid @enderror" multiple="multiple" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="major_technology_id[]" id="major_technology_id" data-value="{{ old('major_technology_id[]') }}" >
                                        {{-- <option value="" disabled="disabled">disabled</option> --}}
                                        @foreach ($majorTechnologies as $majorTechnology)
                                        <option value="{{ $majorTechnology->id }}" {{ in_array($majorTechnology->id, old('major_technology_id') ? : []) ? 'selected' : '' }}>{{ $majorTechnology->major_tech_name }}</option>
                                        @endforeach
									</select>
									@error('major_technology_id')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<div class="form-group d-none" id="display_major_technology_other">
									<label for="major_technology_other">กรณีเลือกอื่น ๆ โปรดระบุ :<span><sup class="text-danger"> *</sup></label>
									<input class="form-control" type="text" name="major_technology_other" id="major_technology_other" placeholder="โปรดระบุรายละเอียด">
								</div>
							</div>
							{{-- ./col --}}
							{{-- 3.11 objective_usage_id --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="objective_usage_id">3.11 วัตถุประสงค์การใช้งาน (เลือกได้มากกว่า 1 คำตอบ) :<span><sup class="text-danger"> *</sup></span></label>
									<select class="form-control custom-select select2-multi @error('objective_usage_id') is-invalid @enderror" multiple="multiple" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="objective_usage_id[]" id="objective_usage_id" data-value="{{ old('objective_usage_id[]') }}" >
                                        {{-- <option value="" disabled="disabled">disabled</option> --}}
                                        @foreach ($objectiveUsages ?? '' as $objectiveUsage)
											<option value="{{ $objectiveUsage->id }}" {{ in_array($objectiveUsage->id, old('objective_usage_id') ? : []) ? 'selected' : '' }}>
												{{ $objectiveUsage->obj_usage_name }}
											</option>
										@endforeach
									</select>
									@error('objective_usage_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							{{-- ./col --}}
							{{-- 3.12 equipment_usage_id --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_usage_id">3.12 ขอบเขตการใช้เครื่องมือ :<span><sup class="text-danger"> *</sup></label>
									<select class="form-control custom-select select2 @error('equipment_usage_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="equipment_usage_id" id="equipment_usage_id">
										<option value="" selected disabled="disabled">disabled</option>
										@foreach ($equipmentUsages as $equipmentUsage)
										<option value="{{$equipmentUsage->id}}" {{ old('equipment_usage_id') ==  $equipmentUsage->id ? 'selected' : '' }}>
											{{$equipmentUsage->equipment_usage_name}}
										</option>
										@endforeach
									</select>
									@error('equipment_usage_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror									
								</div>
							</div>
							{{-- ./col --}}
							{{-- 3.13 equipment_ability --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_ability">3.13 ความสามารถของเครื่อง/ความละเอียด :</label>
									<input type="text" class="form-control" name="equipment_ability" id="equipment_ability" value="{{ old('equipment_ability') }}">
								</div>
							</div>
							{{-- ./col --}}
							{{-- 3.13 equipment_image --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_image">3.14 รูปภาพเครื่องมือ (.jpg, .jpeg, .png) :</label>
									<div class="custom-file">
										<input type="file" class="custom-file-input @error('equipment_image') is-invalid @enderror" name="equipment_image" id="equipment_image">
										<label class="custom-file-label" for="equipment_image">
											Choose file...
										</label>                                            
										@error('equipment_image')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>                                   																	
								</div>
							</div>
							{{-- ./col --}}
							{{-- 3.15 equipment_calibration_id --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_calibration_id">3.15 การสอบเทียบ :</label>
									<select class="form-control custom-select select2"  data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="equipment_calibration_id" id="equipment_calibration_id">
										<option value="" selected disabled="disabled">disabled</option>
										<option value="1" {{ old('equipment_calibration_id') ==  1 ? 'selected' : '' }}>ไม่มี</option>
										<option value="2" {{ old('equipment_calibration_id') ==  2 ? 'selected' : '' }}>มี</option>
									</select>
								</div>
								<div class="form-group" id="display_equipment_calibration_by">
									<label for="equipment_calibration_by">กรณีเลือก "มี" โปรดระบุ :<span><sup class="text-danger"> *</sup></label>
									<input class="form-control" type="text" name="equipment_calibration_by" id="equipment_calibration_by" placeholder="ชื่อหน่วยงานสอบเทียบ" value="{{ old('equipment_calibration_by') }}">
								</div>
								<div class="form-group" id="display_equipment_calibration_year">
									<label for="equipment_calibration_by">กรณีเลือก "มี" โปรดระบุ :<span><sup class="text-danger"> *</sup></label>
									<input class="form-control" type="text" name="equipment_calibration_year" id="equipment_calibration_year" placeholder="วัน/เดือน/ปี" value="{{ old('equipment_calibration_year') }}">
								</div>
							</div>
							{{-- ./col --}}
							{{-- 3.16 equipment_maintenance_id --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_maintenance_id">
										3.16 การตรวจเช็ค/บำรุงรักษาเครื่องมืออุปกรณ์ทางวิทยาศาสตร์ :
										<span><sup class="text-danger"> *</sup>
									</label>
									<select class="form-control custom-select select2 @error('equipment_maintenance_id') is-invalid @enderror" data-placeholder="-- โปรดเลือก --" style="width: 100%;" name="equipment_maintenance_id" id="equipment_maintenance_id">
										<option value="" selected disabled="disabled">disabled</option>
										@foreach ($equipmentMaintenances as $item)
										<option value="{{ $item->id }}" {{ old('equipment_maintenance_id') ==  $item->id ? 'selected' : ''}} >
											{{ $item->equipment_maintenance_name }}
										</option>
										@endforeach
									</select>
									@error('equipment_maintenance_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="form-group d-none" id="display_equipment_maintenance_other">
									<label for="">ในกรณีเลือกอื่น ๆ โปรดระบุ :<span><sup class="text-danger"> *</sup></label>
									<input class="form-control" type="text" name="equipment_maintenance_other" id="equipment_maintenance_other" placeholder="" value="{{ old('equipment_maintenance_other') }}">
								</div>
							</div>
							{{-- ./col --}}
							{{-- 3.17 equipment_maintenance_budget --}}
							<div class="col-md-6">
								<div class="form-group">    
									<label for="equipment_maintenance_budget">3.17 งบประมาณในการบำรุงรักษา/สอบเทียบ ต่อปี (บาท) :</label>
									<input type="number" min="0" class="form-control" name="equipment_maintenance_budget" id="equipment_maintenance_budget" value="{{ old('equipment_maintenance_budget') }}">
								</div>
							</div>
							{{-- ./col --}}
							{{-- 3.18 --}}
							<div class="col-md-4">
								<div class="form-group">
									<label for="equipment_admin_name">3.18 ชื่อผู้ดูแลเครื่องมือ :<span><sup class="text-danger"> *</sup></label>
									<input type="text" class="form-control @error('equipment_admin_name') is-invalid @enderror" name="equipment_admin_name" id="equipment_admin_name" value="{{ old('equipment_admin_name') }}">
									@error('equipment_admin_name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							{{-- ./col --}}
							<div class="col-md-4">
								<div class="form-group">
									<label for="equipment_admin_phone">เบอร์โทรศัพท์ :</label>
									<input type="text" class="form-control" name="equipment_admin_phone" id="equipment_admin_phone" value="{{ old('equipment_admin_phone') }}">
								</div>
							</div>
							{{-- ./col --}}
							<div class="col-md-4">
								<div class="form-group">
									<label for="equipment_admin_email">อีเมล :</label>
									<input type="email" class="form-control" name="equipment_admin_email" id="equipment_admin_email" value="{{ old('equipment_admin_email') }}">
								</div>
							</div>
							{{-- ./col --}}
							{{-- 3.19 --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_manual_id">3.19 คู่มือการใช้งาน</label>
									<select class="form-control custom-select select2 @error('equipment_manual_id') is-invalid @enderror"  data-placeholder="-- โปรดเลือก --" style="width: 100%;"  name="equipment_manual_id" id="equipment_manual_id">
										<option value="" selected disabled="disabled">disabled</option>
										<option value="1" {{ old('equipment_manual_id') ==  1 ? 'selected' : ''}}>ไม่มี</option>
										<option value="2" {{ old('equipment_manual_id') ==  2 ? 'selected' : ''}}>มี</option>
									</select>
									@error('equipment_manual_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="form-group" id="display_equipment_manual_name">
									<label for="equipment_manual_name">กรณีเลือก "มี" โปรดระบุ :<span><sup class="text-danger"> *</sup></label>
									<input type="text" class="form-control" name="equipment_manual_name" id="equipment_manual_name" placeholder="ชื่อคู่มือ/รหัสคู่มือ" value="{{ old('equipment_manual_name')}}">
								</div>
								<div class="form-group" id="display_equipment_manual_locate">
									<label for="equipment_manual_location">กรณีเลือก "มี" โปรดระบุ :<span><sup class="text-danger"> *</sup></label>
									<input type="text" class="form-control" name="equipment_manual_location" id="equipment_manual_location" placeholder="สถานที่จัดเก็บ/ลิงก์ดาวน์โหลด" value="{{ old('equipment_manual_location')}}">
								</div>
							</div>
							{{-- ./col --}}
							{{-- 3.20 --}}
							<div class="col-md-6">
								<div class="form-group">
									<label for="equipment_rent_id">3.20 การให้เช่าใช้เครื่องมือ :<span><sup class="text-danger"> *</sup></label>
									<select class="form-control custom-select select2 @error('equipment_rent_id') is-invalid @enderror"  data-placeholder="-- โปรดเลือก --" style="width: 100%;"  name="equipment_rent_id" id="equipment_rent_id">
										<option value="" selected disabled="disabled">disabled</option>
										<option value="1" {{ old('equipment_rent_id') ==  1 ? 'selected' : ''}}>
											ไม่ให้บุคคลภายนอกเช่า
										</option>
										<option value="2" {{ old('equipment_rent_id') ==  2 ? 'selected' : ''}}>
											ให้บุคคลภายนอกเช่าใช้ได้
										</option>
									</select>
									@error('equipment_rent_id')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="form-group" id="display_equipment_rent_fee">
									<label for="equipment_rent_fee">
										3.20.1 ค่าบริการต่อครั้ง (บาท) หากไม่คิดระบุเป็น "0 บาท" :
										<span><sup class="text-danger"> *</sup></label>
										<input type="number" class="form-control" name="equipment_rent_fee" id="equipment_rent_fee" value="{{ old('equipment_rent_fee')}}">
								</div>
								<div class="form-group" id="display_equipment_rent_detail">
									<label for="equipment_rent_detail">
										3.20.2 เงื่อนไขการขอยืม/ใช้งานเครื่องมือ :
										<span><sup class="text-danger"> *</sup>
									</label>
									<input type="text" class="form-control" name="equipment_rent_detail" id="equipment_rent_detail" placeholder="" value="{{ old('equipment_rent_detail')}}">
								</div>
							</div>
							{{-- ./col --}}
						</div>
						<!-- /.row -->
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<div class="d-flex justify-content-between">
							<a href="/equipments" class="btn btn-secondary btn-lg">
                                <i class="fas fa-backward"></i>
                                ย้อนกลับ
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg">
                                บันทึกข้อมูล
                                <i class="fas fa-save"></i>
                            </button>
						</div>
					</div>
					<!-- /.card-footer -->
				</form>
				<!-- form end -->
			</div>
			{{-- ./card --}}
		</div>
		{{-- ./col --}}
	</div>
	{{-- ./row --}}
@endsection

@section('scripts')
    <script src="{{ asset('js/components.js') }}"></script>
    <script src="{{ asset('js/form-equipment.js') }}"></script>
    <script type="text/javascript">
		// 3.10
		// $('#major_technologies_id').val({{ json_encode($majorTechnologies) }});
		// $('#major_technologies_id').trigger('change');
    </script>
@endsection
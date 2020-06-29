@extends('layouts.admin')

@section('page')
    Lab Show
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">        
            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">รายละเอียดทั้งหมด</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 400px;">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th class="" style="width: 35%;">สำหรับองค์กร :</th>
                                <td>{{ $lab->organization->org_name }}</td>
                            </tr>
                            {{-- ./tr สำหรับองค์กร : --}}
                            <tr>
                                <th class="" style="width: 35%;">2.1 ชื่อห้องปฎิบัติการ :</th>
                                <td>{{ $lab->lab_name }}</td>
                            </tr>
                            {{-- ./tr 2.1 ชื่อห้องปฎิบัติการ : --}}
                            <tr>
                                <th class="" style="width: 35%;">2.2 รหัสห้องปฏิบัติการ (AABCC-MNN) :</th>
                                <td>{{ $lab->lab_code }}</td>
                            </tr>
                            {{-- ./tr 2.2 รหัสห้องปฏิบัติการ (AABCC-MNN) : --}}
                            <tr>
                                <th class="" style="width: 35%;">2.3 ที่ตั้งห้องปฏิบัติการ :</th>                                
                                @if (!empty($lab->locationLab))
                                <td>{{ $lab->locationLab->location_name }}</td>
                                @else
                                    
                                @endif
                            </tr>
                            {{-- ./tr 2.3 ที่ตั้งห้องปฏิบัติการ : --}}
                            <tr>
                                <th class="" style="width: 35%;">2.4 ประเภทห้องปฏิบัติการ :</th>                                
                                <td>{{ $lab->laboratoryType->lab_type_name }}</td>
                            </tr>
                            {{-- ./tr 2.4 ประเภทห้องปฏิบัติการ : --}}
                            <tr>
                                <th class="" style="width: 35%;">2.5 ขอบเขตการให้บริการห้องปฏิบัติการ :</th>                                
                                <td>{{ $lab->areaService->area_service_name }}</td>
                            </tr>
                            {{-- ./tr 2.5 ขอบเขตการให้บริการห้องปฏิบัติการ : --}}
                            <tr>
                                <th class="" style="width: 35%;">2.6 จำนวนเจ้าหน้าที่ในห้องปฏิบัติการ (คน) :</th>                                
                                <td>{{ $lab->lab_employee_amount }}</td>
                            </tr>
                            {{-- ./tr 2.6 จำนวนเจ้าหน้าที่ในห้องปฏิบัติการ (คน) :--}}
                            <tr>
                                <th class="" style="width: 35%;">2.7 ระดับการศึกษาของเจ้าหน้าที่ในห้องปฏิบัติการ :</th>
                                <td>
                                    @forelse ($lab->educationLevelLabs as $item)
                                        <div class="row">
                                            <div class="col-sm-3 col-6">
                                                <div class="description-block">
                                                    <strong class="description-percentage ">ประถม (คน) :</strong><hr>
                                                    <span class="description-text text-success">{{ $item->education_primary_amount }}</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-3 col-6">
                                                <div class="description-block">
                                                    <strong class="description-percentage ">มัธยม (คน) :</strong><hr>
                                                    <span class="description-text text-success">{{ $item->education_secondary_amount }}</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-3 col-6">
                                                <div class="description-block">
                                                    <strong class="description-percentage ">ปวช. (คน) :</strong><hr>
                                                    <span class="description-text text-success">{{ $item->education_vocational_amount }}</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-3 col-6">
                                                <div class="description-block">
                                                    <strong class="description-percentage ">ปวส. (คน) :</strong><hr>
                                                    <span class="description-text text-success">{{ $item->education_high_vocational_amount }}</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-3 col-6">
                                                <div class="description-block">
                                                    <strong class="description-percentage ">ปริญญาตรี (คน) :</strong><hr>
                                                    <span class="description-text text-success">{{ $item->education_bachelor_amount }}</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-3 col-6">
                                                <div class="description-block">
                                                    <strong class="description-percentage ">ปริญญาโท (คน) :</strong><hr>
                                                    <span class="description-text text-success">{{ $item->education_master_amount }}</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-3 col-6">
                                                <div class="description-block">
                                                    <strong class="description-percentage ">ปริญญาเอก (คน) :</strong><hr>
                                                    <span class="description-text text-success">{{ $item->education_doctor_amount }}</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-3 col-6">
                                                <div class="description-block">
                                                    <strong class="description-percentage ">อื่นๆ :</strong><hr>
                                                    <span class="description-text text-success">{{ $item->education_other }}</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        {{-- ./row --}}
                                    @empty
                                        
                                    @endforelse
                                </td>
                            </tr>
                            {{-- ./tr 2.7 ระดับการศึกษาของเจ้าหน้าที่ในห้องปฏิบัติการ :--}}
                            <tr>
                                <th class="" style="width: 35%;">2.8 ต้นทุนคงที่ (Fix cost) ของห้องปฏิบัติการต่อปี :</th>                                
                                <td>{{ $lab->fixedCost->fixed_cost_name }}</td>
                            </tr>
                            {{-- ./tr 2.8 ต้นทุนคงที่ (Fix cost) ของห้องปฏิบัติการต่อปี :--}}
                            <tr>
                                <th class="" style="width: 35%;">2.9 รายได้รวมของห้องปฏิบัติการต่อปี :</th>                                
                                <td>{{ $lab->incomePerYear->income_detail }}</td>
                            </tr>
                            {{-- ./tr 2.9 รายได้รวมของห้องปฏิบัติการต่อปี :--}}
                            <tr>
                                <th class="" colspan="2" style="">2.10 ข้อมูลการพัฒนาห้องปฏิบัติการ :</th>                                
                                <td>{{ __('') }}</td>
                            </tr>
                            <tr>
                                <th class="pl-5" colspan="2" style="">2.10.1 เจ้าหน้าที่ได้รับการฝึกอบรมเพื่อการพัฒนาห้องปฏิบัติการหรือไม่อย่างไร :</th>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 35%;">- ISO/IEC17025</th>                                
                                <td></td>
                            </tr>
                            
                            {{-- ./tr 2.10 ข้อมูลการพัฒนาห้องปฏิบัติการ :--}}
                        </tbody>
                        {{-- ./tbody --}}
                    </table>
                    {{-- ./table --}}
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="/labs/{{ $lab->id }}/edit" class="btn btn-secondary btn-lg">
                            <i class="fas fa-edit"></i>
                            แก้ไขข้อมูล
                        </a>
                        <a href="/labs" class="btn btn-success btn-lg">
                            <i class="fas fa-save"></i>
                            ยืนยันข้อมูล
                        </a>
                    </div>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->        
    </div>
    <!-- /.row -->
@endsection
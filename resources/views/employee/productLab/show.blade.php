@extends('layouts.admin')

@section('page')
    Show Product Lab 
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-file-alt"></i> รายละเอียด</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <tbody>
                                <tr>
                                    <th class="" style="width: 35%;">Ref.รหัสเอกสาร : {{ $productLab->id }}</th>
                                    <td>                                        
                                        <mark>ปรับปรุงข้อมูลล่าสุด</mark> : <i class="far fa-clock"></i> {{ $productLab->updated_at }}
                                        <strong>|</strong>
                                        <mark>สถานะ</mark> :
                                        @switch($productLab->lab->survey_status_id)
											@case(1)
												<small class="badge badge-secondary">
													{{ $productLab->lab->surveyStatus->survey_status_name_th }}
												</small>
												@break
											@case(2)
												<small class="badge badge-primary">
													{{ $productLab->lab->surveyStatus->survey_status_name_th }}
												</small>
												@break
											@case(3)
												<small class="badge badge-info">
													{{ $productLab->lab->surveyStatus->survey_status_name_th }}
												</small>
												@break
											@case(4)
												<small class="badge badge-success">
													{{ $productLab->lab->surveyStatus->survey_status_name_th }}
												</small>
												@break
											@case(5)
												<small class="badge badge-warning">
													{{ $productLab->lab->surveyStatus->survey_status_name_th }}
												</small>
												@break
											@default
										@endswitch
                                    </td>
                                </tr>
                                {{-- Ref.รหัสเอกสาร --}}
                                <tr>
                                    <th class="" style="width: 35%;">ห้องปฏิบัติการ :</th>
                                    <td>{{ $productLab->lab->lab_name }} | {{ $productLab->lab->lab_code }}</td>
                                </tr>
                                {{-- ห้องปฏิบัติการ --}}
                                <tr>
                                    <th class="" style="width: 35%;">4.1 ชื่อผลิตภัณฑ์ที่วิจัย/ทดสอบ/สอบเทียบ :</th>
                                    <td>{{ $productLab->product_lab_name }}</td>
                                </tr>
                                {{-- 4.1 ชื่อผลิตภัณฑ์ที่วิจัย/ทดสอบ/สอบเทียบ : --}}
                                <tr>
                                    <th class="" style="width: 35%;">4.2 ประเภทผลิตภัณฑ์ :</th>
                                    <td>
                                        @foreach ($productLab->productTypes as $item)
                                            @if ($item->id != 39)
                                            <li>{{ $item->product_type_name }}</li>                                                
                                            @endif
                                        @endforeach
                                        @if ($productLab->product_type_other != null)
                                            <li>{{ $productLab->product_type_other }}</li>
                                        @endif
                                    </td>
                                </tr>
                                {{-- 4.2 ประเภทผลิตภัณฑ์ : --}}
                                <tr>
                                    <th class="" style="width: 35%;">4.3 มาตราฐานผลิตภัณฑ์ :</th>
                                    <td>{{ $productLab->product_lab_standard }}</td>
                                </tr>
                                {{-- 4.3 มาตราฐานผลิตภัณฑ์ : --}}
                                <tr>
                                    <th class="" style="width: 35%;">4.4 ชื่อรายการวิจัย/ทดสอบ/สอบเทียบ :</th>
                                    <td>{{ $productLab->product_lab_test_name }}</td>
                                </tr>
                                {{-- 4.4 ชื่อรายการวิจัย/ทดสอบ/สอบเทียบ : --}}
                                <tr>
                                    <th class="" style="width: 35%;">4.5 เครื่องมือที่ใช้วิจัย/ทดสอบ/สอบเทียบ :</th>
                                    <td>
                                        @foreach ($productLab->equipments as $item)
                                            <li>{{ $item->equipment_code }} : {{ $item->scienceTool->science_tool_name }}</li>
                                        @endforeach
                                    </td>
                                </tr>
                                {{-- 4.5 เครื่องมือที่ใช้วิจัย/ทดสอบ/สอบเทียบ : --}}
                                <tr>
                                    <th class="" style="width: 35%;">4.6 ประเภทรายการวิจัย/ทดสอบ/สอบเทียบ :</th>
                                    <td>{{ $productLab->testingCalibratingList->testing_list_name }}</td>
                                </tr>
                                {{-- 4.6 ประเภทรายการวิจัย/ทดสอบ/สอบเทียบ : --}}
                                <tr>
                                    <th class="" style="width: 35%;">4.7 ประเภทการวิจัย/ทดสอบ/สอบเทียบ :</th>
                                    <td>
                                        @if ($productLab->testingCalibratingType->id != 6)
                                            {{ $productLab->testingCalibratingType->testing_calibrating_type_name }}
                                        @else
                                            {{ $productLab->testing_calibrating_type_other }}
                                        @endif
                                    </td>
                                </tr>
                                {{-- 4.7 ประเภทการวิจัย/ทดสอบ/สอบเทียบ : --}}
                                <tr>
                                    <th class="" style="width: 35%;">4.8 วิธีวิจัย/ทดสอบ/สอบเทียบตามมาตรฐาน :</th>
                                    <td>
                                        {{ $productLab->testingCalibratingMethod->testing_method_name }} : 
                                        {{ $productLab->testing_calibrating_method_detail }}
                                    </td>
                                </tr>
                                {{-- 4.8 วิธีวิจัย/ทดสอบ/สอบเทียบตามมาตรฐาน : --}}
                                <tr>
                                    <th class="" style="width: 35%;">4.9 ช่วงความสามารถของการวัด :</th>
                                    <td>{{ $productLab->product_lab_test_unit }}</td>
                                </tr>
                                {{-- 4.9 ช่วงความสามารถของการวัด : --}}
                                <tr>
                                    <th class="" style="width: 35%;">4.10 ระยะเวลาการวิจัย/ทดสอบ/สอบเทียบ <br>(วัน โดย 1 วัน = 8 ชั่วโมง) :</th>
                                    <td>{{ $productLab->product_lab_test_duration }}</td>
                                </tr>
                                {{-- 4.10 ระยะเวลาการวิจัย/ทดสอบ/สอบเทียบ (วัน โดย 1 วัน = 8 ชั่วโมง) : --}}
                                <tr>
                                    <th class="" style="width: 35%;">4.11 ค่าธรรมเนียมการวิจัย/ทดสอบ/สอบเทียบ (บาท) :</th>
                                    <td>{{ number_format($productLab->product_lab_test_fee) }}</td>
                                </tr>
                                {{-- 4.11 ค่าธรรมเนียมการวิจัย/ทดสอบ/สอบเทียบ (บาท) : --}}
                                <tr>
                                    <th class="" style="width: 35%;">4.12 วัสดุอ้างอิงที่ใช้ :</th>
                                    <td>{{ $productLab->product_lab_material_ref }}</td>
                                </tr>
                                {{-- 4.12 วัสดุอ้างอิงที่ใช้ : --}}
                                <tr>
                                    <th class="" style="width: 35%;">4.13 แหล่งที่มาของวัสดุอ้างอิง :</th>
                                    <td>{{ $productLab->product_lab_material_ref_from }}</td>
                                </tr>
                                {{-- 4.13 แหล่งที่มาของวัสดุอ้างอิง : --}}
                                <tr>
                                    <th class="" style="width: 35%;">4.14 การควบคุมคุณภาพผลการทดสอบภายใน :</th>
                                    <td>
                                        @foreach ($productLab->resultControls as $item)
                                            @if ($item->id != 7)
                                            <li>{{ $item->result_control_name }}</li>                                                
                                            @endif
                                        @endforeach
                                        @if ($productLab->result_control_other != null)
                                            <li>{{ $productLab->result_control_other }}</li>
                                        @endif
                                    </td>
                                </tr>
                                {{-- 4.14 การควบคุมคุณภาพผลการทดสอบภายใน : --}}
                                <tr>
                                    <th class="" style="width: 35%;">4.15 การทดสอบความสามารถห้องปฏิบัติการ (Proficiency Testing, PT) :</th>
                                    <td>
                                        @if ($productLab->proficiency_testing_id == 1)
                                            ไม่มี
                                        @else
                                            <mark>ชื่อผู้จัด</mark> : {{ $productLab->proficiency_testing_by }}<br>
                                            <mark>ปีที่เข้าร่วม</mark> : {{ $productLab->proficiency_testing_year }}
                                        @endif
                                    </td>
                                </tr>
                                {{-- 4.15 การทดสอบความสามารถห้องปฏิบัติการ (Proficiency Testing, PT) : --}}
                                <tr>
                                    <th class="" style="width: 35%;">4.16 การรับรองความสามารถห้องปฏิบัติการ :</th>
                                    <td>{{ $productLab->certifyLaboratory->cert_lab_name }}</td>
                                </tr>
                                {{-- 4.16 การรับรองความสามารถห้องปฏิบัติการ : --}}
                            </tbody>
                        </table>
                    </div>
                    {{-- /.table-responsive --}}
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    @if (!Auth::guest())                            
                        @if (Auth::user()->id == $productLab->user_id)
                            <a href="/productlab" class="btn btn-secondary btn-sm">
                                <i class="fas fa-undo"></i> ย้อนกลับ
                            </a>
                            @switch($productLab->lab->survey_status_id)
                                @case(1)
                                    <a href="/productlab/{{ $productLab->id }}/edit" class="btn btn-info btn-sm">
                                        <i class="fas fa-user-edit"></i> แก้ไขข้อมูล
                                    </a>
                                    @break
                                @case(3)
                                    <a href="/productlab/{{ $productLab->id }}/edit" class="btn btn-info btn-sm">
                                        <i class="fas fa-user-edit"></i> แก้ไขข้อมูล
                                    </a>
                                    @break
                                @case(5)
                                    <a href="/productlab/{{ $productLab->id }}/edit" class="btn btn-info btn-sm">
                                        <i class="fas fa-user-edit"></i> แก้ไขข้อมูล
                                    </a>
                                    @break
                                @default
                            @endswitch
                        @endif
                    @endif
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->        
    </div>
    <!-- /.row -->
@endsection
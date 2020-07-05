@extends('layouts.admin')

@section('page')
    Show ProductLab
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
                <div class="card-header bg-primary">
                    <h3 class="card-title">รายละเอียดรายการทดสอบ/สอบเทียบ</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0" style="height: 400px;">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th class="" style="width: 30%;">4.1 ชื่อผลิตภัณฑ์ที่ทดสอบ/สอบเทียบ :</th>
                                <td>{{ $productLabs->product_lab_name }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.2 ประเภทผลิตภัณฑ์</th>
                                <td>
                                    @forelse ($productLabs->productTypes as $item )
                                        @if ($item->id !=1)
                                            <li>{{ $item->product_type_name }} </li>
                                        @else
                                            
                                        @endif
                                        
                                    @empty
                                    
                                    @endforelse

                                    @if ($productLabs->product_type_other != null)
                                        <li>อื่นๆ {{ $productLabs->product_type_other }}</li>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.3 มาตราฐานผลิตภัณฑ์ :</th>
                                <td>{{ $productLabs->product_lab_standard }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.4 ชื่อรายการทดสอบ/สอบเทียบ :</th>
                                <td>{{ $productLabs->product_lab_test_name }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.5 เครื่องมือที่ใช้ทดสอบ/สอบเทียบ :</th>
                                <td>
                                    @forelse ($productLabs->equipments as $item )
                                            <li>{{ $item->equipment_code }} </li>
                                    @empty
                                    
                                    @endforelse

                                    {{-- @if ($productLabs->product_type_other != null)
                                        <li>อื่นๆ {{ $productLabs->product_type_other }}</li>
                                    @endif
                                </td>
                                <td>ยังไม่สมบูรณ์----{{ $productLabs->product_lab_test_name }}</td> --}}
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.6 ประเภทรายการทดสอบ/สอบเทียบ :</th>
                                <td>{{ $productLabs->testingCalibratingList->testing_list_name }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.7 ประเภทการทดสอบ/สอบเทียบ :</th>
                                @if ($productLabs->testingCalibratingType->id != 5)
                                    <td>{{ $productLabs->testingCalibratingType->testing_calibrating_type_name }}</td>   
                                @else
                                    <td>อื่นๆ {{ $productLabs->testing_calibrating_type_other }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.8 วิธีทดสอบ/สอบเทียบตามมาตราฐาน :</th>
                                <td>{{ $productLabs->testingCalibratingMethod->testing_method_name }} รายละเอียด : {{$productLabs->testing_calibrating_method_detail}}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.9 ช่วงความสามารถของการวัด :</th>
                                <td>{{ $productLabs->product_lab_test_unit }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.10 ระยะเวลาการทดสอบ :</th>
                                <td>{{ $productLabs->product_lab_test_duration }} วัน</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.11 ค่าธรรมเนียมในการทดสอบ :</th>
                                <td>{{ number_format($productLabs->product_lab_test_fee) }} บาท</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.12 วัสดุอ้างอิงที่ใช้ทดสอบ :</th>
                                <td>{{ $productLabs->product_lab_material_ref }} </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.13 ที่มาของแหล่งวัสดุอ้างอิงที่ใช้ทดสอบ :</th>
                                <td>{{ $productLabs->product_lab_material_ref_from }} </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.14 การควบคุมคุณภาพผลการทดสอบภายใน :</th>
                                <td>
                                    @forelse ($productLabs->resultControls as $item)
                                    @if ($item->id !=1)
                                        <li>{{ $item->result_control_name }}</li>
                                    @else
                                        
                                    @endif
                                    
                                @empty
                                
                                @endforelse
                                @if ($productLabs->product_lab_result_control_other != null)
                                    <li>อื่นๆ {{ $productLabs->product_lab_result_control_other }}</li>
                                @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.15 การทดสอบความชำนาญห้องปฏิบัติการ :</th>
                                <td>
                                    @if ($productLabs->proficiency_testing == 1 )
                                        ยังไม่ได้ทดสอบความชำนาญห้องปฎิบัติการ
                                    @else
                                        มีการทดสอบความชำนาญห้องปฏิบัติการ  โดย{{ $productLabs->proficiency_testing_by }} เมื่อปี {{ $productLabs->proficiency_testing_year }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.16 การรับรองความสามารถห้องปฏิบัติการ :</th>
                                <td>{{ $productLabs->certifyLaboratory->cert_lab_name }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="/productLab/{{ $productLabs->id }}/edit" class="btn btn-secondary btn-lg">
                            <i class="fas fa-edit"></i>
                            แก้ไขข้อมูล
                        </a>
                        <a href="/productLab" class="btn btn-success btn-lg">
                            <i class="fas fa-save"></i>
                            ยืนยันข้อมูล
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection
@extends('layouts.admin')

@section('page')
    Show Equipment Lab Details
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
                                <th class="" style="width: 30%;">3.1 รหัสเครื่องมือ (AABCC-MNN-RRRSS) :</th>
                                <td>{{ $equipmentLabs->equipment_lab_id }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.2 ชื่อเครื่องมือ (ภาษาอังกฤษ)</th>
                                @if ($equipmentLabs->scienceTool->id != 1)
                                    <td>{{ $equipmentLabs->scienceTool->science_tool_name }}</td>   
                                @else
                                    <td>อื่นๆ {{ $equipmentLabs->science_tool_other_name }} : {{ $equipmentLabs->science_tool_other_abbr }} </td>
                                @endif
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.3 ชื่อเครื่องมือ (ภาษาไทย) :</th>
                                <td>{{ $equipmentLabs->equipment_name_th }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.4 ยี่ห้อเครื่องมือ :</th>
                                <td>{{ $equipmentLabs->equipment_brand }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.5 รุ่นของเครื่องมือ :</th>
                                <td>{{ $equipmentLabs->equipment_model }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.6 รหัสเครื่องมือของหน่วยงาน :</th>
                                <td>{{ $equipmentLabs->equipment_org_code }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.7 ปีที่ซื้อเครื่องมือ :</th>
                                <td>{{ $equipmentLabs->equipment_year }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.8 มูลค่าเครื่องมือ :</th>
                                <td>{{ number_format($equipmentLabs->equipment_price) }} บาท</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.9 บริษัทที่จำหน่าย :</th>
                                <td>{{ $equipmentLabs->equipment_supplier }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.10 สาขาเทคโนโลยี :</th>
                                <td>
                                    @foreach ($equipmentLabs->majorTechnologies as $item)
                                        @if ($item->id !=1)
                                        <li>{{ $item->major_tech_name }}</li>
                                        @else
                                            
                                        @endif
                                    @endforeach

                                @if ($equipmentLabs->major_technologies_other != null)
                                    <li>อื่นๆ -->{{ $equipmentLabs->major_technologies_other }}</li>
                                @else
                                    
                                @endif
                                
                                </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.11 วัตถุประสงค์การใช้งาน :</th>
                                <td>
                                    @forelse ($equipmentLabs->objectiveUsages as $item)
                                        <li>{{ $item->obj_usage_name }}</li>
                                    @empty

                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.12 ขอบเขตการใช้เครื่องมือ :</th>
                                <td> {{$equipmentLabs->equipmentUsage->equipment_usage_name}} </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.13 ความสามารถของเครื่อง/ความละเอียด :</th>
                                <td>{{ $equipmentLabs->equipment_ability }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.14 รูปภาพเครื่องมือ :</th>
                                <td>
                                    <img class="img-fluid" src="{{ asset('images/'. $equipmentLabs->equipment_pic)}}" height="100px" width="100px" />
                                </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.15 การสอบเทียบ :</th>
                                <td> 
                                    @if ($equipmentLabs->equipment_calibrations_id == 1)
                                        ไม่มีการสอบเทียบเครื่องมือ
                                    @else
                                        มีการสอบเทียบเครื่องมือ โดย{{$equipmentLabs->equipment_calibration_by}} เมื่อปี {{$equipmentLabs->equipment_calibration_year}} 
                                    @endif 
                                </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.16 การตรวจเช็ค/บำรุงรักษาเครื่องมือ :</th>
                                <td> 
                                    @if ($equipmentLabs->equipment_maintenance_id == 1)
                                        {{$equipmentLabs->equipment_maintenance_other}} 
                                    @else
                                        {{$equipmentLabs->equipmentMaintenance->equipment_maintenance_name}} 
                                    @endif
                                    
                                </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.17 งบประมาณในการบำรุงรักษา/สอบเทียบ :</th>
                                <td>{{ number_format($equipmentLabs->equipment_maintenance_budget) }} บาท</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.18 ผู้ดูแลเครื่องมือ</th>
                                
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">ชื่อ :</th>
                                <td>{{ $equipmentLabs->equipment_admin_name }} </td>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">หมายเลขโทรศัพท์ :</th>
                                <td>{{ $equipmentLabs->equipment_admin_phone }} </td>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">อีเมล :</th>
                                <td>{{ $equipmentLabs->equipment_admin_email }} </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.19 คู่มือการใช้งาน :</th>
                                <td> 
                                    @if ($equipmentLabs->equipment_manuals_id == 1)
                                        ไม่มีคู่มือการใข้งาน
                                    @else
                                        มีคู่มือการใช้งาน ชื่อ/รหัส : {{$equipmentLabs->equipment_manual_name}} ที่จัดเก็บ : {{$equipmentLabs->equipment_manual_locate}} 
                                    @endif 
                                </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.20 การให้เช่าใช้เครื่องมือ :</th>
                                <td> 
                                    @if ($equipmentLabs->equipment_rent_id == 1)
                                        ไม่ให้บุคคลภายนอกเช่าใช้
                                    @else
                                        บุคคลภายนอกสามารถเช่าใช้ได้ ค่าบริการครั้งละ {{ number_format($equipmentLabs->equipment_rent_fee) }} บาท โดยมีเงื่อนไข : {{$equipmentLabs->equipment_rent_detail}} 
                                    @endif 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- card footer --}}
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="/equipmentLab/{{ $equipmentLabs->id }}/edit" class="btn btn-secondary btn-lg">
                            <i class="fas fa-edit"></i>
                            แก้ไขข้อมูล
                        </a>
                        <a href="/equipmentLab" class="btn btn-success btn-lg">
                            <i class="fas fa-save"></i>
                            ยืนยันข้อมูล
                        </a>
                    </div>
                </div>
                {{-- /.card footer --}}

            </div>
            <!-- /.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection
@extends('layouts.admin')

@section('page')
    Show Equipment
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
    <div class="row">
        <!-- column -->
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
                                    <th class="" style="width: 35%;">Ref.รหัสเอกสาร : {{ $equipment->id }}</th>
                                    <td>
                                        <mark>Create</mark> : <i class="far fa-clock"></i> {{ $equipment->created_at }}
                                        <strong>|</strong> 
                                        <mark>Update</mark> : <i class="far fa-clock"></i> {{ $equipment->updated_at }}
                                        <strong>|</strong>
                                        <mark>สถานะ</mark> :
                                        @if ($equipment->completed == 0)
                                        <small class="badge badge-secondary">บันทึกข้อมูล</small>                                            
										@else
										<small class="badge badge-primary">ส่งข้อมูล</small>
                                        @endif
                                    </td>
                                </tr>
                                {{-- Ref.รหัสเอกสาร --}}
                                <tr>
                                    <th class="" style="width: 35%;">ห้องปฏิบัติการ :</th>
                                    <td>{{ $equipment->lab->lab_name }} | {{ $equipment->lab->lab_code }}</td>
                                </tr>
                                {{-- ห้องปฏิบัติการ --}}
                                <tr>
                                    <th class="" style="width: 35%;">3.1 รหัสเครื่องมือ (AABCC-MNN-RRRSS) :</th>
                                    <td>{{ $equipment->equipment_code }}</td>
                                </tr>
                                {{-- 3.1 รหัสเครื่องมือ --}}
                                <tr>
                                    <th class="" style="width: 35%;">3.2 ชื่อเครื่องมือ (ภาษาอังกฤษ)</th>
                                    @if (!empty($equipment->scienceTool->id))
                                        <td>{{ $equipment->scienceTool->science_tool_name }}</td>   
                                    @else
                                        <td>{{ $equipment->science_tool_other_name }} : {{ $equipment->science_tool_other_abbr }} </td>
                                    @endif
                                </tr>
                                {{-- 3.2 ชื่อเครื่องมือ --}}
                                <tr>
                                    <th class="" style="width: 35%;">3.3 ชื่อเครื่องมือ (ภาษาไทย) :</th>
                                    <td>{{ $equipment->equipment_name_th }}</td>
                                </tr>
                                {{-- 3.3 ชื่อเครื่องมือ (ภาษาไทย) --}}
                                <tr>
                                    <th class="" style="width: 35%;">3.4 ยี่ห้อเครื่องมือ :</th>
                                    <td>{{ $equipment->equipment_brand }}</td>
                                </tr>
                                {{-- 3.4 ยี่ห้อเครื่องมือ --}}
                                <tr>
                                    <th class="" style="width: 35%;">3.5 รุ่นของเครื่องมือ :</th>
                                    <td>{{ $equipment->equipment_model }}</td>
                                </tr>
                                {{-- 3.5 รุ่นของเครื่องมือ --}}
                                <tr>
                                    <th class="" style="width: 35%;">3.6 รหัสเครื่องมือของหน่วยงาน :</th>
                                    <td>{{ $equipment->equipment_number }}</td>
                                </tr>
                                {{-- 3.6 รหัสเครื่องมือของหน่วยงาน --}}
                                <tr>
                                    <th class="" style="width: 35%;">3.7 ปีที่ซื้อเครื่องมือ :</th>
                                    <td>{{ $equipment->equipment_year }}</td>
                                </tr>
                                {{-- 3.7 ปีที่ซื้อเครื่องมือ --}}
                                <tr>
                                    <th class="" style="width: 35%;">3.8 มูลค่าเครื่องมือ (บาท) :</th>
                                    <td>{{ number_format($equipment->equipment_price) }}</td>
                                </tr>
                                {{-- 3.8 มูลค่าเครื่องมือ --}}
                                <tr>
                                    <th class="" style="width: 35%;">3.9 บริษัทที่จำหน่าย :</th>
                                    <td>{{ $equipment->equipment_supplier }}</td>
                                </tr>
                                {{-- 3.9 บริษัทที่จำหน่าย --}}
                                <tr>
                                    <th class="" style="width: 35%;">3.10 สาขาเทคโนโลยี :</th>
                                    <td>
                                        @foreach ($equipment->majorTechnologies as $item)
                                        <li>{{ $item->major_tech_name }}</li>
                                        @endforeach
                                        <ul>
                                            @if (!empty($equipment->major_technology_other))
                                            <li>{{ $equipment->major_technology_other }}</li>
                                            @else
                                                
                                            @endif
                                        </ul>               
                                    </td>
                                </tr>
                                {{-- 3.10 สาขาเทคโนโลยี --}}
                                <tr>
                                    <th class="" style="width: 35%;">3.11 วัตถุประสงค์การใช้งาน :</th>
                                    <td>
                                        @forelse ($equipment->objectiveUsages as $item)
                                        <li>{{ $item->obj_usage_name }}</li>
                                        @empty
    
                                        @endforelse
                                    </td>
                                </tr>
                                {{-- 3.11 วัตถุประสงค์การใช้งาน --}}
                                <tr>
                                    <th class="" style="width: 35%;">3.12 ขอบเขตการใช้เครื่องมือ :</th>
                                    <td> {{$equipment->equipmentUsage->equipment_usage_name}} </td>
                                </tr>
                                {{-- 3.12 ขอบเขตการใช้เครื่องมือ --}}
                                <tr>
                                    <th class="" style="width: 35%;">3.13 ความสามารถของเครื่อง/ความละเอียด :</th>
                                    <td>{{ $equipment->equipment_ability }}</td>
                                </tr>
                                {{-- 3.13 ความสามารถของเครื่อง/ความละเอียด --}}
                                <tr>
                                    <th class="" style="width: 35%;">3.14 รูปภาพเครื่องมือ :</th>
                                    <td>
                                        @if (!empty($equipment->equipment_image))
                                        <img class="img-fluid rounded" src="{{ asset("storage/equipment_image/$equipment->equipment_image") }}" alt="Photo">
                                        @else
                                        <img class="img-fluid rounded" src="{{ asset('storage/equipment_image/noimage.jpg') }}" alt="Photo">
                                        @endif
                                        
                                    </td>
                                </tr>
                                {{-- 3.14 รูปภาพเครื่องมือ --}}
                                <tr>
                                    <th class="" style="width: 35%;">3.15 การสอบเทียบ :</th>
                                    <td> 
                                        @if ($equipment->equipment_calibration_id == 1)
                                        ไม่มี
                                        @else
                                        <strong>ชื่อหน่วยงานสอบเทียบ : </strong>{{ $equipment->equipment_calibration_by }}
                                        <br>
                                        <strong>วัน เดือน ปี : </strong>{{$equipment->equipment_calibration_year}}
                                        @endif 
                                    </td>
                                </tr>
                                {{-- 3.15 การสอบเทียบ --}}
                                <tr>
                                    <th class="" style="width: 35%;">3.16 การตรวจเช็ค/บำรุงรักษาเครื่องมือ :</th>
                                    <td> 
                                        @if ($equipment->equipment_maintenance_id == 6)
                                        {{ $equipment->equipment_maintenance_other }} 
                                        @else
                                        {{ $equipment->equipmentMaintenance->equipment_maintenance_name }}
                                        @endif
                                        
                                    </td>
                                </tr>
                                {{-- 3.16 การตรวจเช็ค/บำรุงรักษาเครื่องมือ --}}
                                <tr>
                                    <th class="" style="width: 35%;">3.17 งบประมาณในการบำรุงรักษา/สอบเทียบ (บาท) :</th>
                                    <td>{{ number_format($equipment->equipment_maintenance_budget) }}</td>
                                </tr>
                                {{-- 3.17 งบประมาณในการบำรุงรักษา/สอบเทียบ --}}
                                <tr>
                                    <th class="" style="" colspan="2">3.18 ผู้ดูแลเครื่องมือ</th>                                
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 35%;">ชื่อ :</th>
                                    <td>{{ $equipment->equipment_admin_name }} </td>
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 35%;">หมายเลขโทรศัพท์ :</th>
                                    <td>{{ $equipment->equipment_admin_phone }} </td>
                                </tr>
                                <tr>
                                    <th class="pl-5" style="width: 35%;">อีเมล :</th>
                                    <td>{{ $equipment->equipment_admin_email }} </td>
                                </tr>
                                {{-- 3.18 ผู้ดูแลเครื่องมือ --}}
                                <tr>
                                    <th class="" style="width: 35%;">3.19 คู่มือการใช้งาน :</th>
                                    <td> 
                                        @if ($equipment->equipment_manual_id == 1)
                                        ไม่มี
                                        @else
                                        <mark>ชื่อคู่มือ/รหัสคู่มือ</mark> : {{ $equipment->equipment_manual_name }}
                                        <hr>
                                        <mark>สถานที่เก็บ/ลิงค์ดาวน์โหลด</mark> : {{ $equipment->equipment_manual_location }} 
                                        @endif 
                                    </td>
                                </tr>
                                {{-- 3.19 คู่มือการใช้งาน --}}
                                <tr>
                                    <th class="" style="width: 35%;">3.20 การให้เช่าใช้เครื่องมือ :</th>
                                    <td> 
                                        @if ($equipment->equipment_rent_id == 1)
                                            ไม่ให้บุคคลภายนอกเช่าใช้
                                        @else
                                            <strong>ค่าบริการต่อครั้ง (บาท) : </strong>{{ $equipment->equipment_rent_fee }}
                                            <br>
                                            <strong>เงื่อนไขการขอยืม/ใช้งานเครื่องมือ : </strong>{{ $equipment->equipment_rent_detail }} 
                                        @endif 
                                    </td>
                                </tr>
                                {{-- 3.20 การให้เช่าใช้เครื่องมือ --}}
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive-->
                </div>
                <!-- /.card-header -->
                <div class="card-footer">
                    @if (!Auth::guest())                            
                        @if (Auth::user()->id == $equipment->user_id)
                            <a href="/equipment/" class="btn btn-secondary btn-sm">
                                <i class="fas fa-undo"></i> ย้อนกลับ
                            </a>
                            @if ($equipment->completed == 0)
                            <a href="/equipment/{{ $equipment->id }}/edit" class="btn btn-info btn-sm">
                                <i class="fas fa-user-edit"></i> แก้ไขข้อมูล
                            </a>
                            @endif                                
                        @endif
                    @endif
                </div>
                {{-- /.card footer --}}

            </div>
            <!-- /.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection
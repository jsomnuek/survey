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
                                <td>{{ $equipmentLabs->scienceTool->science_tool_name }}</td>
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
                                <td>{{ $equipmentLabs->equipment_price }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.9 บริษัทที่จำหน่าย :</th>
                                <td>{{ $equipmentLabs->equipment_supplier }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">3.10 สาขาเทคโนโลยี :</th>
                                <td>
                                    @forelse ($equipmentLabs->majorTechnologies as $item)
                                        <li>{{ $item->major_tech_name }}</li>
                                    @empty

                                    @endforelse
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
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="/equipmentLab" class="btn btn-secondary">ย้อนกลับ</a>
                    <a href="/equipmentLab/{{ $equipmentLabs->id }}/edit" class="btn btn-primary">แก้ไขข้อมูล</a>
                </div>

            </div>
            <!-- /.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection
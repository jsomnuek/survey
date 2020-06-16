@extends('layouts.admin')

@section('page')
    Product Lab
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark">Product Lab</h1>
@endsection

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">รายการทดสอบ/สอบเทียบทั้งหมด</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        @if (count($showEquipmentLab) > 0)
                        <thead>                  
                            <tr>
                                <th style="width: 10px">รหัสผลิตภัณฑ์</th>
                                <th>ชื่อผลิตภัณฑ์</th>
                                <th>ประเภทผลิตภัณฑ์</th>
                                <th style="width: 10em"><i class="fas fa-users-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($showEquipmentLab as $equipmentLab)
                            <tr>
                                <td>{{ $equipmentLab->id }}</td>
                                <td>{{ $equipmentLab->equipment_lab_id }}</td>
                                <td>{{ $equipmentLab->equipment_lab_id }}</td>
                                {{-- <td><a href="/productLab/{{ $allProductLab->id }}" class="btn btn-primary btn-sm">ดูรายละเอียด</a> 
                                    <a href="/productLab/{{ $allProductLab->id }}/edit" class="btn btn-warning btn-sm">แก้ไขข้อมูล</a>
                                </td> --}}
                                
                            </tr>                                
                            @endforeach
                        </tbody>
                        @else
                            <div class="text-center">
                                No Data!
                            </div>
                        @endif
                        
                    </table>
                </div>
                <!-- /.card-body -->
                
               
                <!-- /.card-footer -->
            </div>
            <!--/.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection


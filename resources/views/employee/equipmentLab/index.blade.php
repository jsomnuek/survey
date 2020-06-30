@extends('layouts.admin')

@section('page')
    Equipment Lab
@endsection

@section('header-box-1')
    {{-- <h1 class="m-0 text-dark">Equipment Lab</h1> --}}
@endsection

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">เครื่องมือในห้องปฏิบัติการ</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        @if (count($equipmentLabs) > 0)
                        <thead>                  
                            <tr>
                                <th style="width: 10px">ลำดับ</th>
                                <th>รหัสเครื่องมือ</th>
                                <th>ชื่อเครื่องมือ</th>
                                <th style="width: 10em"><i class="fas fa-users-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipmentLabs as $equipmentLab)
                            <tr>
                                <td>{{ $equipmentLab->id }}</td>
                                <td>{{ $equipmentLab->equipment_lab_id }}</td>
                                <td>{{ $equipmentLab->equipment_name_th }}</td>
                                <td><a href="/equipmentLab/{{ $equipmentLab->id }}" class="btn btn-primary btn-sm">ดูรายละเอียด</a> 
                                    {{-- <a href="/equipmentLab/{{ $equipmentLab->id }}/edit" class="btn btn-warning btn-sm">แก้ไขข้อมูล</a> --}}
                                </td>
                                
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
                @if (count($equipmentLabs) > 10)
                <div class="card-footer clearfix">
                    {{ $equipmentLabs->links() }}
                </div>
            @else
                
            @endif
                <!-- /.card-footer -->
            </div>
            <!--/.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection


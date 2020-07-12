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
                        @if (count($equipments) > 0)
                        <thead>                  
                            <tr>
                                <th style="width: 10px" class="text-center">ลำดับ</th>
                                <th>ชื่อเครื่องมือ (ภาษาอังกฤษ)</th>
                                <th>ห้องปฏิบัติการ</th>
                                <th style="width: 10em"><i class="fas fa-users-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($equipments as $equipment)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $equipment->scienceTool->science_tool_name }}</td>
                                <td>{{ $equipment->lab->lab_name }}</td>
                                <td><a href="/equipments/{{ $equipment->id }}" class="btn btn-primary btn-sm">ดูรายละเอียด</a></td>
                            </tr>                                
                            @endforeach
                        </tbody>
                        @else
                            <div class="text-center">
                                ไม่พบข้อมูลเครื่องมือวิทยาศาสตร์ !
                            </div>
                        @endif
                        
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">

                </div>
                <!-- /.card-footer -->
            </div>
            <!--/.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection


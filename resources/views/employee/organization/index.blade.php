@extends('layouts.admin')

@section('page')
    Organization
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ข้อมูลทั้งหมด</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        @if (count($orgs) > 0)
                        <thead>                  
                            <tr>
                                <th style="width: 10px">ลำดับ</th>
                                <th>ชื่อหน่วยงาน</th>
                                <th>ผู้บันทึกข้อมูล</th>
                                <th style="width: 10em" colspan="2"><i class="fas fa-users-cog"> </i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($orgs as $org)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>
                                    {{ $org->org_name }} 
                                    @if(!empty($org->org_name_level_1)){{' : '.$org->org_name_level_1}}@else @endif 
                                    @if(!empty($org->org_name_level_2)){{' : '.$org->org_name_level_2}}@else @endif 
                                </td>
                                <td>{{ $org->user->name }}</td>
                                <td>
                                    <a href="/organization/{{ $org->id }}" class="btn btn-primary btn-sm">ดูรายละเอียด</a>
                                </td>
                                <td>
                                    <a href="{{ route('labs.create-org-id', $org->id) }}" class="btn btn-info btn-sm">เพิ่มข้อมูลห้องปฏิบัติการ</a>
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
                @if (count($orgs) > 10)
                    <div class="card-footer clearfix">
                        {{ $orgs->links() }}
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


@extends('layouts.admin')

@section('page')
    Organization
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark">Organization</h1>
@endsection

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ข้อมูลทั้งหมด</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        @if (count($orgs) > 0)
                        <thead>                  
                            <tr>
                                <th style="width: 10px">รหัส</th>
                                <th>ชื่อหน่วย</th>
                                <th>โทรศัพท์</th>
                                <th style="width: 40px">อีเมล</th>
                                <th style="width: auto"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orgs as $org)
                            <tr>
                                <td>{{ $org->id }}</td>
                                <td>{{ $org->org_name }}</td>
                                <td>{{ $org->org_phone }}</td>
                                <td>{{ $org->org_email }}</td>
                                <td><a href="/organization/{{ $org->id }}" class="btn btn-primary btn-sm">ดูรายละเอียด</a></td>
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


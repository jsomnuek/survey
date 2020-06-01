@extends('adminlte::page')

@section('title','Dashboard | Organisation Type')
    
@section('content_header')
    <h1>ประเภทองค์กร</h1>
@stop

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllOrgType) > 0)
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ลำดับที่</th>
                        <th>ชื่อประเภทองค์กร</th>
                        <th>สถานะการใช้งานข้อมูล</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($showAllOrgType as $orgType)
                          <tr>
                            <td>{{$orgType->id}}</td>
                            <td>{{$orgType->org_type_name}}</td>
                            <td>{{$orgType->org_type_status}}</td>
                            <td><a href="/organisationType/{{$orgType->id}}/edit" class="bth btn-primary btn-sm">แก้ไข</a></td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @else
                    <p>ไม่พบข้อมูล</p>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>console.log('Hi!');</script>
@stop

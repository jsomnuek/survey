@extends('layouts.admin')

@section('title','Dashboard | Laboratory Development')
    
@section('content_header')
    <h1>ข้อมูลการพัฒนาห้องปฏิบัติการ</h1>
@stop

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllLabDev) > 0)
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width:80px;">ลำดับที่</th>
                        <th class="text-center">การพัฒนาห้องปฏิบัติการ</th>
                        <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($showAllLabDev as $labDev)
                          <tr>
                            <td class="text-center">{{$labDev->id}}</td>
                            <td>{{$labDev->lab_dev_name}}</td>
                            <td><a href="/labDevelopment/{{$labDev->id}}/edit" class="bth btn-primary btn-sm">แก้ไขข้อมูล</a></td>
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

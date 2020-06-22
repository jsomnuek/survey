@extends('layouts.admin')

@section('title','Dashboard | Location of Laboratory')
    
@section('content_header')
    <h1>รายการสถานที่ต้ังห้องปฏิบัติการ</h1>
@stop

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllLocationLab) > 0)
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width:80px;">ลำดับที่</th>
                        <th class="text-center">รายการสถานที่ตั้ง</th>
                        <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($showAllLocationLab as $locationLab)
                          <tr>
                            <td class="text-center">{{$locationLab->id}}</td>
                            <td>{{$locationLab->location_name}}</td>
                            <td class="text-center">{{$locationLab->location_status}}</td>
                            <td><a href="/locationLab/{{$locationLab->id}}/edit" class="bth btn-primary btn-sm">แก้ไข</a></td>
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

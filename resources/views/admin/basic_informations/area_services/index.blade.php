@extends('layouts.admin')

@section('title','Dashboard | Area Service')
    
@section('content_header')
    <h1>ขอบเขตการให้บริการ</h1>
@stop

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllAreaService) > 0)
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width:80px;">ลำดับที่</th>
                        <th class="text-center">รายการขอบเขตการให้บริการ</th>
                        <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($showAllAreaService as $areaService)
                          <tr>
                            <td class="text-center">{{$areaService->id}}</td>
                            <td>{{$areaService->area_service_name}}</td>
                            <td class="text-center">{{$areaService->area_service_status}}</td>
                            <td><a href="/areaService/{{$areaService->id}}/edit" class="bth btn-primary btn-sm">แก้ไข</a></td>
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

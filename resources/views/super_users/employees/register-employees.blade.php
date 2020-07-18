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
              @if (count($showRegisterEmployee) > 0)
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width:100px;">รหัสผู้ใช้ (ID)</th>
                        <th class="text-center">ชื่อ - นามสกุล</th>
                        <th style="width:180px;">อีเมล</th>
                        <th>ภูมิภาคที่ปฏิบัติงาน</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($showRegisterEmployee as $registerEmployee)
                          <tr>
                            <td class="text-center">{{$registerEmployee->user_code}}</td>
                            <td>{{$registerEmployee->name}}</td>
                            <td>{{$registerEmployee->email}}</td>
                            <td>{{$registerEmployee->region->region_name}}</td>
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

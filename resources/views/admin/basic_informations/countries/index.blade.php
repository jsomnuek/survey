@extends('layouts.admin')

@section('title','Dashboard | Countries')
    
@section('content_header')
    <h1>รายชื่อประเทศ</h1>
@stop

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllCountry) > 0)
                  <table class="table" id="dt1">
                    <thead>
                      <tr>
                        <th style="width:80px;">ลำดับที่</th>
                        <th class="text-center">รหัสประเทศ</th>
                        <th class="text-center">ชื่อประเทศภาษาไทย</th>
                        <th class="text-center">ชื่อประเทศภาษาอังกฤษ</th>
                        <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($showAllCountry as $country)
                          <tr>
                            <td class="text-center">{{$country->id}}</td>
                            <td>{{$country->country_code}}</td>
                            <td>{{$country->country_name_thai}}</td>
                            <td>{{$country->country_name_eng}}</td>
                            <td class="text-center">{{$country->country_status}}</td>
                            <td><a href="/country/{{$country->id}}/edit" class="bth btn-primary btn-sm">แก้ไข</a></td>
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

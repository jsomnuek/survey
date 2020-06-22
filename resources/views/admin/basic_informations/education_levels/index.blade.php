@extends('layouts.admin')

@section('title','Dashboard | Education Level')
    
@section('content_header')
    <h1>ระดับการศึกษา</h1>
@stop

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllEduLevel) > 0)
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width:80px;">ลำดับที่</th>
                        <th class="text-center">ชื่อเต็มระดับการศึกษา</th>
                        <th class="text-center">ชื่อย่อระดับการศึกษา</th>
                        <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($showAllEduLevel as $eduLevel)
                          <tr>
                            <td class="text-center">{{$eduLevel->id}}</td>
                            <td>{{$eduLevel->edu_level_name}}</td>
                            <td>{{$eduLevel->edu_level_abbr}}</td>
                            <td class="text-center">{{$eduLevel->edu_level_status}}</td>
                            <td><a href="/educationLevel/{{$eduLevel->id}}/edit" class="bth btn-primary btn-sm">แก้ไขข้อมูล</a></td>
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

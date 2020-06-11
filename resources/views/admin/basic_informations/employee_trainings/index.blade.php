@extends('layouts.admin')

@section('title','Dashboard | Employee Training')
    
@section('content_header')
    <h1>รายการจำนวนพนักงานที่ได้รับการฝึกอบรม</h1>
@stop

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllEmpTraining) > 0)
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width:80px;">ลำดับที่</th>
                        <th class="text-center">ช่วงจำนวนเข้ารับการฝึกอบรม</th>
                        <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($showAllEmpTraining as $empTraining)
                          <tr>
                            <td class="text-center">{{$empTraining->id}}</td>
                            <td>{{$empTraining->emp_training_detail}}</td>
                            <td class="text-center">{{$empTraining->emp_training_status}}</td>
                            <td><a href="/employeeTraining/{{$empTraining->id}}/edit" class="bth btn-primary btn-sm">แก้ไข</a></td>
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

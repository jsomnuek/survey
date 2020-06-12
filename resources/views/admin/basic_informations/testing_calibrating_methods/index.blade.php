@extends('layouts.admin')

@section('title','Dashboard | Testing Calibration Method')
    
@section('content_header')
    <h1>วิธีการทดสอบ/สอบเทียบ</h1>
@stop

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllTCMethod) > 0)
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ลำดับที่</th>
                        <th>วิธีการทดสอบ/สอบเทียบ</th>
                        <th>สถานะการใช้งานข้อมูล</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($showAllTCMethod as $tCMethod)
                          <tr>
                            <td>{{$tCMethod->id}}</td>
                            <td>{{$tCMethod->testing_method_name}}</td>
                            <td>{{$tCMethod->testing_method_status}}</td>
                            <td><a href="/testingCalibratingMethod/{{$tCMethod->id}}/edit" class="bth btn-primary btn-sm">แก้ไข</a></td>
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

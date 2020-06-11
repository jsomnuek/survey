@extends('layouts.admin')

@section('title','Dashboard | Testing Calibrating List')
    
@section('content_header')
    <h1>ประเภทรายการการทดสอบ/สอบเทียบ</h1>
@stop

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllTCList) > 0)
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ลำดับที่</th>
                        <th>ประเภทรายการทดสอบ/สอบเทียบ</th>
                        <th>สถานะการใช้งานข้อมูล</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($showAllTCList as $tCList)
                          <tr>
                            <td>{{$tCList->id}}</td>
                            <td>{{$tCList->testing_list_name}}</td>
                            <td>{{$tCList->testing_list_status}}</td>
                            <td><a href="/testingCalibratingList/{{$tCList->id}}/edit" class="bth btn-primary btn-sm">แก้ไข</a></td>
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

@extends('layouts.admin')

@section('title','Dashboard | Testing Calibrating Type')
    
@section('content_header')
    <h1>รายการทดสอบความชำนาญ</h1>
@stop

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllPT) > 0)
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ลำดับที่</th>
                        <th>รายการทดสอบความชำนาญ</th>
                        <th>สถานะการใช้งานข้อมูล</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($showAllPT as $pT)
                          <tr>
                            <td>{{$pT->id}}</td>
                            <td>{{$pT->pt_name}}</td>
                            <td>{{$pT->pt_status}}</td>
                            <td><a href="/proficiencyTesting/{{$pT->id}}/edit" class="bth btn-primary btn-sm">แก้ไข</a></td>
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

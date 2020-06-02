@extends('adminlte::page')

@section('title','Dashboard | Laboratory Type')

@section('content_header')
  <h1>ข้อมูลประเภทห้องปฏิบัติการ</h1>

  @stop

  @section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllLabType) > 0)
                <table class="table">
                  <thead>
                    <tr>
                      <th>ลำดับที่</th>
                      <th>ชื่อประเภทห้องปฏิบัติการ</th>
                      <th>สถานะการใช้งาน</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($showAllLabType as $labType)
                    <tr>
                      <td>{{$labType->id}}</td>
                      <td>{{$labType->lab_type_name}}</td>
                      <td>{{$labType->lab_type_status}}</td>
                      <td><a href="/laboratoryType/{{$labType->id}}/edit" class="btn btn-primary btn-sm">แก้ไข</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @else
                  <p>no result</p>                  
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
@extends('adminlte::page')

@section('title','Dashboard | Equipment Objective Usage')

@section('content_header')
  <h1>วัตถุประสงค์การใช้งานเครื่องมือ</h1>

  @stop

  @section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllObjUsage) > 0)
                <table class="table">
                  <thead>
                    <tr>
                      <th>ลำดับที่</th>
                      <th>ชื่อประเภทผลิตภัณฑ์</th>
                      <th>สถานะการใช้งาน</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($showAllObjUsage as $objUsage)
                    <tr>
                      <td>{{$objUsage->id}}</td>
                      <td>{{$objUsage->obj_usage_name}}</td>
                      <td>{{$objUsage->obj_usage_status}}</td>
                      <td><a href="/objectiveUsage/{{$objUsage->id}}/edit" class="btn btn-primary btn-sm">แก้ไข</a></td>
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
@extends('layouts.admin')

@section('title','Dashboard | Major Technology')

@section('content_header')
  <h1>ข้อมูลสาขาเทคโนโลยีของเครื่องมือ/อุปกรณ์</h1>

  @stop

  @section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllMajorTech) > 0)
                <table class="table">
                  <thead>
                    <tr>
                      <th>ลำดับที่</th>
                      <th>ชื่อสาขาเทคโนโลยีของเครื่องมือ/อุปกรณ์</th>
                      <th>สถานะการใช้งานข้อมูล</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($showAllMajorTech as $majorTech)
                    <tr>
                      <td>{{$majorTech->id}}</td>
                      <td>{{$majorTech->major_tech_name}}</td>
                      <td>{{$majorTech->major_tech_status}}</td>
                      <td><a href="/majorTechnology/{{$majorTech->id}}/edit" class="btn btn-primary btn-sm">แก้ไข</a></td>
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
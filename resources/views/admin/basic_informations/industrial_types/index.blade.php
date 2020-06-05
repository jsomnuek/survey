@extends('adminlte::page')

@section('title','Dashboard | Industrial Type')
    
@section('content_header')
    <h1>ประเภทอุตสาหกรรม</h1>
@stop

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllIndustType) > 0)
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width:80px;">ลำดับที่</th>
                        <th class="text-center">ชื่อประเภทอุตสาหกรรม</th>
                        <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($showAllIndustType as $industType)
                          <tr>
                            <td class="text-center">{{$industType->id}}</td>
                            <td>{{$industType->industrial_type_name}}</td>
                            <td class="text-center">{{$industType->industrial_type_status}}</td>
                            <td><a href="/industrialType/{{$industType->id}}/edit" class="bth btn-primary btn-sm">แก้ไข</a></td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{$showAllIndustType->links()}}
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

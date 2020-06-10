@extends('layouts.admin')
@section('title', 'Dashboard | Industrial Estate')

@section('content_header')
    <h1>ข้อมูลนิคมอุตสาหกรรม</h1>
@stop

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mb-2">
          <div class="card-body">
            @if (count($showAllEstate) > 0)
                <table class="table" id="dt1">
                  <thead>
                    <tr>
                      <th style="width:80px;">ลำดับที่</th>
                      <th class="text-center">ชื่อนิคมอุตสาหกรรม</th>
                      <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($showAllEstate as $estate)
                    <tr>
                      <td class="text-center">{{$estate->id}}</td>
                      <td>{{$estate->estate_name}}</td>
                      <td class="text-center">{{$estate->estate_status}}</td>
                      <td><a href="/industrialEstate/{{$estate->id}}/edit" class="btn btn-primary btn-sm">แก้ไข</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{-- {{$showAllEstate->links()}} --}}
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
    <script> console.log('Hi!'); </script>
@stop



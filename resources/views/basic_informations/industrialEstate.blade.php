@extends('adminlte::page')

@section('title', 'Dashboard | Industrial Estate')

@section('content_header')
    <h1>Industrial Estate</h1>
@stop

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mb-2">
          <div class="card-body">
            @if (count($showAllEstate) > 0)
                <table class="table">
                  <thead>
                    <tr>
                      <th>ลำดับที่</th>
                      <th>ชื่อนิคมอุตสาหกรรม</th>
                      <th>สถานะการใช้งาน</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($showAllEstate as $estate)
                    <tr>
                      <td>{{$estate->id}}</td>
                      <td>{{$estate->estate_name}}</td>
                      <td>{{$estate->estate_status}}</td>
                      <td><a href="/industrialEstate/{{$estate->id}}/edit" class="btn btn-primary btn-sm">แก้ไข</a></td>
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
    <script> console.log('Hi!'); </script>
@stop



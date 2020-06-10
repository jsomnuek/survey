@extends('layouts.admin')

@section('title', 'Dashboard | Equipment')

@section('content_header')
    <h1>ข้อมูลเครื่องมือวิทยาศาสตร์</h1>
@stop

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mb-2">
          <div class="card-body">
            @if (count($showAllEquipment) > 0)
                <table class="table" id="dt1">
                  <thead>
                    <tr>
                      <th style="width:80px;">ลำดับที่</th>
                      <th class="text-center">ชื่อเครื่องมือวิทยาศาสตร์</th>
                      <th>ชื่อย่อเครื่องมือวิทยาศาสตร์</th>
                      <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($showAllEquipment as $equipment)
                    <tr>
                      <td class="text-center">{{$equipment->id}}</td>
                      <td>{{$equipment->equipment_name}}</td>
                      <td>{{$equipment->equipment_abbr}}</td>
                      <td class="text-center">{{$equipment->equipment_status}}</td>
                      <td><a href="/equipment/{{$equipment->id}}/edit" class="btn btn-primary btn-sm">แก้ไข</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{$showAllEquipment->links()}}
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



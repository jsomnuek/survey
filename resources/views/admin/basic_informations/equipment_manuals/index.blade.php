@extends('layouts.admin')

@section('title', 'Dashboard | Equipment Manual')

@section('content_header')
    <h1>ข้อมูลคู่มือการใช้งานเครื่องมือ</h1>
@stop

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mb-2">
          <div class="card-body">
            @if (count($showAllEquipmentManual) > 0)
                <table class="table" id="">
                  <thead>
                    <tr>
                      <th style="width:80px;">ลำดับที่</th>
                      <th class="text-center">รายการคู่มือการใช้งาน</th>
                      <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($showAllEquipmentManual as $equipmentManual)
                    <tr>
                      <td class="text-center">{{$equipmentManual->id}}</td>
                      <td>{{$equipmentManual->equipment_manual_name}}</td>
                      <td class="text-center">{{$equipmentManual->equipment_manual_status}}</td>
                      <td><a href="/equipmentManual/{{$equipmentManual->id}}/edit" class="btn btn-primary btn-sm">แก้ไข</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{-- {{$showAllEquipment->links()}} --}}
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
    <script> console.log('Hi!'); </script>
@stop



@extends('layouts.admin')

@section('title', 'Dashboard | Equipment Calibration')

@section('content_header')
    <h1>ข้อมูลการสอบเทียบเครื่องมือ</h1>
@stop

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mb-2">
          <div class="card-body">
            @if (count($showAllEquipmentCalibration) > 0)
                <table class="table" id="">
                  <thead>
                    <tr>
                      <th style="width:80px;">ลำดับที่</th>
                      <th class="text-center">รายการสอบเทียบเครื่องมือ</th>
                      <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($showAllEquipmentCalibration as $equipmentCalibration)
                    <tr>
                      <td class="text-center">{{$equipmentCalibration->id}}</td>
                      <td>{{$equipmentCalibration->equipment_calibration_name}}</td>
                      <td class="text-center">{{$equipmentCalibration->equipment_calibration_status}}</td>
                      <td><a href="/equipmentCalibration/{{$equipmentCalibration->id}}/edit" class="btn btn-primary btn-sm">แก้ไข</a></td>
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



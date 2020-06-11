@extends('layouts.admin')

@section('title', 'Dashboard | Equipment Rent')

@section('content_header')
    <h1>ข้อมูลรายการให้เช่าเครืองมือ</h1>
@stop

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mb-2">
          <div class="card-body">
            @if (count($showAllEquipmentRent) > 0)
                <table class="table" id="">
                  <thead>
                    <tr>
                      <th style="width:80px;">ลำดับที่</th>
                      <th class="text-center">รายการให้เช่าเครืองมือ</th>
                      <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($showAllEquipmentRent as $equipmentRent)
                    <tr>
                      <td class="text-center">{{$equipmentRent->id}}</td>
                      <td>{{$equipmentRent->equipment_rent_name}}</td>
                      <td class="text-center">{{$equipmentRent->equipment_rent_status}}</td>
                      <td><a href="/equipmentRent/{{$equipmentRent->id}}/edit" class="btn btn-primary btn-sm">แก้ไข</a></td>
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



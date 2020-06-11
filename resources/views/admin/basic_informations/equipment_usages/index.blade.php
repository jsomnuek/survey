@extends('layouts.admin')

@section('title', 'Dashboard | Equipment Usage')

@section('content_header')
    <h1>ข้อมูลขอบเขตการใช้เครื่องมือ</h1>
@stop

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mb-2">
          <div class="card-body">
            @if (count($showAllEquipmentUsage) > 0)
                <table class="table" id="">
                  <thead>
                    <tr>
                      <th style="width:80px;">ลำดับที่</th>
                      <th class="text-center">รายการขอบเขตการใช้เครื่องมือ</th>
                      <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($showAllEquipmentUsage as $equipmentUsage)
                    <tr>
                      <td class="text-center">{{$equipmentUsage->id}}</td>
                      <td>{{$equipmentUsage->equipment_usage_name}}</td>
                      <td class="text-center">{{$equipmentUsage->equipment_usage_status}}</td>
                      <td><a href="/equipmentUsage/{{$equipmentUsage->id}}/edit" class="btn btn-primary btn-sm">แก้ไข</a></td>
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



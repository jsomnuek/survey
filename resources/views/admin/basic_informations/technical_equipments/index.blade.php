@extends('layouts.admin')

@section('title', 'Dashboard | TechnicalEquipment')

@section('content_header')
    <h1>Technical Equipement</h1>
@stop

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mb-2">
          <div class="card-body">
            @if (count($showAllTechnicalEquipment) > 0)
                <table class="table">
                  <thead>
                    <tr>
                      <th>ลำดับที่</th>
                      <th>ชื่อเทคนิคเครื่องมือ</th>
                      <th>สถานะ</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($showAllTechnicalEquipment as $technicalEquipment)
                    <tr>
                      <td>{{$technicalEquipment->id}}</td>
                      <td>{{$technicalEquipment->technical_equipment_name}}</td>
                      <td>{{$technicalEquipment->technical_equipment_status}}</td>
                      <td><a href="/technicalEquipment/{{$technicalEquipment->id}}/edit" class="btn btn-primary btn-sm">แก้ไข</a></td>
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
    <script> console.log('Hi!'); </script>
@stop



@extends('adminlte::page')

@section('title', 'Dashboard | Equipment')

@section('content_header')
    <h1>Equipttttte</h1>
@stop

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mb-2">
          <div class="card-body">
            @if (count($showAllEquipment) > 0)
                <table class="table">
                  <thead>
                    <tr>
                      <th>ลำดับที่</th>
                      <th>ชื่อเครื่องมือ</th>
                      <th>สถานะการใช้งาน</th>
                      <th>ชื่อย่อเครื่องมือ<th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($showAllEquipment as $equipment)
                    <tr>
                      <td>{{$equipment->id}}</td>
                      <td>{{$equipment->equipment_name}}</td>
                      <td>{{$equipment->equipment_status}}</td>
                      <td>{{$equipment->equipment_abbr}}</td>
                      <td><a href="/equipment/{{$equipment->id}}/edit" class="btn btn-primary btn-sm">แก้ไข</a></td>
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



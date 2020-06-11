@extends('layouts.admin')

@section('title', 'Dashboard | Equipment Maintenance')

@section('content_header')
    <h1>แก้ไขข้อมูลการบำรุงรักษาเครื่องมือวิทยาศาสตร์</h1>
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
          <div class="alert alert-danger">
              {{$error}}
          </div>
        @endforeach
      @endif
      <div class="card">
        {!! Form::open(['action'=>['BasicInformations\EquipmentMaintenanceController@update', $editEquipmentMA->id], 'method' => 'PUT']) !!}
        <div class="card-body">
          <div class="form-group">
            {{Form::label('title','รายการบำรุงรักษาเครื่องมือ')}}
            {{Form::text('equipmentMAName', $editEquipmentMA->equipment_maintenance_name, ['class'=>'form-control','required'])}}
          </div>
          <div class="form-group">
            {{Form::label('title','สถานะการใช้งานข้อมูล')}}
            {{Form::select('equipmentMAStatus',[
              'A' => 'Active',
              'D' => 'Disable',
          ],$editEquipmentMA->equipment_maintenance_status,['class'=>'form-control'])}}
          </div>
          <a href="/equipmentMaintenance"  class="btn btn-secondary">ย้อนกลับ</a>
          {{ Form::hidden('_method', 'PUT') }}
          {{ Form::submit('บันทึก',['class'=>'btn btn-primary']) }}
        </div>
        {!!Form::close()!!}
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
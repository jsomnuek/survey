@extends('layouts.admin')

@section('title', 'Dashboard | Equipment Maintenance')

@section('content_header')
    <h1>เพิ่มข้อมูลการบำรุงรักษาเครื่องมือวิทยาศาสตร์</h1>
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
        {!!Form::open(['action'=>'BasicInformations\EquipmentMaintenanceController@store','method'=>'POST', 'class' => 'was-validated'])!!}
        <div class="card-body">
          <div class="form-group">
            {{Form::label('title','รายการบำรุงรักษาเครื่องมือ')}}
            {{Form::text('equipmentMAName','',['class'=>'form-control','required'])}}
          </div>
          <a href="/equipmentMaintenance"  class="btn btn-secondary">ย้อนกลับ</a>
          {{Form::submit('บันทึก',['class'=>'btn btn-primary'])}}
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






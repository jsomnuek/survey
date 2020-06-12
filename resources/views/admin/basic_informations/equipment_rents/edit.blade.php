@extends('layouts.admin')

@section('title', 'Dashboard | Equipment Rent')

@section('content_header')
    <h1>แก้ไขข้อมูลรายการให้เช่าเครืองมือ</h1>
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
        {!! Form::open(['action'=>['BasicInformations\EquipmentRentController@update', $editEquipmentRent->id], 'method' => 'PUT']) !!}
        <div class="card-body">
          <div class="form-group">
            {{Form::label('title','รายการให้เช่าเครืองมือ')}}
            {{Form::text('equipmentRentName', $editEquipmentRent->equipment_rent_name, ['class'=>'form-control','required'])}}
          </div>
          <div class="form-group">
            {{Form::label('equipmentRentStatus','สถานะการใช้งานข้อมูล')}}
            {{Form::select('equipmentRentStatus',[
              'A' => 'Active',
              'D' => 'Disable',
          ],$editEquipmentRent->equipment_rent_status,['class'=>'form-control'])}}
          </div>
          <a href="/equipmentRent"  class="btn btn-secondary">ย้อนกลับ</a>
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
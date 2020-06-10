@extends('layouts.admin')

@section('title', 'Dashboard | TechnicalEquipment')

@section('content_header')
    <h1>Technical Equipment</h1>
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
        {!! Form::open(['action'=>['BasicInformations\TechnicalEquipmentController@update', $editTechnicalEquipment->id], 'method' => 'PUT']) !!}
        <div class="card-body">
          <div class="form-group">
            {{Form::label('technicalEquipmentName','ชื่อนิคมอุตสาหกรรม')}}
            {{Form::text('technicalEquipmentName', $editTechnicalEquipment->technical_equipment_name, ['class'=>'form-control','required'])}}
          </div>
          <div class="form-group">
            {{Form::label('technicalEquipmentStatus','สถานะการใช้งานข้อมูล')}}
            {{-- {{Form::text('estateStatus', $editEstate->estate_status, ['class'=>'form-control','required'])}} --}}
            {{Form::select('technicalEquipmentStatus',[
              'A' => 'Active',
              'D' => 'Disable',
          ],$editTechnicalEquipment->technical_equipment_status,['class'=>'form-control'])}}
          </div>
          <a href="/technicalEquipment"  class="btn btn-secondary">ย้อนกลับ</a>
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
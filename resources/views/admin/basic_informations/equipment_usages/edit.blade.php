@extends('layouts.admin')

@section('title', 'Dashboard | Equipment Usage')

@section('content_header')
    <h1>แก้ไขขอบเขตการใช้เครื่องมือ</h1>
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
        {!! Form::open(['action'=>['BasicInformations\EquipmentUsageController@update', $editEquipmentUsage->id], 'method' => 'PUT']) !!}
        <div class="card-body">
          <div class="form-group">
            {{Form::label('title','ขอบเขตการใช้เครื่องมือ')}}
            {{Form::text('equipmentUsageName', $editEquipmentUsage->equipment_usage_name, ['class'=>'form-control','required'])}}
          </div>
          <div class="form-group">
            {{Form::label('title','สถานะการใช้งานข้อมูล')}}
            {{Form::select('equipmentUsageStatus',[
              'A' => 'Active',
              'D' => 'Disable',
          ],$editEquipmentUsage->equipment_usage_status,['class'=>'form-control'])}}
          </div>
          <a href="/equipmentUsage"  class="btn btn-secondary">ย้อนกลับ</a>
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
@extends('adminlte::page')

@section('title', 'Dashboard | Equipment')

@section('content_header')
    <h1>Equipment</h1>
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
        {!! Form::open(['action'=>['EquipmentController@update', $editEquipment->id], 'method' => 'PUT']) !!}
        <div class="card-body">
          <div class="form-group">
            {{Form::label('equipmentName','ชื่อเครื่องมือ')}}
            {{Form::text('equipmentName', $editEquipment->equipment_name, ['class'=>'form-control','required'])}}
          </div>
          <div class="form-group">
            {{Form::label('equipmentAbbr','ชื่อย่อเครื่องมือ')}}
            {{Form::text('equipmentAbbr', $editEquipment->equipment_abbr, ['class'=>'form-control','required'])}}
          </div>
          <div class="form-group">
            {{Form::label('equipmentStatus','สถานะการใช้งานเครื่องมือ')}}
            {{-- {{Form::text('estateStatus', $editEstate->estate_status, ['class'=>'form-control','required'])}} --}}
            {{Form::select('equipmentStatus',[
              'A' => 'Active',
              'D' => 'Disable',
          ],$editEquipment->equipment_status,['class'=>'form-control'])}}
          </div>
          <a href="/equipment"  class="btn btn-secondary">ย้อนกลับ</a>
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
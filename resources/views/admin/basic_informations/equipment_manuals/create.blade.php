@extends('layouts.admin')

@section('title', 'Dashboard | Equipment Manual')

@section('content_header')
    <h1>เพิ่มข้อมูลคู่มือการใช้งานเครื่องมือ</h1>
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
        {!!Form::open(['action'=>'BasicInformations\EquipmentManualController@store','method'=>'POST', 'class' => 'was-validated'])!!}
        <div class="card-body">
          <div class="form-group">
            {{Form::label('title','รายการคู่มือการใช้งาน')}}
            {{Form::text('equipmentManualName','',['class'=>'form-control','required'])}}
          </div>
          <a href="/equipmentManual"  class="btn btn-secondary">ย้อนกลับ</a>
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






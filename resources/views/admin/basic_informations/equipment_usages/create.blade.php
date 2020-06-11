@extends('layouts.admin')

@section('title', 'Dashboard | Equipment Usage')

@section('content_header')
    <h1>เพิ่มข้อมูลขอบเขตการใช้เครื่องมือ</h1>
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
        {!!Form::open(['action'=>'BasicInformations\EquipmentUsageController@store','method'=>'POST', 'class' => 'was-validated'])!!}
        <div class="card-body">
          <div class="form-group">
            {{Form::label('title','รายการขอบเขตการใช้เครื่องมือ')}}
            {{Form::text('equipmentUsageName','',['class'=>'form-control','required'])}}
          </div>
          <a href="/equipmentUsage"  class="btn btn-secondary">ย้อนกลับ</a>
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






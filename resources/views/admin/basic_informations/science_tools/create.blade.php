@extends('layouts.admin')

@section('title', 'Dashboard | Science Tool')

@section('content_header')
    <h1>ข้อมูลเครื่องมือวิทยาศาสตร์</h1>
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
        {!!Form::open(['action'=>'BasicInformations\ScienceToolController@store','method'=>'POST', 'class' => 'was-validated'])!!}
        <div class="card-body">
          <div class="form-group">
            {{Form::label('title','ชื่อเครื่องมือ')}}
            {{Form::text('scienceToolName','',['class'=>'form-control','required'])}}
          </div>
          <div class="form-group">
            {{Form::label('title','ชื่อย่อเครื่องมือ')}}
            {{Form::text('scienceToolAbbr','',['class'=>'form-control','required'])}}
          </div>
          <a href="/scienceTool"  class="btn btn-secondary">ย้อนกลับ</a>
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






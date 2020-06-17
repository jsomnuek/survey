@extends('layouts.admin')

@section('title', 'Dashboard | Countries')
    
@section('content_header')
    <h1>เพิ่มรายชื่อประเทศ</h1>
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
            {!!Form::open(['action' => 'BasicInformations\CountryController@store','method' => 'POST','class' => 'was-validate'])!!}
            <div class="card-body">
              <div class="form-group">
                {{Form::label('title','รหัสประเทศ')}}
                {{Form::text('countryCode','',['class' => 'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('title','ชื่อประเทศภาษาไทย')}}
                {{Form::text('countryNameThai','',['class' => 'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('title','ชื่อประเทศภาษาอังกฤษ')}}
                {{Form::text('countryNameEng','',['class' => 'form-control','required'])}}
              </div>
              <a href="/country" class="btn btn-secondary">ย้อนกลับ</a>
              {{Form::submit('บันทึก',['class' => 'btn btn-primary'])}}
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
    <script>console.log('Hi');</script>
@stop
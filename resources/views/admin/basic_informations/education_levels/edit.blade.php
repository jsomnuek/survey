@extends('layouts.admin')

@section('title', 'Dashboard | Education Level')

@section('content_header')
    <h1>แก้ไขข้อมูลระดับการศึกษา</h1>
@endsection

@section('content')
    <div class="container">
      <div class="row">
        <div class="col">
          @if (count($errors) > 0)
              @foreach ($errors as $error)
                  <div class="alert alert-danger">
                    {{$error}}
                  </div>
              @endforeach
          @endif
          <div class="card">
            {!!Form::open(['action' => ['BasicInformations\EducationLevelController@update',$editEduLevel->id],'method'=>'PUT'])!!}
            <div class="card-body">
              <div class="form-group">
                {{Form::label('little','ชื่อเต็มระดับการศึกษา')}}
                {{Form::text('eduLevelName',$editEduLevel->edu_level_name,['class'=>'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('little','ชื่อย่อระดับการศึกษา')}}
                {{Form::text('eduLevelAbbr',$editEduLevel->edu_level_abbr,['class'=>'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('title', 'สถานะการใช้งานข้อมูล')}}
                {{Form::select('eduLevelStatus',[
                  'A' => 'Active',
                  'D' => 'Disable',
              ], $editEduLevel->edu_level_status,['class'=>'form-control'])}}
              </div>
              <a href="/educationLevel" class="btn btn-secondary">ย้อนกลับ</a>
              {{Form::hidden('_method','PUT')}}
              {{Form::submit('บันทึก',['class'=>'btn btn-primary'])}}
            </div>
            {!!Form::close()!!}
          </div>
        </div>
      </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
    <script>console.log('Hi!');</script>
@endsection
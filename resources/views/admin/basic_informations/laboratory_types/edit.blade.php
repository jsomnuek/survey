@extends('layouts.admin')

@section('title','Dashboard | Laboratory Type')

@section('content_header')
    <h1>ข้อมูลประเภทห้องปฏิบัติการ</h1>
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
            {!!Form::open(['action'=>['BasicInformations\LaboratoryTypeController@update',$editLabType->id],'method'=>'PUT'])!!}
            <div class="card-body">
              <div class="form-group">
                {{Form::label('title','ชื่อประเภทห้องปฏิบัติการ')}}
                {{Form::text('labTypeName',$editLabType->lab_type_name,['class'=>'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('title','ชื่อย่อประเภทห้องปฏิบัติการ')}}
                {{Form::text('labTypeAbbr',$editLabType->lab_type_abbr,['class'=>'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('title','สถานะการใช้งานข้อมูล')}}
                {{Form::select('labTypeStatus',[
                  'A' => 'Active',
                  'D' => 'Disable',
              ],$editLabType->lab_type_status,['class' => 'form-control'])}}
              </div>
              <a href="/laboratoryType" class="btn btn-secondary">ย้อนกลับ</a>
              {{Form::hidden('_method','PUT')}}
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
    <script>console.log('Hi!');</script>
@stop
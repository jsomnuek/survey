@extends('layouts.admin')

@section('title','Dashboard | Equipment Objective Usage')

@section('content_header')
    <h1>วัตถุประสงค์การใช้งานเครื่องมือ</h1>
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
            {!!Form::open(['action'=>['BasicInformations\ObjectiveUsageController@update',$editObjUsage->id],'method'=>'PUT'])!!}
            <div class="card-body">
              <div class="form-group">
                {{Form::label('title','วัตถุประสงค์การใช้งานเครื่องมือ')}}
                {{Form::text('objUsageName',$editObjUsage->obj_usage_name,['class'=>'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('title','สถานะการใช้งานข้อมูล')}}
                {{Form::select('objUsageStatus',[
                  'A' => 'Active',
                  'D' => 'Disable',
              ],$editObjUsage->obj_usage_status,['class' => 'form-control'])}}
              </div>
              <a href="/objectiveUsage" class="btn btn-secondary">ย้อนกลับ</a>
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
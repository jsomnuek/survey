@extends('layouts.admin')

@section('title', 'Dashboard | Quality System')

@section('content_header')
    <h1>แก้ไขระบบคุณภาพของหน่วยงาน</h1>
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
            {!!Form::open(['action' => ['BasicInformations\QualitySystemController@update',$editQualitySystem->id],'method'=>'PUT'])!!}
            <div class="card-body">
              <div class="form-group">
                {{Form::label('qualitySystemName','รายการระบบคุณภาพ')}}
                {{Form::text('qualitySystemName',$editQualitySystem->quality_system_name,['class'=>'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('qualitySystemStatus', 'สถานะการใช้งานข้อมูล')}}
                {{Form::select('qualitySystemStatus',[
                  'A' => 'Active',
                  'D' => 'Disable',
              ], $editQualitySystem->quality_system_status,['class'=>'form-control'])}}
              </div>
              <a href="/qualitySystem" class="btn btn-secondary">ย้อนกลับ</a>
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
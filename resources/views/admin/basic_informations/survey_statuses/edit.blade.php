@extends('layouts.admin')

@section('title', 'Dashboard | Survey Status')

@section('content_header')
    <h1>แก้ไขสถานะแบบสำรวจ</h1>
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
            {!!Form::open(['action' => ['BasicInformations\SurveyStatusController@update',$editSurveyStatus->id],'method'=>'PUT'])!!}
            <div class="card-body">
              <div class="form-group">
                {{Form::label('surveyStatusName','รายการสถานะข้อมูลแบบสำรวจ')}}
                {{Form::text('surveyStatusName',$editSurveyStatus->survey_status_name,['class'=>'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('surveyStatusStatus', 'สถานะการใช้งานข้อมูล')}}
                {{Form::select('surveyStatusStatus',[
                  'A' => 'Active',
                  'D' => 'Disable',
              ], $editSurveyStatus->area_service_status,['class'=>'form-control'])}}
              </div>
              <a href="/surveyStatus" class="btn btn-secondary">ย้อนกลับ</a>
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
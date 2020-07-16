@extends('layouts.admin')

@section('title','Dashboard | Survey Status')
    
@section('content_header')
    <h1>สถานะแบบสำรวจ</h1>
@stop

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllSurveyStatus) > 0)
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width:80px;">ลำดับที่</th>
                        <th class="text-center">สถานะข้อมูลภาษาอังกฤษ</th>
                        <th class="text-center">สถานะข้อมูลภาษาไทย</th>
                        <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($showAllSurveyStatus as $surveyStatus)
                          <tr>
                            <td class="text-center">{{$surveyStatus->id}}</td>
                            <td>{{$surveyStatus->survey_status_name_en}}</td>
                            <td>{{$surveyStatus->survey_status_name_th}}</td>
                            <td class="text-center">{{$surveyStatus->survey_status_status}}</td>
                            <td><a href="/surveyStatus/{{$surveyStatus->id}}/edit" class="bth btn-primary btn-sm">แก้ไข</a></td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @else
                    <p>ไม่พบข้อมูล</p>
              @endif
            </div>
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

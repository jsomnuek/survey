@extends('layouts.admin')

@section('title', 'Dashboard | Testing Calibration Method')

@section('content_header')
    <h1>แก้ไขวิธีการทดสอบ/สอบเทียบ</h1>
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
            {!!Form::open(['action' => ['BasicInformations\TestingCalibratingMethodController@update',$editTCMethod->id],'method'=>'PUT'])!!}
            <div class="card-body">
              <div class="form-group">
                {{Form::label('little','วิธีการทดสอบ/สอบเทียบ')}}
                {{Form::text('tCMethodName',$editTCMethod->testing_method_name,['class'=>'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('title', 'สถานะการใช้งานข้อมูล')}}
                {{Form::select('tCMethodStatus',[
                  'A' => 'Active',
                  'D' => 'Disable',
              ], $editTCMethod->testing_method_status,['class'=>'form-control'])}}
              </div>
              <a href="/testingCalibratingMethod" class="btn btn-secondary">ย้อนกลับ</a>
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
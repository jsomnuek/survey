@extends('layouts.admin')

@section('title', 'Dashboard | Industrial Type')

@section('content_header')
    <h1>แก้ไขข้อมูลประเภทการทดสอบ/สอบเทียบ</h1>
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
            {!!Form::open(['action' => ['BasicInformations\TestingCalibratingTypeController@update',$editTCType->id],'method'=>'PUT'])!!}
            <div class="card-body">
              <div class="form-group">
                {{Form::label('little','ชื่อประเภทการทดสอบ/สอบเทียบ')}}
                {{Form::text('tCTypeName',$editTCType->testing_calibrating_type_name,['class'=>'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('title', 'สถานะการใช้งานข้อมูล')}}
                {{Form::select('tCTypeStatus',[
                  'A' => 'Active',
                  'D' => 'Disable',
              ], $editTCType->testing_calibrating_type_status,['class'=>'form-control'])}}
              </div>
              <a href="/testingCalibratingType" class="btn btn-secondary">ย้อนกลับ</a>
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
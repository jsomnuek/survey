@extends('layouts.admin')

@section('title', 'Dashboard | Countries')

@section('content_header')
    <h1>แก้ไขรายชื่อประเทศ</h1>
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
            {!!Form::open(['action' => ['BasicInformations\CountryController@update',$editCountry->id],'method'=>'PUT'])!!}
            <div class="card-body">
              <div class="form-group">
                {{Form::label('little','รหัสประเทศ')}}
                {{Form::text('countryCode',$editCountry->country_code,['class'=>'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('little','ชื่อประเทศภาษาไทย')}}
                {{Form::text('countryNameThai',$editCountry->country_name_thai,['class'=>'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('little','ชื่อประเทศภาษาอังกฤษ')}}
                {{Form::text('countryNameEng',$editCountry->country_name_eng,['class'=>'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('title', 'สถานะการใช้งานข้อมูล')}}
                {{Form::select('countryStatus',[
                  'A' => 'Active',
                  'D' => 'Disable',
              ], $editCountry->country_status,['class'=>'form-control'])}}
              </div>
              <a href="/country" class="btn btn-secondary">ย้อนกลับ</a>
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
@extends('layouts.admin')

@section('title', 'Dashboard | Industrial Type')

@section('content_header')
    <h1>แก้ไขรายการทดสอบความชำนาญ</h1>
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
            {!!Form::open(['action' => ['BasicInformations\ProficiencyTestingController@update',$editPT->id],'method'=>'PUT'])!!}
            <div class="card-body">
              <div class="form-group">
                {{Form::label('little','รายการทดสอบความชำนาญ')}}
                {{Form::text('pTName',$editPT->pt_name,['class'=>'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('title', 'สถานะการใช้งานข้อมูล')}}
                {{Form::select('pTStatus',[
                  'A' => 'Active',
                  'D' => 'Disable',
              ], $editPT->pt_status,['class'=>'form-control'])}}
              </div>
              <a href="/proficiencyTesting" class="btn btn-secondary">ย้อนกลับ</a>
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
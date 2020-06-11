@extends('layouts.admin')

@section('title', 'Dashboard | Employee Training')

@section('content_header')
    <h1>แก้ไขรายการจำนวนพนักงานที่ได้รับการฝึกอบรม</h1>
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
            {!!Form::open(['action' => ['BasicInformations\EmployeeTrainingController@update',$editEmpTraining->id],'method'=>'PUT'])!!}
            <div class="card-body">
              <div class="form-group">
                {{Form::label('little','ช่วงจำนวนเข้ารับการฝึกอบรม')}}
                {{Form::text('empTrainingDetail',$editEmpTraining->emp_training_detail,['class'=>'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('title', 'สถานะการใช้งานข้อมูล')}}
                {{Form::select('empTrainingStatus',[
                  'A' => 'Active',
                  'D' => 'Disable',
              ], $editEmpTraining->emp_training_status,['class'=>'form-control'])}}
              </div>
              <a href="/employeeTraining" class="btn btn-secondary">ย้อนกลับ</a>
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
@extends('layouts.admin')

@section('title', 'Dashboard | Fixed Costs')

@section('content_header')
    <h1>แก้ไขรายได้รวมต่อปี</h1>
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
            {!!Form::open(['action' => ['BasicInformations\IncomePerYearController@update',$editIncomePerYear->id],'method'=>'PUT'])!!}
            <div class="card-body">
              <div class="form-group">
                {{Form::label('little','ช่วงรายได้รวมต่อปี')}}
                {{Form::text('incomeDetail',$editIncomePerYear->income_detail,['class'=>'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('title', 'สถานะการใช้งานข้อมูล')}}
                {{Form::select('incomeStatus',[
                  'A' => 'Active',
                  'D' => 'Disable',
              ], $editIncomePerYear->income_status,['class'=>'form-control'])}}
              </div>
              <a href="/incomePerYear" class="btn btn-secondary">ย้อนกลับ</a>
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
@extends('layouts.app')

@section('title_name','แก้ไขข้อมูลนิคมอุตสาหกรรม')

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
        {!! Form::open(['action'=>['IndustrialEstateController@update', $editEstate->id], 'method' => 'PUT']) !!}
        <div class="card-body">
          <div class="form-group">
            {{Form::label('estateName','ชื่อนิคมอุตสาหกรรม')}}
            {{Form::text('estateName', $editEstate->estate_name, ['class'=>'form-control','required'])}}
          </div>
          <div class="form-group">
            {{Form::label('estateStatus','สถานะการใช้งานข้อมูล')}}
            {{-- {{Form::text('estateStatus', $editEstate->estate_status, ['class'=>'form-control','required'])}} --}}
            {{Form::select('estateStatus',[
              'A' => 'Active',
              'D' => 'Disable',
          ],$editEstate->estate_status,['class'=>'form-control'])}}
          </div>
          <a href="/industrialEstate"  class="btn btn-secondary">ย้อนกลับ</a>
          {{ Form::hidden('_method', 'PUT') }}
          {{ Form::submit('บันทึก',['class'=>'btn btn-primary']) }}
        </div>
        {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>

@endsection

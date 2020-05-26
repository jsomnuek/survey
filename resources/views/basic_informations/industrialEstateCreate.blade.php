@extends('layouts.app')

@section('title_name','เพิ่มข้อมูลนิคมอุตสาหกรรม')

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
        {!!Form::open(['action'=>'IndustrialEstateController@store','method'=>'POST', 'class' => 'was-validated'])!!}
        <div class="card-body">
          <div class="form-group">
            {{Form::label('title','ชื่อนิคมอุตสาหกรรม')}}
            {{Form::text('estateName','',['class'=>'form-control','required'])}}
          </div>
          <a href="/industrialEstate"  class="btn btn-secondary">ย้อนกลับ</a>
          {{Form::submit('บันทึก',['class'=>'btn btn-primary'])}}
        </div>
        {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>

@endsection

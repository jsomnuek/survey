@extends('layouts.admin')

@section('title', 'Dashboard | Organisation Type')
    
@section('content_header')
    <h1>ประเภทองค์กร</h1>
@stop

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
            {!!Form::open(['action' => 'BasicInformations\OrganisationTypeController@store','method' => 'POST','class' => 'was-validate'])!!}
            <div class="card-body">
              <div class="form-group">
                {{Form::label('title','ชื่อประเภทองค์กร')}}
                {{Form::text('orgTypeName','',['class' => 'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('title','ชื่อย่อประเภทองค์กร')}}
                {{Form::text('orgTypeAbbr','',['class' => 'form-control','required'])}}
              </div>
              <a href="/organisationType" class="btn btn-secondary">ย้อนกลับ</a>
              {{Form::submit('บันทึก',['class' => 'btn btn-primary'])}}
            </div>
            {!!Form::close()!!}
          </div>
        </div>
      </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>console.log('Hi');</script>
@stop
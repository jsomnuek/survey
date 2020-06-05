@extends('adminlte::page')

@section('title','Dashboard | Certify Laboratory')

@section('content_header')
    <h1>ข้อมูลการรับรองห้องปฏิบัติการ</h1>
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
            {!!Form::open(['action'=>['CertifyLaboratoryController@update',$editCertLab->id],'method'=>'PUT'])!!}
            <div class="card-body">
              <div class="form-group">
                {{Form::label('title','ชื่อการรับรองห้องปฏิบัติการ')}}
                {{Form::text('certLabName',$editCertLab->cert_lab_name,['class'=>'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('title','สถานะการใช้งานข้อมูล')}}
                {{Form::select('certLabStatus',[
                  'A' => 'Active',
                  'D' => 'Disable',
              ],$editCertLab->cert_lab_status,['class' => 'form-control'])}}
              </div>
              <a href="/certifyLaboratory" class="btn btn-secondary">ย้อนกลับ</a>
              {{Form::hidden('_method','PUT')}}
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
    <script>console.log('Hi!');</script>
@stop
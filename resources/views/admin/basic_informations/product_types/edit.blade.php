@extends('layouts.admin')

@section('title','Dashboard | Product Type')

@section('content_header')
    <h1>Product Types</h1>
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
            {!!Form::open(['action'=>['BasicInformations\ProductTypeController@update',$editProductType->id],'method'=>'PUT'])!!}
            <div class="card-body">
              <div class="form-group">
                {{Form::label('title','ชื่อประเภทผลิตภัณฑ์')}}
                {{Form::text('productTypeName',$editProductType->product_type_name,['class'=>'form-control','required'])}}
              </div>
              <div class="form-group">
                {{Form::label('title','สถานะการใช้งานข้อมูลประเภทผลิตภัณฑ์')}}
                {{Form::select('productTypeStatus',[
                  'A' => 'Active',
                  'D' => 'Disable',
              ],$editProductType->product_type_status,['class' => 'form-control'])}}
              </div>
              <a href="/productType" class="btn btn-secondary">ย้อนกลับ</a>
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
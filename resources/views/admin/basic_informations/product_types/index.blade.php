@extends('layouts.admin')

@section('title','Dashboard | Product Type')

@section('content_header')
  <h1>ข้อมูลประเภทผลิตภัณฑ์</h1>

  @stop

  @section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllProductType) > 0)
                <table class="table">
                  <thead>
                    <tr>
                      <th>ลำดับที่</th>
                      <th>ชื่อประเภทผลิตภัณฑ์</th>
                      <th>สถานะการใช้งาน</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($showAllProductType as $productType)
                    <tr>
                      <td>{{$productType->id}}</td>
                      <td>{{$productType->product_type_name}}</td>
                      <td>{{$productType->product_type_status}}</td>
                      <td><a href="/productType/{{$productType->id}}/edit" class="btn btn-primary btn-sm">แก้ไข</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @else
                  <p>ไม่พบข้อมูล</p>                  
              @endif
            </div>
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
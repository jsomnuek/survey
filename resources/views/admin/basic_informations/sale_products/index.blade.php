@extends('layouts.admin')

@section('title','Dashboard | Sale Product')
    
@section('content_header')
    <h1>รายการจำหน่ายสินค้า/บริการ</h1>
@stop

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllSaleProduct) > 0)
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width:80px;">ลำดับที่</th>
                        <th class="text-center">รายการจำหน่ายสินค้า/บริการ</th>
                        <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($showAllSaleProduct as $saleProduct)
                          <tr>
                            <td class="text-center">{{$saleProduct->id}}</td>
                            <td>{{$saleProduct->sale_product_name}}</td>
                            <td class="text-center">{{$saleProduct->sale_product_status}}</td>
                            <td><a href="/saleProduct/{{$saleProduct->id}}/edit" class="bth btn-primary btn-sm">แก้ไข</a></td>
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

@extends('layouts.admin')

@section('title','Dashboard | Fixed Costs')
    
@section('content_header')
    <h1>รายได้รวมต่อปี</h1>
@stop

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllIncomePerYear) > 0)
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width:80px;">ลำดับที่</th>
                        <th class="text-center">ช่วงรายได้รวมต่อปี</th>
                        <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($showAllIncomePerYear as $incomePerYear)
                          <tr>
                            <td class="text-center">{{$incomePerYear->id}}</td>
                            <td>{{$incomePerYear->income_detail}}</td>
                            <td class="text-center">{{$incomePerYear->income_status}}</td>
                            <td><a href="/incomePerYear/{{$incomePerYear->id}}/edit" class="bth btn-primary btn-sm">แก้ไข</a></td>
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

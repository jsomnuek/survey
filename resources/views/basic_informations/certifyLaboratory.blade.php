@extends('adminlte::page')

@section('title','Dashboard | Certify Laboratory')

@section('content_header')
  <h1>ข้อมูลการรับรองห้องปฏิบัติการ</h1>

  @stop

  @section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mb-2">
            <div class="card-body">
              @if (count($showAllCertLab) > 0)
                <table class="table">
                  <thead>
                    <tr>
                      <th>ลำดับที่</th>
                      <th>ชื่อการรับรองห้องปฏิบัติการ</th>
                      <th>สถานะการใช้งานข้อมูล</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($showAllCertLab as $certLab)
                    <tr>
                      <td>{{$certLab->id}}</td>
                      <td>{{$certLab->cert_lab_name}}</td>
                      <td>{{$certLab->cert_lab_status}}</td>
                      <td><a href="/certifyLaboratory/{{$certLab->id}}/edit" class="btn btn-primary btn-sm">แก้ไข</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @else
                  <p>no result</p>                  
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
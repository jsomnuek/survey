@extends('layouts.admin')

@section('title', 'Dashboard | Science Tool')

@section('content_header')
    <h1>ข้อมูลเครื่องมือวิทยาศาสตร์</h1>
@stop

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mb-2">
          <div class="card-body">
            @if (count($showAllScienceTool) > 0)
                <table class="table" id="dt1">
                  <thead>
                    <tr>
                      <th style="width:80px;">ลำดับที่</th>
                      <th class="text-center">ชื่อเครื่องมือวิทยาศาสตร์</th>
                      <th>ชื่อย่อเครื่องมือวิทยาศาสตร์</th>
                      <th style="width:180px;">สถานะการใช้งานข้อมูล</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($showAllScienceTool as $scienceTool)
                    <tr>
                      <td class="text-center">{{$scienceTool->id}}</td>
                      <td>{{$scienceTool->science_tool_name}}</td>
                      <td>{{$scienceTool->science_tool_abbr}}</td>
                      <td class="text-center">{{$scienceTool->science_tool_status}}</td>
                      <td><a href="/scienceTool/{{$scienceTool->id}}/edit" class="btn btn-primary btn-sm">แก้ไข</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{-- {{$showAllEquipment->links()}} --}}
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
    <script> console.log('Hi!'); </script>
@stop



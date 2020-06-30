@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <h2 for="" class="text-center">ระบบบันทึกข้อมูลการสำรวจห้องปฏิบัติการ</h2>
                    {{-- <h4 for="" class="text-center">กระทรวงการอุดมศึกษา วิทยาศาสตร์ วิจัยและนวัตกรรม</h4> --}}
                </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                        <div class="row-12 center">
                            <img class="img-fluid" src={{ asset('images/banner_1.png') }} alt="">
                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection

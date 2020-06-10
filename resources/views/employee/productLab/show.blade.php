@extends('layouts.admin')

@section('page')
    Product Create
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark">เพิ่มรายการทดสอบ/สอบเทียบ</h1>
@endsection

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-body">
                    <p>รหัสเอกสาร {{ $test->id }}</p>
                    <p>ชนิดผลิตฯ {{ $test->productType->product_type_name }}</p>              
                </div>

            </div>
            <!-- /.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection
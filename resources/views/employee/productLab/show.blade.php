@extends('layouts.admin')

@section('page')
    Product Create
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <!-- general form elements -->

            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">รายละเอียดรายการทดสอบ/สอบเทียบ</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <p>รหัสเอกสาร {{ $productLabs->id }}</p>
                    <p>ชนิดผลิตฯ {{ $productLabs->productType->product_type_name }}</p>              
                </div>
                <div class="card-footer">

                </div>

            </div>
            <!-- /.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection
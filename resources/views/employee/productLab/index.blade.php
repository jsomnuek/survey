@extends('layouts.admin')

@section('page')
    Organization
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark">Product Lab</h1>
@endsection

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">รายการทดสอบ/สอบเทียบทั้งหมด</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        @if (count($allProductLabs) > 0)
                        <thead>                  
                            <tr>
                                <th style="width: 10px">รหัสผลิตภัณฑ์</th>
                                <th>ชื่อผลิตภัณฑ์</th>
                                <th>ประเภทผลิตภัณฑ์</th>
                                <th style="width: 10em"><i class="fas fa-users-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allProductLabs as $allProductLab)
                            <tr>
                                <td>{{ $allProductLab->id }}</td>
                                <td>{{ $allProductLab->product_lab_name }}</td>
                                <td>{{ $allProductLab->productType->product_type_name }}</td>
                                <td><a href="/productLab/{{ $allProductLab->id }}" class="btn btn-primary btn-sm">ดูรายละเอียด</a></td>
                            </tr>                                
                            @endforeach
                        </tbody>
                        @else
                            <div class="text-center">
                                No Data!
                            </div>
                        @endif
                        
                    </table>
                </div>
                <!-- /.card-body -->
                @if (count($allProductLabs) > 10)
                    <div class="card-footer clearfix">
                        {{ $allProductLabs->links() }}
                    </div>
                @else
                    
                @endif
                <!-- /.card-footer -->
            </div>
            <!--/.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection


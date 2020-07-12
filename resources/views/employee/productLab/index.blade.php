@extends('layouts.admin')

@section('page')
    Product Lab
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="far fa-folder-open"></i> ข้อมูลผลิตภัณฑ์ และรายการทดสอบ/สอบเทียบ</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="productlabTable" class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
                        @if (count($productLabs) > 0)
                            <thead>                  
                                <tr>
                                    {{-- <th style="width: 10px;">ลำดับ</th> --}}
                                    <th>ห้องปฏิบัติการ</th>
                                    <th>ชื่อผลิตภัณฑ์ และรายการทดสอบ/สอบเทียบ</th>
                                    <th>status</th>
                                    <th><i class="fas fa-user-clock"></i></th>
                                </tr>
                            </thead>
                            <tbody id="items">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($productLabs as $item)
                                <tr>
                                    {{-- <td class="text-center">{{ $i++ }}</td> --}}
                                    <td>{{ $item->lab->lab_name }}</td>
                                    <td>                                    
                                        <a href="/productlab/{{ $item->id }}">
                                            <i class="far fa-hand-point-right"></i>
                                            {{ $item->product_lab_name }}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($item->completed == 1)
                                        <small class="badge badge-success">approved</small>                                            
                                        @else
                                        <small class="badge badge-secondary">pending</small>
                                        @endif
                                    </td>									
                                    <td>{{ $item->updated_at }}</td>                        
                                </tr>                                
                                @endforeach
                            </tbody>
                        @endif                        
                    </table>
                </div>
                <!--/.card-body -->
                <div class="card-footer clearfix">
                    <a href="/lab">
                        <i class="far fa-edit"></i> เพิ่มข้อมูลผลิตภัณฑ์ และรายการทดสอบ/สอบเทียบ
                    </a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!--/.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection

@section('scripts')
    <script src="{{ asset('js/custom-datatable/productlab.js') }}"></script>
@endsection


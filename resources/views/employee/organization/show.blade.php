@extends('layouts.admin')

@section('page')
    Organization Show
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">        
            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">รายละเอียดทั้งหมด</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">รหัสเอกสาร : {{ $org->id }}</li>
                        <li class="list-group-item">เจ้าของข้อมูล : {{ $org->user->name }}</li>
                        <li class="list-group-item">{{ $org->org_name }}</li>
                        <li class="list-group-item">{{ $org->org_name_level_1 }}</li>
                        <li class="list-group-item">{{ $org->org_name_level_2 }}</li>
                        <li class="list-group-item">{{ $org->org_code }}</li>
                        <li class="list-group-item">{{ $org->org_number }}</li>
                        @isset($org->labLocation->location_name)
                            <li class="list-group-item"> 
                                {{ $org->labLocation->location_name }}
                            </li>
                        @endisset
                        <li class="list-group-item"> 
                            {{ $org->lab_location_other }}
                        </li>
                        @isset($org->industrialEstate->estate_name)
                            <li class="list-group-item"> 
                                {{ $org->industrialEstate->estate_name }}
                            </li>
                        @endisset
                        <li class="list-group-item"> 
                            {{ $org->industrial_estate_other }}
                        </li>
                        <li class="list-group-item"> 
                            {{ $org->org_building }}
                        </li>
                        <li class="list-group-item"> 
                            {{ $org->org_floor }}
                        </li>
                        <li class="list-group-item"> 
                            {{ $org->org_address }}
                        </li>
                        <li class="list-group-item"> 
                            {{ $org->org_soi }}
                        </li>
                        <li class="list-group-item"> 
                            {{ $org->org_road }}
                        </li>
                        @isset($org->provinceInfoTa->tambon_t)
                            <li class="list-group-item"> 
                                {{ $org->provinceInfoTa->tambon_t }}
                            </li>
                        @endisset
                        @isset($org->provinceInfoAm->amphoe_t)
                            <li class="list-group-item"> 
                                {{ $org->provinceInfoAm->amphoe_t }}
                            </li>
                        @endisset
                        @isset($org->provinceInfoCh->changwat_t)
                            <li class="list-group-item"> 
                                {{ $org->provinceInfoCh->changwat_t }}
                            </li>
                        @endisset
                    </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="/organization" class="btn btn-secondary">ย้อนกลับ</a>
                    <a href="/organization/{{ $org->id }}/edit" class="btn btn-primary">แก้ไขข้อมูล</a>
                    <div class="float-right">
                        <a href="/organization/detailed/print-doc-{{ $org->id }}.html" target="_blank" class="btn btn-default">
                            <i class="fas fa-print"></i> Print
                        </a>
                        <a href="/organization/detailed/print-pdf-{{ $org->id }}.html" target="_blank" class="btn btn-default">
                            <i class="fas fa-file-pdf"></i> Generate PDF
                        </a>
                    </div>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->        
    </div>
    <!-- /.row -->
@endsection
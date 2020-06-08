@extends('layouts.admin')

@section('page')
    Organization Show
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark">Organization Show</h1>
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
                    <dl class="row">
                        <dt class="col-sm-3">รหัสข้อมูล</dt>
                        <dd class="col-sm-9">{{ $org->id }}</dd>
                        <dt class="col-sm-3">1.1 ชื่อหน่วยงาน :</dt>
                        <dd class="col-sm-9">{{ $org->org_name }}</dd>
                        <dt class="col-sm-3">1.2 รหัสหน่วยงาน (AABCC) :</dt>
                        <dd class="col-sm-9">{{ $org->org_code }}</dd>
                        <dt class="col-sm-3">1.3 หมายเลขประจำหน่วยงาน (ถ้ามี) :</dt>
                        <dd class="col-sm-9">{{ $org->org_number }}</dd>
                        <dt class="col-sm-3">1.4 ที่ตั้งของห้องปฏิบัติการ :</dt>
                        <dd class="col-sm-9">{{ $org->org_location }}</dd>
                        <dd class="col-sm-9 offset-sm-3">{{ $org->org_location_other }}</dd>
                        <dt class="col-sm-3">1.5 ที่อยู่ :</dt>
                        <dd class="col-sm-9">อาคาร : {{ $org->org_building }} ชั้น : {{ $org->org_floor }}</dd>
                        <dd class="col-sm-9 offset-sm-3">เลขที่ : {{ $org->org_address }} ซอย : {{ $org->org_soi }} ถนน : {{ $org->org_road }}</dd>
                        <dd class="col-sm-9 offset-sm-3">จังหวัด {{ $org->province_info_ch_id }}</dd>
                        <dd class="col-sm-9 offset-sm-3">เขต/อำเภอ {{ $org->province_info_am_id }}</dd>
                        <dd class="col-sm-9 offset-sm-3">แขวง/ตำบล {{ $org->province_info_ta_id }}</dd>
                        <dd class="col-sm-9 offset-sm-3">รหัสไปรษณีย์ {{ $org->org_postcode }}</dd>
                        <dd class="col-sm-9 offset-sm-3">โทรศัพท์ : {{ $org->org_phone }} โทรสาร : {{ $org->org_fax }}</dd>
                        <dd class="col-sm-9 offset-sm-3">อีเมล : {{ $org->org_email }} เว็บไซต์ : {{ $org->org_website }}</dd>
                        <dd class="col-sm-9 offset-sm-3">ละติจูด : {{ $org->org_lat }} ลองติจูด : {{ $org->org_long }}</dd>
                        <dt class="col-sm-3">1.6 ประเภทองค์กร :</dt>
                        <dd class="col-sm-9">{{ $org->org_type }} {{ $org->org_type_other }}</dd>
                        <dt class="col-sm-3">1.7 ประเภทกิจการ :</dt>
                        <dd class="col-sm-9">{{ $org->org_type_of_business }}</dd>
                        <dt class="col-sm-3">1.8 การจำหน่าย/ส่งออกสินค้า/บริการ :</dt>
                        <dd class="col-sm-9">{{ $org->org_distribution }} {{ $org->org_distribution_other }}</dd>
                        <dt class="col-sm-3">1.9 ทุนจดทะเบียน (ล้านบาท) :</dt>
                        <dd class="col-sm-9">{{ number_format($org->org_capital) }}</dd>
                        <dt class="col-sm-3">1.10 จำนวนบุคลากร (คน) :</dt>
                        <dd class="col-sm-9">{{ number_format($org->org_employee_amount) }}</dd>
                    </dl>
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
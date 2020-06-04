@extends('layouts.admin')

@section('page')
    Organization Edit
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark">Organization Edit</h1>
@endsection

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">ส่วนที่ 1 ข้อมูลองค์กรและภาพรวมของห้องปฎิบัติการ</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/organization/{{ $org->id }}" method="POST" role="form">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="org_name">ชื่อหน่วย</label>
                            <input type="text" name="org_name" class="form-control form-control-sm" id="org_name" placeholder="" value="{{ $org->org_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="org_number">หมายเลขประจำหน่วยงาน (ถ้ามี)</label>
                            <input type="text" name="org_number" class="form-control form-control-sm" id="org_number" placeholder="" value="{{ $org->org_number }}">
                        </div>
                        <div class="form-group">
                            <label for="org_building">อาคาร</label>
                            <input type="text" name="org_building" class="form-control form-control-sm" id="org_building" value="{{ $org->org_building }}" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="org_floor">ชั้น</label>
                            <input type="text" name="org_floor" class="form-control form-control-sm" id="org_floor" placeholder="" value="{{ $org->org_floor }}">
                        </div>
                        <div class="form-group">
                            <label for="org_address">เลขที่</label>
                            <input type="text" name="org_address" class="form-control form-control-sm" id="org_address" placeholder="" value="{{ $org->org_address }}" required>
                        </div>
                        <div class="form-group">
                            <label for="org_soi">ซอย</label>
                            <input type="text" name="org_soi" class="form-control form-control-sm" id="org_soi" placeholder="" value="{{ $org->org_soi }}">
                        </div>
                        <div class="form-group">
                            <label for="org_road">ถนน</label>
                            <input type="text" name="org_road" class="form-control form-control-sm" id="org_road" placeholder="" value="{{ $org->org_road }}">
                        </div>
                        <div class="form-group">
                            <label for="org_postcode">รหัสไปรษณีย์</label>
                            <input type="text" name="org_postcode" class="form-control form-control-sm" id="org_postcode" placeholder="" value="{{ $org->org_postcode }}" required>
                        </div>
                        <div class="form-group">
                            <label for="org_phone">โทรศัพท์</label>
                            <input type="text" name="org_phone" class="form-control form-control-sm" id="org_phone" placeholder="" value="{{ $org->org_phone }}" required>
                        </div>
                        <div class="form-group">
                            <label for="org_fax">โทรสาร</label>
                            <input type="text" name="org_fax" class="form-control form-control-sm" id="org_fax" placeholder="" value="{{ $org->org_fax }}">
                        </div>
                        <div class="form-group">
                            <label for="org_email">อีเมล</label>
                            <input type="email" name="org_email" class="form-control form-control-sm" id="org_email" placeholder="" value="{{ $org->org_email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="org_website">เว็บไซต์</label>
                            <input type="text" name="org_website" class="form-control form-control-sm" id="org_website" placeholder="" value="{{ $org->org_website }}">
                        </div>
                        <div class="form-group">
                            <label for="org_lat">ละติจูด</label>
                            <input type="text" name="org_lat" class="form-control form-control-sm" id="org_lat" placeholder="" value="{{ $org->org_lat }}">
                        </div>
                        <div class="form-group">
                            <label for="org_long">ลองติจูด</label>
                            <input type="text" name="org_long" class="form-control form-control-sm" id="org_long" placeholder="" value="{{ $org->org_long }}">
                        </div>
                        <div class="form-group">
                            <label for="org_capital">ทุนจดทะเบียน (ล้านบาท)</label>
                            <input type="text" name="org_capital" class="form-control form-control-sm" id="org_capital" placeholder="" value="{{ $org->org_capital }}">
                        </div>
                        <div class="form-group">
                            <label for="org_employee_amount">จำนวนบุคลากร (คน)</label>
                            <input type="text" name="org_employee_amount" class="form-control form-control-sm" id="org_employee_amount" placeholder="" value="{{ $org->org_employee_amount }}">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
                <!-- /.form end -->
            </div>
            <!-- /.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection
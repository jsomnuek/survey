@extends('layouts.admin')

@section('page')
    Product Create
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark">Product Create</h1>
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
                <form action="/organization" method="POST" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="org_name">ชื่อหน่วย</label>
                            <input type="text" name="org_name" class="form-control form-control-sm @error('org_name') is-invalid @enderror" id="org_name" placeholder="">
                            @error('org_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    {{-- <strong>text assignment</strong> --}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="org_number">หมายเลขประจำหน่วยงาน (ถ้ามี)</label>
                            <input type="text" name="org_number" class="form-control form-control-sm" id="org_number" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="org_building">อาคาร</label>
                            <input type="text" name="org_building" class="form-control form-control-sm" id="org_building" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="org_floor">ชั้น</label>
                            <input type="text" name="org_floor" class="form-control form-control-sm" id="org_floor" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="org_address">เลขที่</label>
                            <input type="text" name="org_address" class="form-control form-control-sm @error('org_address') is-invalid @enderror" id="org_address" placeholder="">
                            @error('org_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="org_soi">ซอย</label>
                            <input type="text" name="org_soi" class="form-control form-control-sm" id="org_soi" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="org_road">ถนน</label>
                            <input type="text" name="org_road" class="form-control form-control-sm" id="org_road" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="org_postcode">รหัสไปรษณีย์</label>
                            <input type="text" name="org_postcode" class="form-control form-control-sm @error('org_postcode') is-invalid @enderror" id="org_postcode" placeholder="">
                            @error('org_postcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="org_phone">โทรศัพท์</label>
                            <input type="text" name="org_phone" class="form-control form-control-sm @error('org_phone') is-invalid @enderror" id="org_phone" placeholder="">
                            @error('org_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="org_fax">โทรสาร</label>
                            <input type="text" name="org_fax" class="form-control form-control-sm" id="org_fax" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="org_email">อีเมล</label>
                            <input type="email" name="org_email" class="form-control form-control-sm @error('org_email') is-invalid @enderror" id="org_email" placeholder="">
                            @error('org_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="org_website">เว็บไซต์</label>
                            <input type="text" name="org_website" class="form-control form-control-sm" id="org_website" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="org_lat">ละติจูด</label>
                            <input type="text" name="org_lat" class="form-control form-control-sm" id="org_lat" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="org_long">ลองติจูด</label>
                            <input type="text" name="org_long" class="form-control form-control-sm" id="org_long" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="org_capital">ทุนจดทะเบียน (ล้านบาท)</label>
                            <input type="text" name="org_capital" class="form-control form-control-sm" id="org_capital" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="org_employee_amount">จำนวนบุคลากร (คน)</label>
                            <input type="text" name="org_employee_amount" class="form-control form-control-sm" id="org_employee_amount" placeholder="">
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
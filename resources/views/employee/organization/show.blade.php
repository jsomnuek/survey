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
                <div class="card-body table-responsive p-0" style="height: 400px;">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th class="" style="width: 30%;">1.1 ชื่อหน่วยงาน :</th>
                                <td>{{ $org->org_name }}</td>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">ชื่อหน่วยงานย่อย ระดับที่ 1 :</th>
                                <td>{{ $org->org_name_level_1 }}</td>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">ชื่อหน่วยงานย่อย ระดับที่ 2 :</th>
                                <td>{{ $org->org_name_level_2 }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">1.2 รหัสหน่วยงาน (AABCC) :</th>
                                <td>{{ $org->org_code }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">1.3 หมายเลขประจำหน่วยงาน :</th>
                                <td>{{ $org->org_number }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">1.4 ที่อยู่ :</th>
                                <td>{{ __('') }}</td>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">อาคาร</th>
                                <td>{{ $org->org_building }}</td>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">ชั้น</th>
                                <td>{{ $org->org_floor }}</td>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">เลขที่</th>
                                <td>{{ $org->org_address }}</td>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">ซอย</th>
                                <td>{{ $org->org_soi }}</td>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">ถนน</th>
                                <td>{{ $org->org_road }}</td>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">แขวง/ตำบล</th>
                                <td>{{ $org->provinceInfoTa->tambon_t }}</td>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">เขต/อำเภอ</th>
                                <td>{{ $org->provinceInfoAm->amphoe_t }}</td>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">จังหวัด</th>
                                <td>{{ $org->provinceInfoCh->changwat_t }}</td>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">รหัสไปรษณีย์</th>
                                <td>{{ $org->org_postcode }}</td>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">โทรศัพท์</th>
                                <td>{{ $org->org_phone }}</td>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">โทรสาร</th>
                                <td>{{ $org->org_fax }}</td>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">อีเมล</th>
                                <td>{{ $org->org_email }}</td>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">เว็บไซต์</th>
                                <td><a href="http://{{ $org->org_website }}" target="_bank">{{ $org->org_website }}</a></td>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">ละติจูด</th>
                                <td>{{ $org->org_lat }}</td>
                            </tr>
                            <tr>
                                <th class="pl-5" style="width: 30%;">ลองจิจูด</th>
                                <td>{{ $org->org_long }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">1.5 ทุนจดทะเบียน (ล้านบาท) :</th>
                                <td>{{ number_format($org->org_capital) }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">1.6 จำนวนบุคลากร (คน) :</th>
                                <td>{{ number_format($org->org_employee_amount) }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">1.7 การจำหน่าย/ส่งออกสินค้า/บริการ :</th>
                                <td>
                                    @forelse ($org->saleProducts as $item)
                                        <li>{{ $item->sale_product_name }}</li>
                                    @empty
                                        
                                    @endforelse
                                    <ol>
                                        @forelse ($org->countrys as $item)
                                            <li>{{ $item->country_name_thai }}</li>
                                        @empty

                                        @endforelse
                                    </ol>
                                </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">1.8 ประเภทองค์กร :</th>
                                <td>
                                    @if (($org->organisationType->id) != 5)
                                        {{ $org->organisationType->org_type_name }}
                                    @else
                                        
                                    @endif
                                    @switch(5)
                                        @case($org->organisationType->id)
                                            {{ $org->organisation_type_other }}
                                            @break
                                        @default
                                            
                                    @endswitch
                                </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">1.9 ประเภทกิจการ :</th>
                                <td>{{ $org->businessType->business_type_name }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">1.10 ประเภทอุตสาหกรรม :</th>
                                <td>
                                    @forelse ($org->industrialTypes as $item)
                                        @if (($item->id) != 39)
                                            <li>{{ $item->industrial_type_name }}</li>
                                        @else
                                            
                                        @endif
                                        
                                    @empty
                                        
                                    @endforelse
                                    @if ($org->industrial_type_other != null)
                                        <li>{{ $org->industrial_type_other }}</li>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="/organization" class="btn btn-secondary">ย้อนกลับ</a>
                    <a href="/organization/{{ $org->id }}/edit" class="btn btn-primary">แก้ไขข้อมูล</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->        
    </div>
    <!-- /.row -->
@endsection
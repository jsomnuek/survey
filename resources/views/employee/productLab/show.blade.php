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
                <div class="card-body table-responsive p-0" style="height: 400px;">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th class="" style="width: 30%;">4.1 ชื่อผลิตภัณฑ์ที่ทดสอบ/สอบเทียบ :</th>
                                <td>{{ $productLabs->product_lab_name }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.2 ประเภทผลิตภัณฑ์</th>
                                <td>
                                    @forelse ($productLabs->productTypes as $item)
                                        <li>{{ $item->product_type_name }}</li>
                                    @empty

                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.3 มาตราฐานผลิตภัณฑ์ :</th>
                                <td>{{ $productLabs->product_lab_standard }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.4 ชื่อรายการทดสอบ/สอบเทียบ :</th>
                                <td>{{ $productLabs->product_lab_test_name }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.5 เครื่องมือที่ใช้ทดสอบ/สอบเทียบ :</th>
                                <td>ยังไม่สมบูรณ์----{{ $productLabs->product_lab_test_name }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.6 ประเภทรายการทดสอบ/สอบเทียบ :</th>
                                <td>{{ $productLabs->testingCalibratingList->testing_list_name }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.7 ประเภทการทดสอบ/สอบเทียบ :</th>
                                <td>{{ $productLabs->testingCalibratingType->testing_calibrating_type_name }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.8 วิธีทดสอบ/สอบเทียบตามมาตราฐาน :</th>
                                <td>{{ $productLabs->testingCalibratingMethod->testing_method_name }} รายละเอียด : {{$productLabs->testing_calibrating_method_detail}}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.9 ช่วงความสามารถของการวัด :</th>
                                <td>{{ $productLabs->product_lab_test_unit }}</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.10 ระยะเวลาการทดสอบ :</th>
                                <td>{{ $productLabs->product_lab_test_duration }} วัน</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.11 ค่าธรรมเนียมในการทดสอบ :</th>
                                <td>{{ $productLabs->product_lab_test_fee }} บาท</td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.12 วัสดุอ้างอิงที่ใช้ทดสอบ :</th>
                                <td>{{ $productLabs->product_lab_material_ref }} </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.13 ที่มาของแหล่งวัสดุอ้างอิงที่ใช้ทดสอบ :</th>
                                <td>{{ $productLabs->product_lab_material_ref_from }} </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.14 การควบคุมคุณภาพผลการทดสอบภายใน :</th>
                                <td>
                                    @forelse ($productLabs->resultControls as $item)
                                        <li>{{ $item->result_control_name }}</li>
                                    @empty

                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.15 การทดสอบความชำนาญห้องปฏิบัติการ :</th>
                                <td>
                                    @if ($productLabs->proficiency_testing == 1 )
                                        ยังไม่ได้ทดสอบความชำนาญห้องปฎิบัติการ
                                    @else
                                        มีการทดสอบความชำนาญห้องปฏิบัติการ  โดย{{ $productLabs->proficiency_testing_by }} เมื่อปี {{ $productLabs->proficiency_testing_year }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="" style="width: 30%;">4.16 การรับรองความสามารถห้องปฏิบัติการ :</th>
                                <td>{{ $productLabs->certifyLaboratory->cert_lab_name }} </td>
                            </tr>
                            
                            {{-- <tr>
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
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="/productLab" class="btn btn-secondary">ย้อนกลับ</a>
                    <a href="/productLab/{{ $productLabs->id }}/edit" class="btn btn-primary">แก้ไขข้อมูล</a>
                </div>

            </div>
            <!-- /.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection
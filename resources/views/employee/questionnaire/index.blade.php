@extends('layouts.admin')

@section('page')
	Questionnaire
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-primary card-outline">
				<h3 class="card-title"><i class="far fa-folder-open"></i> ข้อมูลการส่งและการตรวจสอบสถานะ</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<div class="card card-primary card-outline card-outline-tabs">
					<div class="card-header p-0 border-bottom-0">
						<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="custom-tabs-four-lab-tab" data-toggle="pill" href="#custom-tabs-four-lab" role="tab" aria-controls="custom-tabs-four-lab" aria-selected="true">
									รายการสถานะทั้งหมด
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="custom-tabs-four-labJuly-tab" data-toggle="pill" href="#custom-tabs-four-labJuly" role="tab" aria-controls="custom-tabs-four-labJuly" aria-selected="false">
									รายการสถานะเดือนกรกฎาคม
									<span class="badge badge-primary">{{ count($labJuly) }}</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="custom-tabs-four-labAugust-tab" data-toggle="pill" href="#custom-tabs-four-labAugust" role="tab" aria-controls="custom-tabs-four-labAugust" aria-selected="false">
									รายการสถานะเดือนสิงหาคม
									<span class="badge badge-primary">{{ count($labAugust) }}</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="custom-tabs-four-labSeptember-tab" data-toggle="pill" href="#custom-tabs-four-labSeptember" role="tab" aria-controls="custom-tabs-four-labSeptember" aria-selected="false">
									รายการสถานะเดือนกันยายน
									<span class="badge badge-primary">{{ count($labSeptember) }}</span>
								</a>
							</li>
						</ul>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content" id="custom-tabs-four-tabContent">
							<div class="tab-pane fade active show" id="custom-tabs-four-lab" role="tabpanel" aria-labelledby="custom-tabs-four-lab-tab">
								<table id="dt1" class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
									@if (count($labs) > 0)
										<thead>                  
											<tr>
												<th style="width: 10px;">ลำดับ</th>
												<th>รายการชุดข้อมูลห้องปฏิบัติการ</th>
												<th>สถานะ</th>
												<th>วันที่ส่งข้อมูล</th>
												<th><i class="fas fa-user-cog"></i></th>
											</tr>
										</thead>
										<tbody id="items">
											@php
												$i = 1;
											@endphp
											@foreach ($labs as $lab)
											<tr>
												<td class="text-center">{{ $i++ }}</td>
												<td>
													รหัสห้องปฏิบัติการ: <mark>{{ $lab->lab_code }}</mark>
												</td>
												<td>
													@switch($lab->survey_status_id)
														@case(1)
															<small class="badge badge-secondary">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@case(2)
															<small class="badge badge-primary">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@case(3)
															<small class="badge badge-info">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@case(4)
															<small class="badge badge-success">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@case(5)
															<small class="badge badge-warning">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@default
													@endswitch												
												</td>
												<td>{{ $lab->send_date }}</td>
												<td>
													@if ($lab->surveyStatus->id == 1 || $lab->surveyStatus->id == 3)
														<a href="/questionnaire/{{$lab->id}}">
															<i class="far fa-share-square"></i> ส่งข้อมูล
														</a>
													@endif													
												</td>
											</tr>                                
											@endforeach
										</tbody>						
									@endif						
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane fade" id="custom-tabs-four-labJuly" role="tabpanel" aria-labelledby="custom-tabs-four-labJuly-tab">
								<table id="" class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
									@if (count($labJuly) > 0)
										<thead>                  
											<tr>
												<th style="width: 10px;">ลำดับ</th>
												<th>รายการชุดข้อมูลห้องปฏิบัติการ</th>
												<th>สถานะ</th>
												<th>วันที่ส่งข้อมูล</th>
												<th><i class="fas fa-user-cog"></i></th>
											</tr>
										</thead>
										<tbody id="items">
											@php
												$i = 1;
											@endphp
											@foreach ($labJuly as $lab)
											<tr>
												<td class="text-center">{{ $i++ }}</td>
												<td>
													รหัสห้องปฏิบัติการ: <mark>{{ $lab->lab_code }}</mark>
												</td>
												<td>
													@switch($lab->survey_status_id)
														@case(1)
															<small class="badge badge-secondary">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@case(2)
															<small class="badge badge-primary">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@case(3)
															<small class="badge badge-info">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@case(4)
															<small class="badge badge-success">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@case(5)
															<small class="badge badge-warning">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@default
													@endswitch												
												</td>
												<td>{{ $lab->send_date }}</td>
												<td>
													<a href="/questionnaire/{{$lab->id}}">
														<i class="far fa-eye"></i> ดูรายละเอียด
													</a>													
												</td>
											</tr>                                
											@endforeach
										</tbody>						
									@endif						
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane fade" id="custom-tabs-four-labAugust" role="tabpanel" aria-labelledby="custom-tabs-four-labAugust-tab">
								<table id="" class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
									@if (count($labAugust) > 0)
										<thead>                  
											<tr>
												<th style="width: 10px;">ลำดับ</th>
												<th>รายการชุดข้อมูลห้องปฏิบัติการ</th>
												<th>สถานะ</th>
												<th>วันที่ส่งข้อมูล</th>
												<th><i class="fas fa-user-cog"></i></th>
											</tr>
										</thead>
										<tbody id="items">
											@php
												$i = 1;
											@endphp
											@foreach ($labAugust as $lab)
											<tr>
												<td class="text-center">{{ $i++ }}</td>
												<td>
													รหัสห้องปฏิบัติการ: <mark>{{ $lab->lab_code }}</mark>
												</td>
												<td>
													@switch($lab->survey_status_id)
														@case(1)
															<small class="badge badge-secondary">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@case(2)
															<small class="badge badge-primary">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@case(3)
															<small class="badge badge-info">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@case(4)
															<small class="badge badge-success">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@case(5)
															<small class="badge badge-warning">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@default	
													@endswitch												
												</td>
												<td>{{ $lab->send_date }}</td>
												<td>
													<a href="/questionnaire/{{$lab->id}}">
														<i class="far fa-eye"></i> ดูรายละเอียด
													</a>													
												</td>
											</tr>                                
											@endforeach
										</tbody>						
									@endif						
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane fade" id="custom-tabs-four-labSeptember" role="tabpanel" aria-labelledby="custom-tabs-four-labSeptember-tab">
								<table id="" class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
									@if (count($labSeptember) > 0)
										<thead>                  
											<tr>
												<th style="width: 10px;">ลำดับ</th>
												<th>รายการชุดข้อมูลห้องปฏิบัติการ</th>
												<th>สถานะ</th>
												<th>วันที่ส่งข้อมูล</th>
												<th><i class="fas fa-user-cog"></i></th>
											</tr>
										</thead>
										<tbody id="items">
											@php
												$i = 1;
											@endphp
											@foreach ($labSeptember as $lab)
											<tr>
												<td class="text-center">{{ $i++ }}</td>
												<td>
													รหัสห้องปฏิบัติการ: <mark>{{ $lab->lab_code }}</mark>
												</td>
												<td>
													@switch($lab->survey_status_id)
														@case(1)
															<small class="badge badge-secondary">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@case(2)
															<small class="badge badge-primary">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@case(3)
															<small class="badge badge-info">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@case(4)
															<small class="badge badge-success">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@case(5)
															<small class="badge badge-warning">
																{{ $lab->surveyStatus->survey_status_name_th }}
															</small>
															@break
														@default	
													@endswitch												
												</td>
												<td>{{ $lab->send_date }}</td>
												<td>
													<a href="/questionnaire/{{$lab->id}}">
														<i class="far fa-eye"></i> ดูรายละเอียด
													</a>													
												</td>
											</tr>                                
											@endforeach
										</tbody>						
									@endif						
								</table>
							</div>
							<!-- /.tab-pane -->
						</div>
						<!-- /.tab-content -->
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.card-body -->
		</div>
		<!--/.card -->			
	</div>
	<!--/.col -->
</div>
<!--/.row -->
@endsection

@section('modal')

@endsection

@section('scripts')

@endsection



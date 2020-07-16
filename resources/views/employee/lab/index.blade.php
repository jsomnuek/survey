@extends('layouts.admin')

@section('page')
	Laboratory
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark"></h1>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title"><i class="far fa-folder-open"></i> ข้อมูลห้องปฏิบัติการ</h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fas fa-minus"></i>
						</button>
					</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="labTable" class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
						@if (count($labs) > 0)
							<thead>                  
								<tr>
									{{-- <th style="width: 10px;">ลำดับ</th> --}}
									<th>ชื่อองค์กร</th>
									<th>ชื่อห้องปฏิบัติการ : รหัสห้องปฏิบัติการ</th>
									<th>สถานะ</th>
									<th><i class="fas fa-user-clock"></i></th>
									<th><i class="fas fa-user-cog"></i></th>
									<th><i class="fas fa-user-cog"></i></th>
								</tr>
							</thead>
							<tbody id="items">
								@php
									$i = 1;
								@endphp
								@foreach ($labs as $lab)
								<tr>
									{{-- <td class="text-center">{{ $i++ }}</td> --}}
									<td>
										{{ $lab->organization->org_name }} 
										@if(!empty($lab->organization->org_name_level_1)){{ ' : '.$lab->organization->org_name_level_1 }}@else @endif 
										@if(!empty($lab->organization->org_name_level_2)){{ ' : '.$lab->organization->org_name_level_2 }}@else @endif
										: <mark>{{ $lab->organization->org_code }}</mark>
									</td>
									<td>
										<a href="/lab/{{ $lab->id }}">
											<i class="far fa-hand-point-right"></i> {{ $lab->lab_name }} 
											: <mark>{{ $lab->lab_code }}</mark>
										</a>
									</td>
									<td>
										@if ($lab->completed == 0)
										<small class="badge badge-secondary">บันทึกข้อมูล</small>                                            
										@else
										<small class="badge badge-primary">ส่งข้อมูล</small>
                                        @endif
									</td>									
									<td>{{ $lab->updated_at }}</td>									
									<td>
										<a href="{{ route('equipment.create-lab-id', $lab->id) }}">
                                            <i class="far fa-edit"></i> เพิ่มเครื่องมือวิทยาศาสตร์
                                        </a>
									</td>
									<td>
										@if (count($lab->equipments) > 0)
										<a href="{{ route('productlab.create-lab-id', $lab->id) }}">
                                            <i class="far fa-edit"></i> เพิ่มผลิตภัณฑ์ และรายการทดสอบ/สอบเทียบ
                                        </a>
										@endif										
									</td>
								</tr>                                
								@endforeach
							</tbody>						
						@endif						
					</table>
				</div>
				<!-- /.card-body -->
				<div class="card-footer clearfix">
                    <a href="/organization">
                        <i class="far fa-edit"></i> เพิ่มข้อมูลห้องปฏิบัติการ
                    </a>
                </div>
                <!--/.card-footer -->
			</div>
			<!--/.card -->
		</div>
		<!--/.col -->
	</div>
	<!--/.row -->
@endsection

@section('scripts')
    <script src="{{ asset('js/custom-datatable/lab.js') }}"></script>
@endsection



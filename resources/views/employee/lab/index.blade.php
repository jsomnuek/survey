
@extends('layouts.admin')

@section('page')
    Laboratory Data
@endsection

@section('header-box-1')
    <h1 class="m-0 text-dark">Laboratory Data</h1>
@endsection

@section('content')
	<div class="row">
		<!-- column -->
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">ข้อมูลทั้งหมด</h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fas fa-minus"></i>
						</button>
					</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table class="table table-bordered">
						@if (count($labs) > 0)
						<thead>                  
							<tr>
								<th style="width: 10px">รหัส</th>
								<th>ชื่อห้องปฏิบัติการ</th>
								<th>ผู้บันทึกข้อมูล</th>
								<th style=""></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($labs as $lab)
							<tr>
								<td>{{ $lab->id }}</td>
								<td>{{ $lab->lab_name }}</td>
								<td>
									<a href="/labs/{{ $lab->id }}" class="btn btn-primary btn-sm">ดูรายละเอียด</a>
								</td>
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
				@if (count($labs) > 10)
					<div class="card-footer clearfix">
						{{ $labs->links() }}
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



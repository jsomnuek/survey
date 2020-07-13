@extends('layouts.admin')

@section('page')
    Show Unapproved Questionnaire Details
@endsection

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <!-- general form elements -->

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">รายละเอียดแบบสอบถามที่รอการอนุมัติ</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="dt1" class="table table-bordered table-hover table-sm display" cellspacing="0" width="100%">
                        @if (count($orgs) > 0)
                            <thead>                  
                                <tr>
                                    <th style="width: 10px;">ลำดับ</th>
                                    <th>ชื่อองค์กร</th>
                                    <th>status</th>
                                    <th><i class="fas fa-user-clock"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($orgs as $org)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td>
                                        <a href="/organization/{{ $org->id }}">
                                            <i class="far fa-hand-point-right"></i> {{ $org->org_name }} 
                                            @if(!empty($org->org_name_level_1)){{ ' : '.$org->org_name_level_1 }}@else @endif 
                                            @if(!empty($org->org_name_level_2)){{ ' : '.$org->org_name_level_2 }}@else @endif                                            
                                        </a>
                                    </td>
                                    <td>
                                        @if ($org->completed == 1)
										<small class="badge badge-success">approved</small>                                            
										@else
										<small class="badge badge-secondary">pending</small>
                                        @endif
                                    </td>									
									<td>{{ $org->updated_at }}</td>
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
            </div>
            <!-- /.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection
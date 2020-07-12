@extends('layouts.admin')

@section('page')
    Show Unapproved Questionnaire Details
@endsection

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <!-- general form elements -->

            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">รายละเอียดแบบสอบถามที่รอการอนุมัติ</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection
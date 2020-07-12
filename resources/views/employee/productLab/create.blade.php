@extends('layouts.admin')

@section('page')
    Create Product Lab
@endsection

@section('header-box-1')
    {{-- <h1 class="m-0 text-dark">เพิ่มรายการทดสอบ/สอบเทียบ</h1> --}}
@endsection

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">ส่วนที่ 4 ผลิตภัณฑ์ และรายการทดสอบ/สอบเทียบ</h3>
                </div>
                <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="">เลือกห้องปฏิบัติการ</label>
                                <select class="form-control  custom-select select2  @error('lab_id') is-invalid @enderror" name="lab_id" id="lab_id" data-value="{{ old('lab_id') }}">
                                    <option value=""></option>
                                    @foreach ($labs ?? '' as $lab)
                                        <option value="{{$lab->id}}" {{ old('lab_id') ==  $lab->id ? 'selected' : ''}} > {{$lab->lab_name}} </option>
                                    @endforeach
                                </select>
                                @error('lab_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        {{-- <strong>text assignment</strong> --}}
                                    </span>
                                @enderror
                                </div>    
                            </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">4.2 ประเภทผลิตภัณฑ์ (เลือกได้มากกว่า 1 คำตอบ) : <span><sup class="text-danger"> *</sup></span></label>
                                    <select class="form-control custom-select select2 @error('product_type_id') is-invalid @enderror" multiple="multiple" name="product_type_id[]" id="product_type_id" data-value="{{ old('product_type_id[]') }}">
                                        <option value="" disabled="disabled">disabled</option>
                                        @foreach ($productTypes ?? '' as $productType)
                                            <option value="{{ $productType->id }}" {{ in_array($productType->id, old('product_type_id') ? : []) ? 'selected' : '' }}>{{ $productType->product_type_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('product_type_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        {{-- <strong>text assignment</strong> --}}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group d-none"  id="display_product_type_other" >
                                    <label for="">อื่นๆ โปรดระบุ : </label>
                                    <input class="form-control form-control" type="text" name="product_type_other" id="product_type_other" placeholder="หากเลือกอื่นๆ โปรดระบุรายละเอียด" value="{{ old('product_type_other')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">4.3 มาตราฐานผลิตภัณฑ์ : </label>
                                    <input type="text" name="product_lab_standard" class="form-control " id="product_lab_standard" placeholder="" value="{{ old('product_lab_standard')}}">
                                </div>
                            </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                        <a href="/productLab" class="btn btn-secondary btn-lg">
                        <i class="fas fa-edit"></i>
                            ย้อนกลับ
                        </a>
                        <button type="submit" class="btn btn-primary btn-lg">
                            เพิ่มข้อมูล
                            <i class="fas fa-save"></i>
                        </button>
                        </div>
                    </div>
                    <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!--/.col -->
    </div>
    <!--/.row -->
@endsection

@section('scripts')
    <script src="{{ asset('js/components.js') }}"></script>
    <script src="{{ asset('js/form-productLab.js') }}"></script>
    <script type="text/javascript">
        // 4.2
        $('#product_type_id').val(json_encode($productTypes));
        $('#product_type_id').trigger('change');
        // 4.14 
        $('#result_control_id').val(json_encode($resultControls));
        $('#result_control_id').trigger('change');

        $('#testing_calibrating_type_id').val($testingCalibratingType->id);
        $('#testing_calibrating_type_id').trigger('change');

        $('#proficiency_testing').val(1);
        $('#proficiency_testing').trigger('change');

        $('#equipments_id').val(json_encode($equipments));
        $('#equipments_id').trigger('change')

    </script>
@endsection
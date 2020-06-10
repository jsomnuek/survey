@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {!!Form::open(['action'=>'TechnicalEquipmentController@store','method'=>'POST'])!!}
                <div class="card-header">
                    <h1 class="card-title">ORGANIZE INDEX</h1>
                </div>
        
                <div class="card-body">
                  {{-- 1.1 orgName--}}
                  <div class="row form-group">
                      <div class="col-md-12">
                            {{Form::label('title','1.1 ชื่อหน่วยงาน')}}
                            {{Form::text('orgName','',['class'=>'form-control','required'])}}
                      </div>
                  </div>
                  {{-- 1.2orgID /1.3orgCode --}}
                  <div class="row form-group">
                      <div class="col-md-6">
                            {{Form::label('title','1.2 รหัสหน่วยงาน (AABCC)')}}
                            {{Form::text('orgCode','',['class'=>'form-control','required'])}}
                      </div>
                      <div class="col-md-6">
                            {{Form::label('title','1.3 หมายเลขประจำหน่วยงาน (ถ้ามี)')}}
                            {{Form::text('orgNumber','',['class'=>'form-control'])}}
                      </div>
                  </div>
                  {{-- 1.4orgEstate--}}
                  <div class="row form-group">
                    <div class="col-md-12">
                          {{Form::label('title','1.4 ที่ตั้งของห้องปฏิบัติการ')}}
                          <select class="form-control" name="orgLocation" id="orgLocation">
                            <option>เลือกที่ตั้งของห้องปฏิบัติการ</option>
                              @foreach ($showAllOrg as $LabsData)
                                <option value="{{$LabsData->estate_name}}"> {{$LabsData->estate_name}} </option>
                              @endforeach
                          </select>
                    </div>
                  </div>
                  {{-- 1.5orgAddress --}}
                  <label for="">1.5 ที่อยู่</label>
                  <div class="row form-group">
                      <div class="col-md-6">
                        {{Form::label('title','อาคาร')}}
                        {{Form::text('orgBuildding','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-6">
                        {{Form::label('title','ชั้น')}}
                        {{Form::text('orgFloor','',['class'=>'form-control',''])}}
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-4">
                        {{Form::label('title','เลขที่')}}
                        {{Form::text('orgAddress','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-4">
                        {{Form::label('title','ถนน')}}
                        {{Form::text('orgRoad','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-4">
                        {{Form::label('title','ซอย')}}
                        {{Form::text('orgSoi','',['class'=>'form-control',''])}}
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-3">
                        {{Form::label('title','รหัสไปรษณีย์')}}
                        {{Form::text('orgPostcode','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-3">                        
                        <label for="">จังหวัด</label>
                        <select class="custom-select" name="changwats" id="changwats">
                          <option value="" selected>-- โปรดเลือก --</option>
                        </select>
                      </div>
                      <div class="col-md-3">
                        <label for="">เขต/อำเภอ</label>
                        <select class="custom-select" name="amphoes" id="amphoes">
                          <option value="" selected>-- โปรดเลือก --</option>
                        </select>
                      </div>
                      <div class="col-md-3">
                        <label for="">แขวง/ตำบล</label>
                        <select class="custom-select" name="tambons" id="tambons">
                          <option value="" selected>-- โปรดเลือก --</option>
                        </select>
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-3">
                        {{Form::label('title','โทรศัพท์')}}
                        {{Form::text('orgPhone','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-3">
                        {{Form::label('title','โทรสาร')}}
                        {{Form::text('orgFax','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-3">
                        {{Form::label('title','Email')}}
                        {{Form::text('orgEmail','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-3">
                        {{Form::label('title','Website')}}
                        {{Form::text('orgWebsite','',['class'=>'form-control',''])}}
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-6">
                        {{Form::label('title','ละติจูด')}}
                        {{Form::text('orgLat','',['class'=>'form-control',''])}}
                      </div>
                      <div class="col-md-6">
                        {{Form::label('title','ลองติจูด')}}
                        {{Form::text('orgLong','',['class'=>'form-control',''])}}
                      </div>
                  </div>
                  {{-- END 1.5 --}}

                  {{-- 1.6orgType /1.7orgBusiness --}}
                  <div class="row form-group">
                    <div class="col-md-6">
                      {{Form::label('title','1.6 ประเภทองค์กร')}}
                      <select class="form-control" name="orgType" id="orgType" >
                        <option>เลือกประเภทองค์กร</option>
                          @foreach ($showAllOrg as $orgType)
                            <option value="{{$orgType->estate_name}}"> {{$orgType->estate_name}} </option>
                          @endforeach
                      </select>
                    </div>
                    <div class="col-md-6">
                      {{Form::label('title','1.7 ประเภทกิจการ')}}
                      <select class="form-control" name="orgฺBusiness" id="orgBusiness" >
                        <option>เลือกประเภทกิจการขององค์กร</option>
                          @foreach ($showAllOrg as $orgType)
                            <option value="{{$orgType->estate_name}}"> {{$orgType->estate_name}} </option>
                          @endforeach
                      </select>
                    </div>
                      
                  </div>
                  {{-- 1.8orgExport /1.9orgRegisterCapital /1.10orgMember --}}
                  <div class="row form-group">
                      <div class="col-md-4">         
                        {{Form::label('title','1.8 การจำหน่าย - ส่งออก')}}
                        {{Form::select('orgImportExport',[
                            '1' => 'ไม่มีส่งออก',
                            '2' => 'ยุโรป',
                            '3' => 'อื่นๆ'
                        ],'',['class'=>'form-control js-example-basic-single'])}}
                      </div>
                      <div class="col-md-4">
                        {{Form::label('title','1.9 ทุนจดทะเบียน')}}
                        {{Form::number('orgCapital','',['class'=>'form-control'])}}
                      </div>
                      <div class="col-md-4">
                        {{Form::label('title','1.10 จำนวนบุคลากรในหน่วยงาน')}}
                        {{Form::number('orgEmployee','',['class'=>'form-control'])}}
                      </div>

                  </div>  
                  {{-- 1.11orgIndustrialType --}}
                  <div class="row form-group">
                    <div class="col-md-12">
                      {{Form::label('title','1.11 ประเภทอุตสาหกรรม')}}
                      <select class="form-control" name="orgIndustrialType" id="orgIndustrialType" >
                        <option>เลือกประเภทองค์กร</option>
                          @foreach ($showAllOrg as $orgType)
                            <option value="{{$orgType->estate_name}}"> {{$orgType->estate_name}} </option>
                          @endforeach
                      </select>
                    </div>
                  </div>  

                </div>
                <div class="card-footer">
                    <a href="/technicalEquipment"  class="btn btn-secondary">ย้อนกลับ</a>
                    {{Form::submit('บันทึก',['class'=>'btn btn-primary'])}}
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
  $(document).ready(function() {

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      function showChangwats () {
          $.ajax({
              url: "{{ route('changwats') }}",
              type: 'GET',
              dataType: 'JSON',
              success: function (data) {
                  // console.log(data);
                  for(let i = 0; i < data.length; i++){
                      $("#changwats").append(`
                          <option value="${data[i].ch_id}">${data[i].changwat_t}</option>
                      `);
                  }
              }
          });                
      }
      showChangwats();

      function showAmphoeTambon() {
          // Amphoe
          $('#changwats').change(function (){
              let ch_id = $(this).val();
              $("#amphoes").html('<option value="" selected>-- โปรดเลือก --</option>');
              if(ch_id != null) {
                  $.ajax({
                      type:'POST',
                      url:"{{ route('amphoes.post') }}",
                      data:{ch_id:ch_id},
                      success:function(data){
                          for(let i = 0; i < data.length; i++){
                          $("#amphoes").append(`
                              <option value="${data[i].am_id}">${data[i].amphoe_t}</option>
                          `);
                          }
                      }
                  });
              } else {
                  $("#amphoes").html();
              }
              
          });
          // Tambon
          $('#amphoes').change(function (){
              let am_id = $(this).val();
              $("#tambons").html('<option value="" selected>-- โปรดเลือก --</option>');
              if(am_id != null) {
                  $.ajax({
                      type:'POST',
                      url:"{{ route('tambons.post') }}",
                      data:{am_id:am_id},
                      success:function(data){
                          for(let i = 0; i < data.length; i++){
                          $("#tambons").append(`
                              <option value="${data[i].ta_id}">${data[i].tambon_t}</option>
                          `);
                          }
                      }
                  });
              } else {
                  $("#tambons").html();
              }
              
          });
      }
      showAmphoeTambon();

  });
</script>
@endsection



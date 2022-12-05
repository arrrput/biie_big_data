@extends('layouts.master')

@push('plugin-styles')
    {!! Html::style('assets/css/ui-elements/breadcrumbs.css') !!}
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('SSD')}}</a></li>
                                <li class="breadcrumb-item active">{{__('Fire Safety')}}</li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->

    {{-- Modal add Incident record--}}
    <div class="modal fade bd-example-modal-xl" id="occ_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_inc_add" name="form_inc_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="la la-plus"></i> 
                    Incident Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <h5 class="text-primary">Mobil & Anggota</h5>
                <div class="row">                            

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">ROOM<span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id" id="id"/>
                            {!! Form::text('fire_engine', null, array('id'=> 'fire_engine','placeholder' => 'Fire Engine','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('room')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">WAKTU KELUAR </label>
                            {!! Form::text('waktu_keluar', null, array('id'=> 'waktu_keluar','placeholder' => 'Waktu Keluar','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('waktu_keluar')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">WAKTU TIBA </label>
                            {!! Form::text('waktu_tiba', null, array('id'=> 'waktu_tiba','placeholder' => 'Waktu Tiba','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('waktu_tiba')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">KEMBALI </label>
                            {!! Form::text('kembali', null, array('id'=> 'kembali','placeholder' => 'Kembali','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('kembali')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Team Leader </label>
                            {!! Form::text('team_leader', null, array('id'=> 'team_leader','placeholder' => 'Team Leader','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('team_leader')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">WAKTU RESPON</label>
                            {!! Form::text('waktu_respon', null, array('id'=> 'waktu_respon','placeholder' => 'Waktu Respon ','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('waktu_respon')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">ANGGOTA PEMADAM</label>
                            {!! Form::text('anggota_pemadam', null, array('id'=> 'anggota_pemadam','placeholder' => 'Angoota Pemadam ','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('anggota_pemadam')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">KETERANGAN UMUM</label>
                            <textarea class="rounded-1 form-control" cols="2" placeholder="Keterangan" id="keterangan_umum" name="keterangan_umum"></textarea>
        
                            @error('keterangan_umum')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <h5 class="text-primary">Korban</h5>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NAMA</label>
                            {!! Form::text('nama', null, array('id'=> 'nama','placeholder' => 'Nama ','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('nama')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">ALAMAT</label>
                            <textarea class="rounded-1 form-control" cols="2" placeholder="Alamat" id="alamat" name="alamat"></textarea>
        
                            @error('alamat')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">UMUR</label>
                            {!! Form::number('umur', null, array('id'=> 'umur','placeholder' => 'Umur ','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('umur')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">PERIOD </label>
                           
                            <select class="custom-select rounded-1" placeholder="" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option disable>-- Select -- </option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('period')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">KETERANGAN KORBAN</label>
                            <textarea class="rounded-1 form-control" cols="2" placeholder="Keterangan" id="keterangan_korban" name="keterangan_korban"></textarea>
        
                            @error('alamat')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>
                </div>
               

            </div>
            <div class="modal-footer">
                <input type="submit" id="btn-save-recruitment" class="btn btn-primary" value="Submit" />
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
            </div>
            </form>
        </div>
    </div>

    {{-- Modal add Fire Alarm--}}
    <div class="modal fade bd-example-modal-xl" id="alarm_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_alarm_add" name="form_alarm_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="la la-fire"></i> 
                    Fire Alarm Checklist</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Lokasi<span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_alarm" id="id_alarm"/>
                            {!! Form::text('lokasi', null, array('id'=> 'lokasi','placeholder' => 'Lokasi','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('lokasi')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">BREAK GLASS </label>
                           
                            <select class="custom-select rounded-1" placeholder="" id="break_glass" name="break_glass" required>
                                <option disable>-- Select -- </option>
                                <option value="KACA">KACA</option>
                                <option value="BOX">BOX</option>
                            </select>
                            @error('break_glass')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">SMOKE DETECTOR </label>
                           
                            <select class="custom-select rounded-1" placeholder="" id="smoke_detector" name="smoke_detector" required>
                                <option disable>-- Select -- </option>
                                <option value="LAMPU">LAMPU</option>
                                <option value="BOX">BOX</option>
                            </select>
                            @error('break_glass')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DETECTOR PANAS<span class="text-danger">(*)</span></label>
                            {!! Form::text('detector_panas', null, array('id'=> 'detector_panas','placeholder' => 'Detector Panas','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('detector_panas')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">ALARM </label>
                           
                            <select class="custom-select rounded-1" placeholder="" id="alarm_1" name="alarm_1" required>
                                <option disable>-- Select -- </option>
                                <option value="GOOD">GOOD</option>
                                <option value="BAD">BAD</option>
                            </select>
                            @error('alarm_1')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">JUMLAH<span class="text-danger">(*)</span></label>
                            {!! Form::number('jumlah', null, array('id'=> 'jumlah','placeholder' => 'Jumlah','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('jumlah')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">INSPECTION<span class="text-danger">(*)</span></label>
                            {!! Form::text('inspection', null, array('id'=> 'inspection','placeholder' => 'Inspection','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('jumlah')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">KETERANGAN<span class="text-danger">(*)</span></label>
                            <textarea name="keterangan" id="keterangan" class="rounded-1 form-control" cols="2"></textarea>
                            @error('keterangan')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>
                    
                </div>
               

            </div>
            <div class="modal-footer">
                <input type="submit" id="btn-save-recruitment" class="btn btn-primary" value="Submit" />
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
        </div>
            </form>
        </div>
    </div>

    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="layout-top-spacing mb-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing date-table-container">
                            
                            @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                             </div>
                            @endif
                            
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                                <div class="widget-content widget-content-area br-12">
                                    <ul class="nav nav-tabs mb-2 mt-2" id="normaltab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>{{__('Incident Record')}}</b></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " id="alarm-tab" data-toggle="tab" href="#alarm" role="tab" aria-controls="alarm" aria-selected="true"><b>{{__('Fire Alarm')}}</b></a>
                                        </li>
                                        
                                    </ul>

                                    <div class="tab-content" id="normaltabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            {{-- content tenant --}}
                                            <div class="table-responsive mb-4">
        
                                                <button class="btn bg-gradient-success text-white btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#occ_add">
                                                    <i class="las la-plus sidemenu-right-icon"></i>Add Incident
                                                </button>
                                               
                                                <table id="table_inc" class="table table-hover" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th style="width:20px;">{{__('No')}}</th>
                                                        <th>{{__('Fire Engine')}}</th>
                                                        <th>{{__('Waktu Keluar')}}</th>
                                                        <th>{{__('Waktu Tiba')}}</th>
                                                        <th>{{__('Kembali')}}</th>
                                                        <th>{{__('Anggota Pemadam')}}</th>
                                                        <th class="no-content"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade show" id="alarm" role="tabpanel" aria-labelledby="alarm-tab">

                                            <button class="btn bg-gradient-success text-white btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#alarm_add">
                                                <i class="las la-plus sidemenu-right-icon"></i>Add Checklist Alarm
                                            </button>

                                            <table id="table_alarm" class="table table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th style="width:20px;">{{__('No')}}</th>
                                                    <th>{{__('Lokasi')}}</th>
                                                    <th>{{__('Break Glass')}}</th>
                                                    <th>{{__('Smoke Detector')}}</th>
                                                    <th>{{__('Detector Panas')}}</th>
                                                    <th>{{__('Alarm')}}</th>
                                                    <th>{{__('Jumlah')}}</th>
                                                    <th class="no-content"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    
                                                </tbody>
                                                
                                            </table>

                                        </div>
                                      
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/table/datatable/datatables.js') !!}
@endpush

@push('custom-scripts')
<script>

     // header request token
     var SITEURL = '{{URL::to('')}}';
     var table_occ, table_alarm;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready( function () {
        

        // table recruitment
        table_occ = $('#table_inc').DataTable({
            "language": {
                "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
                }
        },
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('ssd.firesafety') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data:'fire_engine', name : 'fire_engine',orderable: true, searchable: true},
                    {data: 'waktu_keluar', name: 'waktu_keluar', orderable: true, searchable: true},  
                    {data:'waktu_tiba', name : 'waktu_tiba',orderable: true, searchable: true},
                    {data: 'kembali', name: 'kembali', orderable: true, searchable: true}, 
                    {data: 'anggota_pemadam', name: 'anggota_pemadam', orderable: true, searchable: true},    
                    {data: 'action', name: 'action'},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 

        table_alarm = $('#table_alarm').DataTable({
            "language": {
                "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
                }
        },
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('ssd.firealarm') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data:'lokasi', name : 'lokasi',orderable: true, searchable: true},
                    {data: 'break_glass', name: 'break_glass', orderable: true, searchable: true},  
                    {data:'smoke_detector', name : 'smoke_detector',orderable: true, searchable: true},
                    {data:'detector_panas', name : 'detector_panas',orderable: true, searchable: true},
                    {data: 'alarm', name: 'alarm', orderable: true, searchable: true}, 
                    {data: 'jumlah', name: 'jumlah', orderable: true, searchable: true},    
                    {data: 'action', name: 'action'},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 
        
         // halal add
         $('#form_inc_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('ssd.firesafety.add')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `Data succesfully!`,
                    showConfirmButton: false,
                    timer: 3000
                });
            if(data.success == 1){
                $("#occ_add").modal('hide');
                table_occ.ajax.reload();
                
            }
            
        },
            error: function(data){
                    console.log(data);
                }
            })
        });

        $('#form_alarm_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('ssd.firealarm.add')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `Data succesfully!`,
                    showConfirmButton: false,
                    timer: 3000
                });
            if(data.success == 1){
                $("#alarm_add").modal('hide');
                table_alarm.ajax.reload();
                
            }
            
        },
            error: function(data){
                    console.log(data);
                }
            })
        });

    });

     //Edit procurement fin
     function editInc(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/ssd/firesafety/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#occ_add').modal('show');
            $('#id').val(res.id);
            $('#fire_engine').val(res.fire_engine);
            $('#waktu_keluar').val(res.waktu_keluar);
            $('#waktu_tiba').val(res.waktu_tiba);
            $('#kembali').val(res.kembali);
            $('#team_leader').val(res.team_leader);
            $('#waktu_respon').val(res.waktu_respon);
            $('#anggota_pemadam').val(res.anggota_pemadam);
            $('#nama').val(res.nama);
            $('#alamat').val(res.alamat);
            $('#umur').val(res.umur);
            $('#jenis_kelamin').val(res.jenis_kelamin);
            $('#keterangan_korban').val(res.keterangan_korban);
            $('#keterangan_umum').val(res.keterangan_umum);
            }

        });
    }

    //Edit procurement fin
    function editFire(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/ssd/firealarm/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#alarm_add').modal('show');
            $('#id_alarm').val(res.id);
            $('#lokasi').val(res.lokasi);
            $('#break_glass').val(res.break_glass);
            $('#smoke_detector').val(res.smoke_detector);
            $('#detector_panas').val(res.detector_panas);
            $('#alarm_1').val(res.alarm);
            $('#jumlah').val(res.jumlah);
            $('#inspection').val(res.inspection);
            $('#keterangan').val(res.keterangan);
            }
           
        });
    }

    //delete procurement
   function deleteInc(id){
            if (confirm("Delete this record?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/ssd/firesafety/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table_occ.ajax.reload();
                    }
                });
            }
    }

    //delete fire alarm
   function deleteFire(id){
            if (confirm("Delete this record?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/ssd/firealarm/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table_alarm.ajax.reload();
                    }
                });
            }
    }

    function clearField(){
        $('#id').val('');
        $('#fire_engine').val('');
            $('#waktu_keluar').val('');
            $('#waktu_tiba').val('');
            $('#kembali').val('');
            $('#team_leader').val('');
            $('#waktu_respon').val('');
            $('#anggota_pemadam').val('');
            $('#nama').val('');
            $('#alamat').val('');
            $('#umur').val('');
            $('#jenis_kelamin').prop('selectedIndex', 0);
            $('#keterangan_korban').val('');
            $('#keterangan_umum').val('');

            $('#id_alarm').val('');
            $('#lokasi').val('');
            $('#break_glass').prop('selectedIndex', 0);
            $('#smoke_detector').prop('selectedIndex', 0);
            $('#detector_panas').val('');
            $('#alarm_1').prop('selectedIndex', 0);
            $('#jumlah').val('');
            $('#inspection').val('');
            $('#keterangan').val('');
    }
</script>
@endpush

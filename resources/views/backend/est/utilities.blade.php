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
                                <li class="breadcrumb-item " aria-current="page">EST</li>
                                <li class="breadcrumb-item " aria-current="page">Utilities Status</li>
                                <li class="breadcrumb-item active">{{__('Water')}}</li>
                                
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->

    {{-- modal ADD METEREADING --}}
    <div class="modal fade bd-example-modal-xl" id="meter_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="meter_list_add" name="meter_list_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="k_bangunan"><i class="fa fa-plus"></i> Add Metereading List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TYPE <span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_meter" id="id_meter"/>
                            <select class="custom-select rounded-0" placeholder="" id="type_meter" name="type_meter">
                                <option disable>-- Pilih -- </option>
                                @foreach ($meter as  $list)
                                    <option value="{{ $list->id }}">{{ $list->name }}</option>                        
                                @endforeach
                            </select>
                            @error('block')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>


                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NAME <span class="text-danger">(*)</span></label>
                            {!! Form::text('name', null, array('id'=> 'name','placeholder' => 'NAME','class' => 'form-control')) !!}
                            {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                        </div>
                    </div>                            
                    
                </div>

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">ELECTRICITY CONSUMPTION </label>
                            <input type="number" class="form-control" placeholder="USAGE" name="electricity_consump" id="electricity_consump"  />
                            @error('electricity_consump')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">WATER CONSUMPTION</label>
                            <input type="number" class="form-control" placeholder="USAGE" name="water_consump" id="water_consump"  />
                            @error('water_consump')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                </div>


                <div class="row">                            

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">START DATE</label>
                            <input type="date" id="start_date" name="start_date" class="date-picker form-control rounded-0" data-date-format="dd/mm/yyyy" placeholder="Handover Date"/>
                            @error('start_date')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">START DATE</label>
                            <input type="date" id="end_date" name="end_date" class="date-picker form-control rounded-0" data-date-format="dd/mm/yyyy" placeholder="Handover Date"/>
                            @error('end_date')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>
                    
                    
                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" id="btn-save-town" class="btn btn-success" value="Submit" />
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
            </div>
            </form>
        </div>
    </div>

     {{-- modal ADD water in analys --}}
     <div class="modal fade bd-example-modal-xl" id="wia_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_wia_add" name="form_wia_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="k_bangunan"><i class="fa fa-plus"></i> Add Water In Analys</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">PARAMETER <span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_wia" id="id_wia"/>
                            {!! Form::text('parameter', null, array('id'=> 'parameter','placeholder' => 'Parameter','class' => 'form-control', 'required')) !!}
                        </div>
                    </div>


                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">UNIT <span class="text-danger">(*)</span></label>
                            {!! Form::text('unit', null, array('id'=> 'unit','placeholder' => 'Unit','class' => 'form-control', 'required')) !!}
                            {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                        </div>
                    </div>                            
                    
                </div>

                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">RESULT <span class="text-danger">(*)</span></label>
                            <input type="number" class="form-control" placeholder="Result" name="result" id="result"  />
                           
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">STANDART MAX</label>
                            <input type="number" class="form-control" placeholder="Standart Max" name="standart_max" id="standart_max"  />
                            
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">METHOD</label>
                            <input type="text" class="form-control" placeholder="Method" name="method" id="method"  />
                            
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" id="btn-save-town" class="btn btn-primary" value="Submit" />
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
            </div>
            </form>
        </div>
    </div>


    <!-- Main Body Starts -->
    <div class="">
        <div class="layout-top-spacing">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing date-table-container">
                            <!-- Datatable with a dropdown -->
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                                <div class="widget-content widget-content-area br-6">
                                    <ul class="nav nav-tabs mb-2 mt-2" id="normaltab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="wia-tab" data-toggle="tab" href="#wia" role="tab" aria-controls="wia" aria-selected="true"><b>{{__('Water In Analys')}}</b></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>{{__('Meter reading')}}</b></a>
                                        </li>
                                       
                                        

                                    </ul>

                                    <div class="tab-content" id="normaltabContent">
                                        <div class="tab-pane fade show active" id="wia" role="tabpanel" aria-labelledby="wia-tab">
                                            <div class="table-responsive mb-4">

                                                <a href="{{ route('estate.meter.export') }}" class="btn  btn-danger mb-2">
                                                    <i class="las la-file-export"></i> Export
                                                </a>
                                                <button class="btn btn-primary btn-md pull-left mb-2" onclick="clearField()" data-toggle="modal" data-target="#wia_add"><i class="las la-plus"></i> Add List</button>
                                                    <table id="tbl_wia" class="table table-sm table-hovered table-sm table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" style="width: 20px;">No</th>
                                                                <th scope="col">PARAMETER</th>
                                                                <th scope="col">UNIT</th>
                                                                <th scope="col">RESULT</th>
                                                                <th scope="col">STANDART MAX</th>
                                                                <th scope="col">METHOD</th>
                                                                <th scope="no-content" ></th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        
                                                        
                                                        </tbody>
                                                    </table> 

                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            {{-- content factory --}}
                                            <div class="table-responsive mb-4">

                                                <a href="{{ route('estate.meter.export') }}" class="btn  btn-danger mb-2">
                                                    <i class="las la-file-export"></i> Export
                                                </a>
                                                
                                                <button class="btn btn-primary btn-md pull-left mb-2" onclick="clearField()" data-toggle="modal" data-target="#meter_add"><i class="las la-plus"></i> Add List</button>
                                                    <table id="tbl_meter" class="table table-sm table-hovered table-sm table-striped" style="width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" style="width: 20px;">No</th>
                                                                <th scope="col">TYPE</th>
                                                                <th scope="col">LOCATION</th>
                                                                <th scope="col">WATER CONSUMTION</th>
                                                                <th scope="col">ELECTRICITY CONSUMTION</th>
                                                                <th scope="col">START DATE</th>
                                                                <th scope="col">END DATE</th>
                                                                <th scope="no-content" ></th>
                                                                
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
    </div>
    <!-- Main Body Ends -->

@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/table/datatable/datatables.js') !!}
    
@endpush

@push('custom-scripts')

<script>

    var SITEURL = '{{URL::to('')}}';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table, table_wia, tbl_town, tbl_meter;

    // $('#tbl_wia').DataTable();
    tbl_meter = $('#tbl_meter').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('estate.meter.index') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data: 'type', name: 'type', orderable: true, searchable: true},
                {data:'location', name : 'location',orderable: true, searchable: true},
                {data:'kwh', name : 'electricity_consump',orderable: true, searchable: false},
                {data:'m3', name : 'water_consump',orderable: true, searchable: false},
                {data:'start_date', name : 'start_date',orderable: true, searchable: true},
                {data: 'end_date', name: 'end_date'},
                {data: 'action', name: 'action'},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 


    table_wia = $('#tbl_wia').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('estate.water_analys') }}",
            type: "GET"
            
        },
            columns: [
                
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data: 'parameter', name: 'parameter', orderable: true, searchable: true},
                {data:'unit', name : 'unit',orderable: true, searchable: true},
                {data:'result', name : 'result',orderable: true, searchable: false},
                {data:'standart_max', name : 'standart_max',orderable: true, searchable: true},
                {data: 'method', name: 'method'},
                {data: 'action', name: 'action'},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 

        tbl_town = $('#tbl_town').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('estate.town.index') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data: 'type', name: 'type', orderable: true, searchable: true},
                {data: 'stall_no', name: 'stall_no', orderable: true, searchable: true},
                {data:'name_stall', name : 'name_stall',orderable: true, searchable: true},
                {data:'hod', name : 'hod',orderable: true, searchable: false},
                {data:'remark', name : 'remark',orderable: true, searchable: true},
                {data: 'action', name: 'action'},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 

    //factory 
    

    //delete Estate
   function deleteFunc(id){
            if (confirm("Delete list ini?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/estate/list/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){
                        // var oTable = $('#table_est').dataTable();
                        // oTable.fnDraw(false);
                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table.ajax.reload();
                    }
                });
            }
    }

    function clearField(){
       
        // wia
            $('#id_wia').val('');
            $('#parameter').val('');
            $('#unit').val('');
            $('#result').val('');
            $('#standart_max').val('');
            $('#method').val('');
        
        //metereading
            $('#id_meter').val('');
            $('#name').val('');
            $('#electricity_consump').val('');
            $('#water_consump').val('');
            $('#type_meter').prop('selectedIndex', 0);
            $('#start_date').val('');
            $('#end_date').val('');

    }

    

    
    

    

    //delete Estate
   function deleteWia(id){
            if (confirm("Delete this list?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/estate/water_analys/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){
                        // var oTable = $('#table_est').dataTable();
                        // oTable.fnDraw(false);
                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table_wia.ajax.reload();
                    }
                });
            }
    }


    $('#form_wia_add').submit(function(e) {
        e.preventDefault();
        $("#btn-save"). attr("disabled", true);
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('estate.water_analys.add')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            if(data.success == 1){
                $("#wia_add").modal('hide');
                tbl_wia.ajax.reload();
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);

                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `Data succesfully!`,
                    showConfirmButton: false,
                    timer: 3000
                }); 
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })
    });
    
    function editWia(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/estate/water_analys/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#wia_add').modal('show');
            $('#id_wia').val(res.id);
            $('#parameter').val(res.parameter);
            $('#unit').val(res.unit);
            $('#result').val(res.result);
            $('#standart_max').val(res.standart_max);
            $('#method').val(res.method);
          

            }
        });
    }

    //delete Estate
   function deleteTown(id){
            if (confirm("Delete list ini?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/estate/town/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){
                        // var oTable = $('#table_est').dataTable();
                        // oTable.fnDraw(false);
                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        tbl_town.ajax.reload();
                    }
                });
            }
    }

    // metereading
    $('#meter_list_add').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('estate.meter.store')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            if(data.success == true){
                $("#meter_add").modal('hide');
                tbl_meter.ajax.reload();
                $("#btn-save-meter").html('Submit');
                $("#btn-save-meter"). attr("disabled", false);

                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${data.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });      
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })
    });

    function editMeter(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/estate/meter/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#meter_add').modal('show');
            console.log(res.id);
            $('#id_meter').val(res.id);
            $('#name').val(res.location);
            $('#electricity_consump').val(res.electricity_consump);
            $('#water_consump').val(res.water_consump);
            $('#type_meter').val(res.id_type);
            $('#start_date').val(res.start_date);
            $('#end_date').val(res.end_date);
            // $('#efile').attr('src', SITEURL +'public/file/'+res.cover);

            }
        });
    }
    
</script>
@endpush

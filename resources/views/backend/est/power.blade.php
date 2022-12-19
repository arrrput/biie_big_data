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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('EST')}}</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Utilities Status')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Power')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->

    {{-- Modal Switchouse --}}
    <div class="modal fade bd-example-modal-xl" id="engine_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_engine_add" name="form_engine_add" method="POST" enctype="multipart/form-data" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="las la-pencil-ruler"></i>
                    Add Drawing File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">ENGINE SERIES<span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_sh" id="id_sh"/>
                            <input type="hidden" name="doc_sh" id="doc_sh"/>
                            <input type="text" name="engine_series" id="engine_series" class=" rounded-1 form-control" placeholder="Engine Series"/>
                           
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">ENGINE CODE<span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control rounded-1" placeholder="Engine Code" id="engine_code" name="engine_code">
                           
                        </div>
                    </div>
                    
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">VOLTAGE OUTPUT<span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control rounded-1" placeholder="Voltage Output" id="voltage_output" name="voltage_output">
                           
                        </div>
                    </div>
                    
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">CAPACITY<span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control rounded-1" placeholder="Capacity" id="capacity" name="capacity">
                           
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">MERK<span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control rounded-1" placeholder="Merk" id="merk" name="merk">
                           
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-12">
                        <table class="table table-stripped" id="dynamicAddRemove">
                            <tr>
                                <td>
                                    <input type="file" name="addMoreInputFields[0][document]" placeholder="File" class="form-control" />
                                </td>
                                
                                <td>
                                    <input type="text" name="addMoreInputFields[0][manual_book]" placeholder="Manual Book" class="form-control" />
                                </td> 
                                <td>
                                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary"><i class="las la-plus"></i></button>
                                </td>
                            </tr>
                        </table>
                    </div>              

                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" id="btn-save-permit" class="btn btn-primary" value="Submit" />
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
            </div>
            </form>
        </div>
    </div>

    {{-- Modal Switchouse --}}
    <div class="modal fade bd-example-modal-xl" id="sh_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_sh_add" name="form_sh_add" method="POST" enctype="multipart/form-data" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="las la-pencil-ruler"></i>
                    Add Drawing File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NAME<span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_sh" id="id_sh"/>
                            <input type="hidden" name="doc_sh" id="doc_sh"/>
                            <input type="text" name="name" id="name" class=" rounded-1 form-control" placeholder="Name"/>
                           
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">SUBSTATION<span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control rounded-1" placeholder="Substation" id="substation" name="substation">
                           
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">MERK<span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control rounded-1" placeholder="Merk" id="merk" name="merk">
                           
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">OUTGOING<span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control rounded-1" placeholder="Outgoing" id="outgoing" name="outgoing">
                           
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">BREAKER<span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control rounded-1" placeholder="Breaker" id="breaker" name="breaker">
                           
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">OPERATING VOLTAGE<span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control rounded-1" placeholder="Operating Voltage" id="operating_voltage" name="operating_voltage">
                           
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">INCOMING<span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control rounded-1" placeholder="Incoming" id="incoming" name="incoming">
                           
                        </div>
                    </div>                  

                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">MANUAL BOOK<span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control rounded-1" placeholder="Manual Book" id="manual_book" name="manual_book">
                           
                        </div>
                    </div>
                    
                    

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DOCUMENT</label>
                            <input type="file" class="rounded-1 form-control" placeholder="Service" id="document_sh" name="document_sh">
                        </div>
                    </div>               

                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" id="btn-save-permit" class="btn btn-primary" value="Submit" />
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
            </div>
            </form>
        </div>
    </div>

     {{-- Modal Switchouse --}}
     <div class="modal fade bd-example-modal-xl" id="st_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_st_add" name="form_st_add" method="POST" enctype="multipart/form-data" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="las la-pencil-ruler"></i>
                    Add Drawing File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NAME<span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_st" id="id_st"/>
                            <input type="hidden" name="doc_st" id="doc_st"/>
                            <input type="text" name="name_st" id="name_st" class=" rounded-1 form-control" placeholder="Name" required/>
                           
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">MERK<span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control rounded-1" placeholder="Merk" id="merk_st" name="merk_st" required>
                           
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">INCOMING<span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control rounded-1" placeholder="Incoming" id="incoming_st" name="incoming_st" required>
                           
                        </div>
                    </div>  

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">OUTGOING<span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control rounded-1" placeholder="Outgoing" id="outgoing_st" name="outgoing_st" required>
                           
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="factory" class="control-label"> {{__('FACTORY')}}<span class="text-danger">(*)</span></label>
                            <div class="input-group control-group increment-factory" >
                              <input type="text" placeholder="Exp : SD1, SD2, D3" name="factory[]" id="factory" class="form-control" required>
                              <div class="input-group-append"> 
                                <button class="btn btn-soft-success btn-add-factory" type="button"><i class="las la-plus"></i></button>
                              </div>
                            </div>
                            <div class="clone-factory hide">
                              <div class="control-group input-group" style="margin-top:10px">
                                <input type="text" name="factory[]" id="factory" placeholder="Exp : SD1, SD2, D3" class="form-control">
                                <div class="input-group-append"> 
                                  <button class="btn btn-soft-danger btn-rm-factory" type="button"><i class="las la-trash"></i> </button>
                                </div>
                              </div>
                            </div>
                        </div>
        
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="factory" class="control-label"> {{__('TRANSFORMER CAPACITY')}}<span class="text-danger">(*)</span></label>
                            <div class="input-group control-group increment-transformer" >
                              <input type="text" placeholder="Exp : 1.5 MVA" name="transformer[]" id="transformer" class="form-control" required>
                              <div class="input-group-append"> 
                                <button class="btn btn-soft-success btn-add-transformer" type="button"><i class="las la-plus"></i></button>
                              </div>
                            </div>
                            <div class="clone-transformer hide">
                              <div class="control-group input-group" style="margin-top:10px">
                                <input type="text" name="transformer[]" id="transformer" placeholder="Exp : 1.5 MVA" class="form-control">
                                <div class="input-group-append"> 
                                  <button class="btn btn-soft-danger btn-rm-transformer" type="button"><i class="las la-trash"></i> </button>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                   
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label" >MANUAL BOOK <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control rounded-1" placeholder="Manual Book" id="manual_book" name="manual_book" required>
                           
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DOCUMENT</label>
                            <input type="file" class="rounded-1 form-control" placeholder="Service" id="document_st" name="document_st" required>
                        </div>
                    </div>               

                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" id="btn-save-permit" class="btn btn-primary" value="Submit" />
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
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>{{__('Engine Drawing')}}</b></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " id="sw-tab" data-toggle="tab" href="#sw" role="tab" aria-controls="sw" aria-selected="true"><b>{{__('Switchouse Drawing')}}</b></a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link " id="st-tab" data-toggle="tab" href="#st" role="tab" aria-controls="st" aria-selected="true"><b>{{__('Substation Drawing')}}</b></a>
                                        </li>
                                        
                                        
                                    </ul>

                                    <div class="tab-content" id="normaltabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            {{-- content tenant --}}
                                            <div class="table-responsive mb-4">
        
                                                <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#engine_add">
                                                    <i class="las la-plus sidemenu-right-icon"></i>Add Drawing 
                                                </button>

                                                <table id="table_engine" class="table table-hover" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th style="width:20px;">{{__('No')}}</th>
                                                        <th>{{__('Engine Series')}}</th>
                                                        <th>{{__('Engine Code')}}</th>
                                                        <th>{{__('Engine Type')}}</th>
                                                        <th>{{__('Voltage Output')}}</th>
                                                        <th class="no-content"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                        
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade show" id="sw" role="tabpanel" aria-labelledby="sw-tab">
                                            
                                            <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#sh_add">
                                                <i class="las la-plus sidemenu-right-icon"></i>Add Drawing 
                                            </button>

                                            <table id="table_sw_sh" class="table table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th style="width:20px;">{{__('No')}}</th>
                                                    <th>{{__('Name')}}</th>
                                                    <th>{{__('Substation')}}</th>
                                                    <th>{{__('Merk')}}</th>
                                                    <th>{{__('Outgoing')}}</th>
                                                    <th>{{__('Manual Book')}}</th>
                                                    <th>{{__('Download')}}</th>
                                                    <th class="no-content"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                    
                                                </tbody>
                                                
                                            </table>
                                        </div>


                                       <div class="tab-pane fade show" id="st" role="tabpanel" aria-labelledby="st-tab">
                                            
                                            <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#st_add">
                                                <i class="las la-plus sidemenu-right-icon"></i>Add Drawing 
                                            </button>

                                            <table id="table_st" class="table table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th style="width:20px;">{{__('No')}}</th>
                                                    <th>{{__('Name')}}</th>
                                                    <th>{{__('Merk')}}</th>
                                                    <th>{{__('Manual Book')}}</th>
                                                    <th>{{__('Download')}}</th>
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

    var table_sw_sh, table_st, table_engine;
    var SITEURL = '{{URL::to('')}}';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // dynamin form upload
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="file" name="addMoreInputFields['+ i +'][document]" placeholder="Document" class="form-control" /></td>  <td><input type="text" name="addMoreInputFields[' + i + '][manual_book]" placeholder="Manual Book" class="form-control" /></td> <td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="las la-trash"></i></button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

    $(document).ready( function () {

            $(".btn-add-factory").click(function(){ 
                var html = $(".clone-factory").html();
                $(".increment-factory").after(html);
            });
            $("body").on("click",".btn-rm-factory",function(){ 
                $(this).parents(".control-group").remove();
            });

            $(".btn-add-transformer").click(function(){ 
                var html = $(".clone-transformer").html();
                $(".increment-transformer").after(html);
            });
            $("body").on("click",".btn-rm-transformer",function(){ 
                $(this).parents(".control-group").remove();
            });

         $('#table_sop').DataTable({
            "language": {
                "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
                }
            }
        });

        table_engine = $('#table_engine').DataTable({
            "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('estate.ph.engine_drawing') }}",
            type: "GET"
            
        },
            columns: [
               
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'engine_series', name : 'engine_series',orderable: true, searchable: true},
                {data: 'engine_code', name: 'engine_code', orderable: true, searchable: true},  
                {data: 'engine_type', name: 'engine_type', orderable: true, searchable: true},  
                {data: 'voltage_output', name: 'voltage_output', orderable: true, searchable: true},  
                {data: 'action', name: 'action'},
            ]
        }); 

        table_sw_sh = $('#table_sw_sh').DataTable({
            "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('estate.ph.dw_sh') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'name', name : 'name',orderable: true, searchable: true},
                {data: 'substation', name: 'substation', orderable: true, searchable: true},  
                {data: 'merk', name: 'merk', orderable: true, searchable: true},  
                  
                {data: 'breaker', name: 'breaker', orderable: true, searchable: true},  
                {data: 'manual_book', name: 'manual_book'},  
                {data: 'drawing', name: 'drawing'}, 
                {data: 'action', name: 'action'},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 

        table_st = $('#table_st').DataTable({
            "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('estate.ph.st') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'name', name : 'name',orderable: true, searchable: true},
                {data: 'merk', name: 'merk', orderable: true, searchable: true},  
                {data: 'manual_book', name: 'manual_book'},  
                {data: 'drawing', name: 'drawing'}, 
                {data: 'action', name: 'action'},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        });

        
    } );


    $('#form_sh_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('estate.ph.dw_sh.add')}}",
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
                $("#sh_add").modal('hide');
                table_sw_sh.ajax.reload();
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })
    });

    $('#form_st_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('estate.ph.st.add')}}",
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
                $("#st_add").modal('hide');
                table_st.ajax.reload();
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })
    });

     //delete switchouse
   function deleteSw(id){
            if (confirm("Delete Document ini?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/estate/ph/sw/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `Delete succesfully!`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        table_sw_sh.ajax.reload();
                    }
                });
            }
    }

     //Edit switchouse
     function editSw(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/estate/ph/sw/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#sh_add').modal('show');
            $('#id_sh').val(res.id);
            $('#name').val(res.name);
            $('#substation').val(res.substation);
            $('#merk').val(res.merk);
            $('#outgoing').val(res.outgoing);
            $('#breaker').val(res.breaker);
            $('#operating_voltage').val(res.operating_voltage);
            $('#incoming').val(res.incoming);
            $('#manual_book').val(res.manual_book);
            $('#doc_sh').val(res.document);

            }
        });
    }


    //Edit substation
    function editSt(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/estate/ph/st/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#st_add').modal('show');
            $('#id_st').val(res.id);
            $('#name_st').val(res.name);
            $('#merk_st').val(res.merk);
            $('#incoming_st').val(res.incoming);
            $('#outgoing_st').val(res.outgoing);
            $('#factory').val(res.factory);
            $('#transformer').val(res.transformer_capacity);
            $('#manual_book').val(res.manual_book);
            $('#doc_st').val(res.document);

            }
        });
    }

     //delete substation
   function deleteSt(id){
            if (confirm("Delete this item?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/estate/ph/st/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `Delete succesfully!`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        table_st.ajax.reload();
                    }
                });
            }
    }




    function clearField(){
        $('#id').val('');
        $('#id_sh').val('');
        $('#name').val('');
        $('#substation').val('');
        $('#merk').val('');
        $('#outgoing').val('');
        $('#breaker').val('');
        $('#operating_voltage').val('');
        $('#incoming').val('');
        $('#manual_book').val('');
        $('#doc_sh').val('');

    }


</script>
@endpush


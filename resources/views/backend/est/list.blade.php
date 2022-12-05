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
                                <li class="breadcrumb-item active"><a href="javascript:void(0);">{{__('Building Status')}}</a></li>
                                
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
   
    {{-- modal add factory--}}
    <div class="modal fade bd-example-modal-xl" id="env_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="estate_list_add" name="estate_list_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="k_bangunan"><i class="fa fa-plus"></i> Add Dormitory List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">CATEGORY<span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id" id="id"/>
                            <select class="custom-select rounded-0" placeholder="" id="category" name="category">
                                <option disable>-- Pilih -- </option>
                                @foreach ($kategori as  $list)
                                    <option value="{{ $list->id }}">{{ $list->name }}</option>                        
                                @endforeach
                            </select>
                            @error('category')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">LOT</label>
                            {!! Form::text('lot', null, array('id'=> 'lot','placeholder' => 'LOT','class' => 'form-control')) !!}
                            {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                        </div>
                    </div>
                    
                </div>

                <div class="row">                            
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NAME OF TENANT<span class="text-danger"></span></label>
                            <input type="text" class="form-control" placeholder="NAME" id="tenant" name="tenant">
                                
                            @error('tenant')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">OCCUPIED<span class="text-danger">(*)</span></label>
                            <select class="custom-select rounded-0" placeholder="" id="occupied" name="occupied">
                                <option disable>-- Pilih -- </option>   
                                <option value="1">SALES</option>  
                                <option value="2">RENTAL</option>  
                                <option value="3">VACANT</option>  
                                <option value="4">PT BIIE</option>  
                                                            
                            </select>
                            @error('occupied')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">STATUS BUILDING</label>
                           <input type="number" name="status_building" id="status_building" class="form-control" max="100" placeholder="Percent"/>
                            @error('occupied')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>
                    
                </div>

                

                <div class="row">
                    

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">HANDOVER DATE</label>
                            <input type="date" id="hod" name="hod" class="date-picker form-control rounded-0" data-date-format="dd/mm/yyyy" placeholder="Handover Date"/>
                            @error('occupied')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">END OF LEASE</label>
                            <input type="date" id="eol" name="eol" class="date-picker form-control rounded-0" data-date-format="dd/mm/yyyy" placeholder="End Of Lease"/>
                            @error('occupied')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">LAND AREA<span class="text-danger"></span></label>
                            <input type="text" class="form-control" placeholder="Exp(2300)" id="land_area" name="land_area">
                                
                            @error('land_area')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">. </label>
                            <select class="custom-select rounded-0" placeholder="" id="satuan" name="satuan">
                                <option value="" disable>-- Pilih -- </option>   
                                <option value="1">HA</option>  
                                <option value="2">M2</option>  
                                                            
                            </select>
                            @error('satuan')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" id="btn-save" class="btn btn-success" value="Submit" />
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
            </div>
            </form>
        </div>
    </div>

    {{-- modal add dorm --}}
    <div class="modal fade bd-example-modal-xl" id="dorm_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="dorm_list_add" name="dorm_list_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="k_bangunan"><i class="fa fa-plus"></i> Add Dormitory List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">BLOCK <span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_dorm" id="id_dorm"/>
                            <select class="custom-select rounded-0" placeholder="" id="block" name="block">
                                <option disable>-- Pilih -- </option>
                                @foreach ($blok as  $list)
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
                            <label for="exampleInputName" class="form-label">UNIT</label>
                            {!! Form::text('unit', null, array('id'=> 'unit','placeholder' => 'UNIT','class' => 'form-control')) !!}
                            {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                        </div>
                    </div>
                    
                </div>

                <div class="row">                            
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NAME OF TENANT<span class="text-danger"></span></label>
                            <input type="text" class="form-control" placeholder="NAME" id="tenant" name="tenant">
                                
                            @error('tenant')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">STATUS<span class="text-danger">(*)</span></label>
                            <select class="custom-select rounded-0" placeholder="" id="occupied" name="occupied">
                                <option disable>-- Pilih -- </option>   
                                <option value="1">OCCUPIED</option>  
                                <option value="2">VACANT</option>  
                                                            
                            </select>
                            @error('occupied')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">VACANT </label>
                            <input type="number" class="form-control rounded-0" name="vacant" id="vacant">
                            @error('occupied')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>
                    
                </div>

                

                <div class="row">
                    

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">HANDOVER DATE</label>
                            <input type="date" id="hod" name="hod" class="date-picker form-control rounded-0" data-date-format="dd/mm/yyyy" placeholder="Handover Date"/>
                            @error('occupied')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">END OF LEASE</label>
                            <input type="text" id="remark" name="remark" class="form-control rounded-0" placeholder="REMARKS"/>
                            @error('occupied')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    
                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" id="btn-save-dorm" class="btn btn-success" value="Submit" />
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
            </div>
            </form>
        </div>
    </div>

    {{-- modal add town center --}}
    <div class="modal fade bd-example-modal-xl" id="town_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="town_list_add" name="town_list_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="k_bangunan"><i class="fa fa-plus"></i> Add Town Center List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TYPE <span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_town" id="id_town"/>
                            <select class="custom-select rounded-0" placeholder="" id="type" name="type">
                                <option disable>-- Pilih -- </option>
                                @foreach ($town as  $list)
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
                            <label for="exampleInputName" class="form-label">STALL NO</label>
                            {!! Form::text('stall_no', null, array('id'=> 'stall_no','placeholder' => 'STALL NO','class' => 'form-control')) !!}
                            {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                        </div>
                    </div>
                    
                </div>

                <div class="row">                            
                    
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NAME OF STALL HOLDER<span class="text-danger"></span></label>
                            <input type="text" class="form-control" placeholder="NAME OF STALL HOLDER" id="name_stall" name="name_stall">
                                
                            @error('tenant')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">HANDOVER DATE</label>
                            <input type="date" id="hod_town" name="hod_town" class="date-picker form-control rounded-0" data-date-format="dd/mm/yyyy" placeholder="Handover Date"/>
                            @error('occupied')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">REMARK </label>
                            <input type="text" class="form-control rounded-0" placeholder="REMARK" name="remark_town" id="remark_town">
                            @error('occupied')
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

    <!-- Import Excel Factory-->
    <div class="modal fade" id="importExcelFact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('estate.list.import') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import CSV / Excel</h5>
                    </div>
                    <div class="modal-body">

                        {{ csrf_field() }}

                        <label>Pilih file excel</label>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Import Excel Dorm-->
    <div class="modal fade" id="importExcelDorm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('estate.dorm.import') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import CSV / Excel</h5>
                    </div>
                    <div class="modal-body">

                        {{ csrf_field() }}

                        <label>Pilih file CSV / excel</label>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

     <!-- Import Excel Town-->
     <div class="modal fade" id="importExcelTown" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('estate.town.import') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import CSV / Excel</h5>
                    </div>
                    <div class="modal-body">

                        {{ csrf_field() }}

                        <label>Pilih file CSV / excel</label>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
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
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>{{__('Factory')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><b> {{__('Dormitory')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="export-tab" data-toggle="tab" href="#export" role="tab" aria-controls="export" aria-selected="false"><b> {{__('Town Center')}}</b></a>
                                        </li>
                                        {{-- <li class="nav-item ">
                                            <a class="nav-link" id="infra-tab" data-toggle="tab" href="#infra" role="tab" aria-controls="infra" aria-selected="false"><b> {{__('Infrastructure')}}</b></a>
                                        </li> --}}
                                        

                                    </ul>

                                    <div class="tab-content" id="normaltabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            {{-- content factory --}}
                                            <div class="table-responsive mb-4">

                                                <a href="{{ route('estate.list.export') }}" class="btn  btn-danger mb-2">
                                                    <i class="las la-file-export"></i> Export
                                                </a>
                                                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#importExcelFact">
                                                    <i class="las la-file-import"></i> Import
                                                </button>
                                                <button class="btn btn-success btn-md pull-left mb-2" onclick="clearField()" data-toggle="modal" data-target="#env_add"><i class="las la-plus"></i> Add List</button>
                                                <table id="tbl_est" class="table table-hovered table-sm table-striped" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="width: 15px;">No</th>
                                                            <th scope="col">TYPE</th>
                                                            <th scope="col">LOT</th>
                                                            <th scope="col">TENANT</th>
                                                            <th scope="col" style="width: 150px;">STATUS VACANT</th>
                                                            <th scope="col" style="width: 150px;">STATUS BUILDING</th>
                                                            <th class="no-content"></th>
                                                            {{-- <th scope="col">END OF LEASE</th>
                                                            <th scope="col">BUILDING STATUS</th>
                                                            <th scope="col">LAND AREA</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                                            {{-- content man dorm --}}
                                            <a href="{{ route('estate.dorm.export') }}" class="btn  btn-danger mb-2">
                                                <i class="las la-file-export"></i> Export
                                            </a>
                                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#importExcelDorm">
                                                <i class="las la-file-import"></i> Import
                                            </button>
                                            <button class="btn btn-success btn-md pull-left mb-2" onclick="clearField()" data-toggle="modal" data-target="#dorm_add"><i class="las la-plus"></i> Add List</button>
                                                <table id="tbl_dorm" class="table table-hovered table-sm table-striped" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="width: 15px;">No</th>
                                                            <th scope="col">BLOCK</th>
                                                            <th scope="col">UNIT</th>
                                                            <th scope="col">TENANT</th>
                                                            <th scope="col">OCCUPIED</th>
                                                            <th scope="col">VACANT</th>
                                                            <th class="no-content"></th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    
                                                    </tbody>
                                                </table> 
                                        </div>

                                        <div class="tab-pane fade" id="export" role="tabpanel" aria-labelledby="export-tab">
                                            {{-- content man import --}}
                                            <a href="{{ route('estate.town.export') }}" class="btn  btn-danger mb-2">
                                                <i class="las la-file-export"></i> Export
                                            </a>
                                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#importExcelTown">
                                                <i class="las la-file-import"></i> Import
                                            </button>
                                            
                                            <button class="btn btn-success btn-md pull-left mb-2" onclick="clearField()" data-toggle="modal" data-target="#town_add"><i class="las la-plus"></i> Add List</button>
                                                <table id="tbl_town" class="table table-sm table-hovered table-sm table-striped" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="width: 10px;">No</th>
                                                            <th scope="col">TYPE</th>
                                                            <th scope="col">STALL NO</th>
                                                            <th scope="col">NAME STALL</th>
                                                            <th scope="col">HANDOVER DATE</th>
                                                            <th scope="col">REMARK</th>
                                                            <th class="no-content"></th>                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    
                                                    </tbody>
                                                </table> 
                                        </div>

                                        <div class="tab-pane fade" id="infra" role="tabpanel" aria-labelledby="infra-tab">

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

    var table, table_dorm, tbl_town, tbl_meter;

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


    table_dorm = $('#tbl_dorm').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('estate.dorm.index') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data: 'name_block', name: 'name_block', orderable: true, searchable: true},
                {data:'unit', name : 'unit',orderable: true, searchable: true},
                {data:'name_tenant', name : 'name_tenant',orderable: true, searchable: false},
                {data:'status', name : 'status',orderable: true, searchable: true},
                {data: 'vacant', name: 'vacant'},
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
    $(document).ready( function () {
        // $('#tbl_est').DataTable();

        table = $('#tbl_est').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('estate.list') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data: 'category', name: 'category', orderable: true, searchable: true},
                {data:'lot', name : 'lot',orderable: true, searchable: true},
                {data:'name_tenant', name : 'name_tenant',orderable: true, searchable: true},
                {data:'status', name : 'status',orderable: true, searchable: true},
                {data: 'status_building', name: 'status_building'},
                {data: 'action', name: 'action'},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 

        
    });


    //Edit factory estate
    function editEstate(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/estate/list/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#env_add').modal('show');
            console.log(res.id);
            $('#id').val(res.id);
            $('#tenant').val(res.name_tenant);
            $('#category').val(res.id_factory_category);
            $('#lot').val(res.lot);
            $('#occupied').val(res.status_vacant);
            $('#hod').val(res.hod);
            $('#eol').val(res.eol);
            $('#land_area').val(res.land_area);
            $('#satuan').val(res.satuan);
            $('#status_building').val(res.status_building);
            document.getElementById("sop_title").innerHTML = '<i class="fas fa-edit"></i> Edit Form';
            // $('#efile').attr('src', SITEURL +'public/file/'+res.cover);

            }
        });
    }

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
        $('#id').val('');
        $('#tenant').val('');
        $('#category').prop('selectedIndex', 0);
        $('#lot').val('');
        $('#occupied').prop('selectedIndex', 0);
        $('#hod').val('');
        $('#eol').val('');
        $('#land_area').val('');
        $('#satuan').prop('selectedIndex', 0);
        // dorm
            $('#id_dorm').val('');
            $('#tenant').val('');
            $('#unit').val('');
            $('#block').prop('selectedIndex', 0);
            $('#occupied').prop('selectedIndex', 0);
            $('#vacant').val('0');
            $('#hod').val('');
            $('#remark').val('');
        //town center
            $('#id_town').val('');
            $('#type').prop('selectedIndex', 0);
            $('#stall_no').val('');
            $('#name_stall').val('');
            $('#hod_town').val('');
            $('#remark_town').val('');
        //metereading
            $('#id_meter').val('');
            $('#name').val('');
            $('#electricity_consump').val('');
            $('#water_consump').val('');
            $('#type_meter').prop('selectedIndex', 0);
            $('#start_date').val('');
            $('#end_date').val('');

    }

    $('#estate_list_add').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('estate.list.add')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            if(data.success == 1){
                $("#env_add").modal('hide');
                
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

    
    $('#dorm_list_add').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('estate.dorm.store')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            if(data.success == 1){
                $("#dorm_add").modal('hide');
                table_dorm.ajax.reload();
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

    function editDorm(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/estate/dorm/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#dorm_add').modal('show');
            console.log(res.id);
            $('#id_dorm').val(res.id);
            $('#tenant').val(res.name_tenant);
            $('#unit').val(res.unit);
            $('#block').val(res.block);
            $('#occupied').val(res.status_vacant);
            $('#vacant').val(res.vacant);
            $('#hod').val(res.hod);
            $('#remark').val(res.remark);
            document.getElementById("sop_title").innerHTML = '<i class="fas fa-edit"></i> Edit Form';
            // $('#efile').attr('src', SITEURL +'public/file/'+res.cover);

            }
        });
    }

    //delete Estate
   function deleteDorm(id){
            if (confirm("Delete list ini?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/estate/dorm/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){
                        // var oTable = $('#table_est').dataTable();
                        // oTable.fnDraw(false);
                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table_dorm.ajax.reload();
                    }
                });
            }
    }


    $('#town_list_add').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('estate.town.store')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            if(data.success == 1){
                $("#town_add").modal('hide');
                tbl_town.ajax.reload();
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
    
    function editTown(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/estate/town/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#town_add').modal('show');
            console.log(res.id);
            $('#id_town').val(res.id);
            $('#type').val(res.id_type);
            $('#stall_no').val(res.stall_no);
            $('#name_stall').val(res.name_stall);
            $('#hod_town').val(res.hod);
            $('#remark_town').val(res.remark);
            document.getElementById("sop_title").innerHTML = '<i class="fas fa-edit"></i> Edit Form';
            // $('#efile').attr('src', SITEURL +'public/file/'+res.cover);

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

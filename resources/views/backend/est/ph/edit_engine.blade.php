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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Power House')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Edit')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->


    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="layout-top-spacing mb-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing">
                            <div class="col-lg-12 layout-spacing">
                                <!-- Your Content Here -->

                                 <!-- BASIC -->
                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                    <div class="widget-content widget-content-area br-6">
                                        <h4 class="table-header"><i class="las la-edit text-success"></i> {{$param}}</h4>
                                        <div class="table-responsive mb-4">
                                            <hr>
                                            
                                            <div class="row">                            

                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputName" class="form-label">ENGINE SERIES<span class="text-danger">(*)</span></label>
                                                        <input type="hidden" name="id_engine" id="id_engine"/>
                                                        <input type="text" value="{{ $show->engine_series }}" name="engine_series" id="engine_series" class=" rounded-1 form-control" placeholder="{{ $show->name_series }}"/>
                                                       
                                                    </div>
                                                </div>
                            
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputName" class="form-label">ENGINE CODE<span class="text-danger">(*)</span></label>
                                                        <input type="text" value="{{ $show->engine_code }}" class="form-control rounded-1" placeholder="Engine Code" id="engine_code" name="engine_code">
                                                       
                                                    </div>
                                                </div>
                                                
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputName" class="form-label">VOLTAGE OUTPUT<span class="text-danger">(*)</span></label>
                                                        <input type="text" value="{{ $show->voltage_output }}" class="form-control rounded-1" placeholder="Voltage Output" id="voltage_output" name="voltage_output">
                                                       
                                                    </div>
                                                </div>
                                                
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputName" class="form-label">CAPACITY<span class="text-danger">(*)</span></label>
                                                        <input type="text" value="{{ $show->capacity }}" class="form-control rounded-1" placeholder="Capacity" id="capacity" name="capacity">
                                                       
                                                    </div>
                                                </div>
                            
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputName" class="form-label">MERK<span class="text-danger">(*)</span></label>
                                                        <input type="text" value="{{ $show->merk }}" class="form-control rounded-1" placeholder="Merk" id="merk" name="merk">
                                                       
                                                    </div>
                                                </div>
                            
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    
                                                </div>
                            
                                            </div>

                                            <button class=" btn btn-sm btn-primary mb-3" ><i class="las la-plus"></i>Add Drawing</button>
                                                    <table id="table_drawing" class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Manual book</th>
                                                                <th scope="col">Document</th>
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

        var table_drawing;
        var SITEURL = '{{URL::to('')}}';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready( function () {
            $('#table_drawing').DataTable();

        });

       function delete(id){

       }

    </script>
@endpush
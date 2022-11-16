@extends('layouts.master')

@push('plugin-styles')
    {!! Html::style('assets/css/ui-elements/breadcrumbs.css') !!}
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('assets/css/basic-ui/tabs.css') !!}
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
                                <li class="breadcrumb-item active"><a href="javascript:void(0);">{{__('POD')}}</a></li>
                                <li class="breadcrumb-item " aria-current="page"></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    
    {{-- Modal arrival ship --}}
    <div class="modal fade bd-example-modal-xl" id="ship_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="arrival_ship_add" name="arrival_ship_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="las la-ship text-primary"></i>
                    Arrival Ship</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NAME OF SHIP <span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id" id="id"/>
                            {!! Form::text('name_ship', null, array('id'=> 'name_ship','placeholder' => 'Name of Ship','class' => 'rounded-1 form-control', 'required')) !!}
                            <div class="invalid-feedback">
                                Please enter your name ship
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">GT <span class="text-danger">(*)</span> </label>
                            {!! Form::number('gt', null, array('id'=> 'gt','placeholder' => 'GT','class' => 'rounded-1 form-control','required')) !!}
                            @error('gt')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DATE ARRIVE <span class="text-danger">(*)</span> </label>
                            {!! Form::date('date_arrive', null, array('id'=> 'date_arrive','placeholder' => 'Date Arrive','class' => 'rounded-1 form-control')) !!}
                            @error('total_foreign_worker')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">FLAG <span class="text-danger">(*)</span> </label>
                            <input type="text" id="gt_flag" name="gt_flag" class="form-control" placeholder="Flag" required/>
                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DEPARTURE <span class="text-danger">(*)</span> </label>
                            <input type="date" id="departure" name="departure" class="form-control" placeholder="Departure" required/>
                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">PORT ORIGIN <span class="text-danger">(*)</span> </label>
                            <input type="text" id="port_origin" name="port_origin" class="form-control" placeholder="Port Origin" required/>
                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DEMOLISH (Ton) <span class="text-danger">(*)</span> </label>
                            <input type="number" id="demolish" name="demolish" class="form-control" placeholder="Demolish (Ton)" required/>
                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DEBARKATION  </label>
                            <input type="text" id="debarkation" name="debarkation" class="form-control" placeholder="Debarkation" />
                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DESTINATION PORT <span class="text-danger">(*)</span> </label>
                            <input type="text" id="destination_port" name="destination_port" class="form-control" placeholder="Destination Port" required/>
                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TYPE OF GOODS <span class="text-danger">(*)</span> </label>
                            <input type="text" id="type_of_goods" name="type_of_goods" class="form-control" placeholder="Type of Goods / People" required/>
                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">PAYLOAD <span class="text-danger">(*)</span> </label>
                            <input type="number" id="payload" name="payload" class="form-control" placeholder="Payload" required/>
                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">EMBARKATION  </label>
                            <input type="text" id="embarkation" name="embarkation" class="form-control" placeholder="Embarkation" />
                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TRAYEK STATUS  </label>
                            <select class="custom-select rounded-1" placeholder="" id="trayek_status_l_t" name="trayek_status_l_t" >
                                <option disable>-- Pilih -- </option>
                                <option value="L">L</option>
                                <option value="T">T</option>
                            </select>
                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TRAYEK STATUS <span class="text-danger">(*)</span> </label>
                            <select class="custom-select rounded-1" placeholder="" id="trayek_status_m_ch_k" name="trayek_status_m_ch_k" required>
                                <option disable>-- Pilih -- </option>
                                <option value="M">M</option>
                                <option value="CH">CH</option>
                                <option value="CH">K</option>
                            </select>
                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">VALIDATE PERIODE  </label>
                            <input type="text" id="validate_period" name="validate_period" class="form-control" placeholder="Validate Periode" />
                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">PORT LOCATION <span class="text-danger">(*)</span> </label>
                            <input type="text" id="port_location" name="port_location" class="form-control" placeholder="Port Location" required/>
                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
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

    {{-- Modal Import --}}
    <div class="modal fade bd-example-modal-xl" id="import_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="import_cargo_add" name="import_cargo_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="la la-plus"></i> 
                    Report Of Cargo Import
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">IMPORT CONTAINER 20 & 40 <span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_import" id="id_import"/>
                            <select class="custom-select rounded-1" placeholder="" id="import_container" name="import_container" required>
                                <option disable>-- Select -- </option>
                                <option value="1">No Loaded</option>
                                <option value="2">Tonnage Loaded</option>
                                <option value="3">Empty</option>
                                <option value="3">Tonnage Empty</option>
                            </select>
                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TONNAGE IN LOOSE<span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="tonnage_in_loose" id="tonnage_in_loose" placeholder="Tonnage In Loose" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TONNAGE CARGO <span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="tonnage_cargo" id="tonnage_cargo" placeholder="Tonnage Cargo" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TOTAL OF TEU'S <span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="total_teus" id="total_teus" placeholder="Total of Teu's" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TOTAL OF PACKAGE <span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="total_package" id="total_package" placeholder="Total of Package" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TOTAL <span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="total" id="total" placeholder="Total" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
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

    {{-- Modal Export --}}
    <div class="modal fade bd-example-modal-xl" id="export_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="export_cargo_add" name="export_cargo_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="la la-plus"></i> 
                    Report Of Cargo Export
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">IMPORT CONTAINER 20 & 40 <span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_export" id="id_export"/>
                            <select class="custom-select rounded-1" placeholder="" id="export_container" name="export_container" required>
                                <option disable>-- Select -- </option>
                                <option value="1">No Loaded</option>
                                <option value="2">Tonnage Loaded</option>
                                <option value="3">Empty</option>
                                <option value="3">Tonnage Empty</option>
                            </select>
                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TONNAGE IN LOOSE<span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="tonnage_in_loose_export" id="tonnage_in_loose_export" placeholder="Tonnage In Loose" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TONNAGE CARGO <span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="tonnage_cargo_export" id="tonnage_cargo_export" placeholder="Tonnage Cargo" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TOTAL OF TEU'S <span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="total_teus_export" id="total_teus_export" placeholder="Total of Teu's" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TOTAL OF PACKAGE <span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="total_package_export" id="total_package_export" placeholder="Total of Package" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TOTAL <span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="total_export" id="total_export" placeholder="Total" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
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

    {{-- Modal  Sbpn report --}}
    <div class="modal fade bd-example-modal-xl" id="sbnp_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_sbnp_add" name="form_sbnp_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="la la-book"></i> 
                    SBNP Report
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Location Name</label><span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_sbnp" id="id_sbnp"/>
                            <input type="text" class="form-control" name="name_location" id="name_location" placeholder="Location Name" required/>
                            <div class="invalid-feedback">
                                Location name required
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">POSITION<span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="position" id="position" placeholder="Position" required/>

                            <div class="invalid-feedback">
                                Position Reuqired!
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DSI <span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="dsi" id="dsi" placeholder="DSI" required/>

                            <div class="invalid-feedback">
                               DSI Required
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">COLOR LIGHT <span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="color_light" id="color_light" placeholder="Color Light" required/>

                            <div class="invalid-feedback">
                                Colour Reuqired!
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">SBNP TYPE <span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="type" id="type" placeholder="SBNP Type" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">POWER SOURCE <span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="power_source" id="power_source" placeholder="Power Source" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">BEACON CONSTRUCTION <span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="beacon_construction" id="beacon_construction" placeholder="Beacon Construction" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">HEIGHT CONSTRUCTION <span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="construction_height" id="construction_height" placeholder="Height Construction" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">COLOR CONSTRUCTION <span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="construction_color" id="construction_color" placeholder="Color Construction" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">VISIBLE DISTANCE <span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="visible_distance" id="visible_distance" placeholder="Visible Distance" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Remark <span class="text-danger">(*)</span> </label>
                            <textarea class="form-control" id="remark" name="remark" rows="3"  placeholder="Remark Detail Activity"></textarea>
                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
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

    {{-- Modal Abnormal Report --}}
    <div class="modal fade bd-example-modal-xl" id="abnormal_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_abnormal_add" name="form_abnormal_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="la la-plus"></i> 
                    Report
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DSI <span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_abnormal" id="id_abnormal"/>
                            <input type="text" class="form-control" name="dsi_abnormal" id="dsi_abnormal" placeholder="DSI" required/>
                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TYPE<span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="type_abnormal" id="type_abnormal" placeholder="Type" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">LOCATION NAME<span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="location_name_abnormal" id="location_name_abnormal" placeholder="Location Name" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">POWER SOURCE <span class="text-danger">(*)</span> </label>
                            <input type="text" class="form-control" name="power_source_abnormal" id="power_source_abnormal" placeholder="Power Source" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">ROOT CAUSE </label>
                            <input type="text" class="form-control" name="root_cause_abnormal" id="root_cause_abnormal" placeholder="Root Cause" />

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TOTAL DAYS </label>
                            <input type="text" class="form-control" name="number_day_abnormal" id="number_day_abnormal" placeholder="Total Days" />

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">REMARK <span class="text-danger">(*)</span> </label>
                            
                            <textarea class="form-control textarea" name="remark_abnormal" id="remark_abnormal" rows="3" placeholder="Remark" ></textarea>
                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
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


    {{-- Modal Port Facility --}}
    <div class="modal fade bd-example-modal-xl" id="port_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_port_add" name="form_port_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="la la-plus"></i> 
                    Add Port Facility
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">LICENSE NO <span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_port" id="id_port"/>
                            <input type="text" class="form-control" name="license_no" id="license_no" placeholder="License Number" required/>
                            <div class="invalid-feedback">
                                Please enter your License
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DATE ISSUE<span class="text-danger">(*)</span> </label>
                            <input type="date" class="date-picker form-control" name="date_issue" id="date_issue" placeholder="Type" required/>

                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">VALIDITY PERIOD </label>
                            <input type="date" class="date-picker form-control" name="validity_period" id="validity_period" placeholder="Validate Periode"/>

                            <div class="invalid-feedback">
                                Please enter your Valid Period
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Permission Type <span class="text-danger">(*)</span> </label>
                            
                            <textarea class="textarea form-control"  rows="3" id="permission_type" name="permission_type" placeholder="Exm (Izin stasion radio rantai / etc)"></textarea>
                            <div class="invalid-feedback">
                                Please enter your Permission Type
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">AGENCY OF ISSUED THE PERMIT </label>
                            <textarea class="textarea form-control" placeholder="Exm (Kementrian RI / etc ...)" rows="3" id="instantion_permit" name="instantion_permit"></textarea>
                            <div class="invalid-feedback">
                                Please enter your Port Origin
                            </div>
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
    <div class="">
        <div class="layout-top-spacing">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing date-table-container">
                            <!-- Datatable with a dropdown -->
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                                <div class="widget-content widget-content-area br-12">
                                    <ul class="nav nav-tabs mb-2 mt-2" id="normaltab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>{{__('Arrrival Ship')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><b> {{__('Report of Cargo Import')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="export-tab" data-toggle="tab" href="#export" role="tab" aria-controls="export" aria-selected="false"><b> {{__('Report of Cargo Export')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="sbnp-tab" data-toggle="tab" href="#sbnp" role="tab" aria-controls="sbnp" aria-selected="false"><b> {{__('SNBP Report')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="abnormal-tab" data-toggle="tab" href="#abnormal" role="tab" aria-controls="abnormal" aria-selected="false"><b> {{__('Abnormal Report SBNP')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="port-tab" data-toggle="tab" href="#port" role="tab" aria-controls="port" aria-selected="false"><b> {{__('Permit & Port Facility')}}</b></a>
                                        </li>

                                    </ul>

                                    <div class="tab-content" id="normaltabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            {{-- content tenant --}}
                                            <div class="table-responsive mb-4">
                                                @can('pod-add')
                                                    <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#ship_add">
                                                        <i class="las la-plus sidemenu-right-icon"></i>Add List
                                                    </button>
                                                @endcan
        
                                                <table id="table_ship" class="table table-hover" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>{{__('No')}}</th>
                                                        <th>{{__('Name of Ship')}}</th>
                                                        <th>{{__('Flag GT')}}</th>
                                                        <th>{{__('Date Arrive')}}</th>
                                                        <th>{{__('Port Origin')}}</th>
                                                        <th>{{__('Destination Port')}}</th>
                                                        <th class="no-content"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                                            {{-- content man import --}}
                                            @can('pod-add')
                                            <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#import_add">
                                                <i class="las la-plus sidemenu-right-icon"></i>Add List
                                            </button>
                                            @endcan

                                            <table id="table_import" class="table table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>{{__('No')}}</th>
                                                    <th>{{__('Container 20 & 40')}}</th>
                                                    <th>{{__('Tonnage in Loose')}}</th>
                                                    <th>{{__('Tonnage Cargo')}}</th>
                                                    <th>{{__('Total of Teus')}}</th>
                                                    <th>{{__('Total No of Package')}}</th>
                                                    <th>{{__('Total')}}</th>
                                                    <th class="no-content"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                
                                                </tbody>
                                                
                                            </table>
                                        </div>

                                        <div class="tab-pane fade" id="export" role="tabpanel" aria-labelledby="export-tab">
                                            {{-- content man import --}}
                                            @can('pod-add')
                                            <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#export_add">
                                                <i class="las la-plus sidemenu-right-icon"></i>Add List
                                            </button>
                                            @endcan
                                            
                                            <table id="table_export" class="table table-hover text-center" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>{{__('No')}}</th>
                                                    <th>{{__('Container 20 & 40')}}</th>
                                                    <th>{{__('Tonnage in Loose')}}</th>
                                                    <th>{{__('Tonnage Cargo')}}</th>
                                                    <th>{{__('Total of Teus')}}</th>
                                                    <th>{{__('Total No of Package')}}</th>
                                                    <th>{{__('Total')}}</th>
                                                    <th class="no-content"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="sbnp" role="tabpanel" aria-labelledby="sbnp-tab">
                                            {{-- content man import --}}
                                            @can('pod-add')
                                            <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#sbnp_add">
                                                <i class="las la-plus sidemenu-right-icon"></i>Add Report
                                            </button>
                                            @endcan
                                                
                                            <table id="table_sbnp" class="table table-hover text-center" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>{{__('No')}}</th>
                                                    <th>{{__('Location name')}}</th>
                                                    <th>{{__('Position')}}</th>
                                                    <th>{{__('DSI')}}</th>
                                                    <th>{{__('Color Light')}}</th>
                                                    <th>{{__('Type')}}</th>
                                                    <th>{{__('Power Source')}}</th>
                                                    <th>{{__('Beacon Construction')}}</th>
                                                    <th>{{__('Construction Height')}}</th>
                                                    <th class="no-content"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                
                                                </tbody>
                                                
                                            </table>
                                        </div>

                                        <div class="tab-pane fade" id="abnormal" role="tabpanel" aria-labelledby="abnormal-tab">

                                            {{-- content abnormal report sbnp --}}

                                            @can('pod-add')
                                                <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#abnormal_add">
                                                    <i class="las la-plus sidemenu-right-icon"></i>Add Report
                                                </button>
                                            @endcan
                                            
                                            <table id="table_abnormal" class="table table-hover text-center" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>{{__('No')}}</th>
                                                    <th>{{__('DSI')}}</th>
                                                    <th>{{__('Type / Location Name')}}</th>
                                                    <th>{{__('POWER SOURCE')}}</th>
                                                    <th>{{__('ABNORMAL CAUSE')}}</th>
                                                    <th>{{__('TOTAL DAYS')}}</th>
                                                    <th>{{__('REMARK')}}</th>
                                                    <th class="no-content"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                
                                                </tbody>
                                                
                                            </table>

                                        </div>

                                        <div class="tab-pane fade" id="port" role="tabpanel" aria-labelledby="port-tab">
                                          
                                            {{-- content abnormal report sbnp --}}
                                            @can('pod-add')
                                            <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#port_add">
                                                <i class="las la-plus sidemenu-right-icon"></i>Add Facility
                                            </button>
                                            @endcan
                                            <table id="table_port" class="table table-hover text-center" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>{{__('No')}}</th>
                                                        <th>{{__('License No')}}</th>
                                                        <th>{{__('Date Issue')}}</th>
                                                        <th>{{__('Validity Period')}}</th>
                                                        <th>{{__('Instantion Permit')}}</th>
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

    var SITEURL = '{{URL::to('')}}';

    var table_ship, table_import, table_export, table_sbnp, table_abnormal,table_port;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(document).ready(function() {

        // table ship
        table_ship = $('#table_ship').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        
        ajax: {
            
            url: "{{ route('pod') }}",
            type: "GET"
            
        },
            columns: [
               
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'name_ship', name : 'name_ship',orderable: true, searchable: true},
                {data: 'gt_flag', name: 'gt_flag', orderable: true, searchable: true},  
                {data: 'date_arrive', name: 'date_arrive', orderable: true, searchable: true},            
                {data:'port_origin', name : 'port_origin',orderable: true, searchable: false},
                {data:'destinantion_port', name : 'destinantion_port',orderable: true, searchable: false},
                {data:'action', name : 'action',orderable: true, searchable: false},
            ]
        }); 


        // table import cargo
        table_import = $('#table_import').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        
        ajax: {
            
            url: "{{ route('pod.cargo.import') }}",
            type: "GET"
            
        },
            columns: [
               
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'import_container', name : 'import_container',orderable: true, searchable: true},
                {data: 'tonnage_in_loose', name: 'tonnage_in_loose', orderable: true, searchable: true},  
                {data: 'tonnage_cargo', name: 'tonnage_cargo ', orderable: true, searchable: true},            
                {data:'total_teus', name : 'total_teus',orderable: true, searchable: false},
                {data:'total_package', name : 'total_package',orderable: true, searchable: false},
                {data:'total', name : 'total',orderable: true, searchable: false},
                {data:'action', name : 'action',orderable: true, searchable: false},
            ]
        }); 


        // table export cargo
        table_export = $('#table_export').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        
        ajax: {
            
            url: "{{ route('pod.cargo.export') }}",
            type: "GET"
            
        },
            columns: [
               
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'container', name : 'container',orderable: true, searchable: true},
                {data: 'tonnage_in_loose', name: 'tonnage_in_loose', orderable: true, searchable: true},  
                {data: 'tonnage_cargo', name: 'tonnage_cargo ', orderable: true, searchable: true},            
                {data:'total_teus', name : 'total_teus',orderable: true, searchable: false},
                {data:'total_package', name : 'total_package',orderable: true, searchable: false},
                {data:'total', name : 'total',orderable: true, searchable: false},
                {data:'action', name : 'action',orderable: true, searchable: false},
            ]
        }); 

        table_sbnp = $('#table_sbnp').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        
        ajax: {
            
            url: "{{ route('pod.sbnp') }}",
            type: "GET"
            
        },
            columns: [
               
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'name_location', name : 'name_location',orderable: true, searchable: true},
                {data: 'position', name: 'position', orderable: true, searchable: true},  
                {data: 'dsi', name: 'dsi', orderable: true, searchable: true},  
                {data:'color_light', name : 'color_light',orderable: true, searchable: false},          
                {data:'type', name : 'type',orderable: true, searchable: false},
                {data:'power_source', name : 'power_source',orderable: true, searchable: false},
                {data:'beacon_construction', name : 'beacon_construction',orderable: true, searchable: false},
                {data:'construction_height', name : 'construction_height',orderable: true, searchable: false},
                {data:'action', name : 'action',orderable: true, searchable: false},
            ]
        }); 

        // beacon upnormal
        table_abnormal = $('#table_abnormal').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        
        ajax: {
            
            url: "{{ route('pod.beacon') }}",
            type: "GET"
            
        },
            columns: [
               
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'dsi', name : 'dsi',orderable: true, searchable: true},
                {data: 'type', name: 'type', orderable: true, searchable: true},  
                {data: 'power_source', name: 'power_source', orderable: true, searchable: true},  
                {data:'root_cause', name : 'root_cause',orderable: true, searchable: false},          
                {data:'number_day', name : 'number_day',orderable: true, searchable: false},
                {data:'remark', name : 'remark',orderable: true, searchable: false},
                {data:'action', name : 'action',orderable: true, searchable: false},
            ]
        }); 

        // port
        table_port = $('#table_port').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        
        ajax: {
            
            url: "{{ route('pod.port_permit') }}",
            type: "GET"
            
        },
            columns: [
               
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'license_no', name : 'license_no',orderable: true, searchable: true},
                {data: 'date_issue', name: 'date_issue', orderable: true, searchable: true},  
                {data: 'validity_period', name: 'validity_period', orderable: true, searchable: true},  
                {data:'instantion_permit', name : 'instantion_permit',orderable: true, searchable: false},          
                {data:'action', name : 'action',orderable: true, searchable: false},
            ]
        });
          
    });

    $('#arrival_ship_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('pod.ship_arrive.add')}}",
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
                $("#ship_add").modal('hide');
                table_ship.ajax.reload();
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })
    });


    $('#import_cargo_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('pod.cargo-import.add')}}",
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
                $("#import_add").modal('hide');
                table_import.ajax.reload();
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })
    });


    $('#export_cargo_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('pod.cargo-export.add')}}",
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
                $("#export_add").modal('hide');
                table_export.ajax.reload();
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })
    });

    

    $('#form_sbnp_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('pod.sbnp.add')}}",
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
                $("#sbnp_add").modal('hide');
                table_sbnp.ajax.reload();
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })
    });

    // add abnormal
    $('#form_abnormal_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('pod.beacon.add')}}",
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
                $("#abnormal_add").modal('hide');
                table_abnormal.ajax.reload();
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })
    });

    // add abnormal
    $('#form_port_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('pod.port_permit.add')}}",
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
                $("#port_add").modal('hide');
                table_port.ajax.reload();
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })
    });

    //Edit ship
    function editShip(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/pod/ship_arrive/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#ship_add').modal('show');
            $('#id').val(res.id);
            $('#name_ship').val(res.name_ship);
            $('#gt_flag').val(res.gt_flag);
            $('#gt').val(res.gt);
            $('#departure').val(res.departure);
            $('#date_arrive').val(res.date_arrive);
            $('#port_origin').val(res.port_origin);
            $('#demolish').val(res.demolish);
            $('#debarkation').val(res.debarkation);
            $('#destination_port').val(res.destinantion_port);
            $('#type_of_goods').val(res.type_of_goods);
            $('#payload').val(res.payload);
            $('#embarkation').val(res.embarkation);
            $('#trayek_status_l_t').val(res.trayek_status_l_t);
            $('#trayek_status_m_ch_k').val(res.trayek_status_m_ch_k);
            $('#validate_period').val(res.validate_period_rpt);
            $('#ppkn').val(res.ppkn);
            $('#ppkm').val(res.ppkm);
            $('#ppka').val(res.ppka);
            $('#port_location').val(res.port_location);


            }
        });
    }

    //delete tenant
   function deleteShip(id){
            if (confirm("Delete this request?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/pod/ship_arrive/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `Data succesfully!`,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        table_ship.ajax.reload();
                    }
                });
            }
    }

    //Edit Sbnp
    function editSnbp(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/pod/sbnp/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#sbnp_add').modal('show');
            $('#id_sbnp').val(res.id);
            $('#name_location').val(res.name_location);
            $('#position ').val(res.position);
            $('#dsi').val(res.dsi);
            $('#color_light').val(res.color_light);
            $('#type').val(res.type);
            $('#power_source').val(res.power_source);
            $('#construction_height').val(res.construction_height);
            $('#construction_color').val(res.construction_color);
            $('#beacon_construction').val(res.beacon_construction);
            $('#visible_distance').val(res.visible_distance);
            $('#remark').val(res.remark);
            }
        });
    }

    //delete sbnp
   function deleteSbnp(id){
            if (confirm("Delete this item?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/pod/sbnp/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table_sbnp.ajax.reload();
                    }
                });
            }
    }

    //Edit ManPower
    function editImport(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/pod/cargo-import/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#import_add').modal('show');
            $('#id_import').val(res.id);
            $('#tonnage_in_loose ').val(res.tonnage_in_loose);
            $('#total_teus').val(res.total_teus);
            $('#total_package').val(res.total_package);
            $('#total').val(res.total);

            }
        });
    }

    //delete man power
   function deleteImport(id){
            if (confirm("Delete this item?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/pod/cargo-import/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table_import.ajax.reload();
                    }
                });
            }
    }


     //Edit export
     function editExport(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/pod/cargo-export/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#export_add').modal('show');
            $('#id_export').val(res.id);
            $('#export_container').val(res.export_container);
            $('#tonnage_in_loose_export').val(res.tonnage_in_loose);
            $('#total_teus_export').val(res.total_teus);
            $('#total_package_export').val(res.total_package);
            $('#total_export').val(res.total);

            }
        });
    }

    //delete export
   function deleteExport(id){
            if (confirm("Delete this item?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/pod/cargo-export/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table_export.ajax.reload();
                    }
                });
            }
    }


    //Edit Abnormal
    function editAbnormal(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/pod/beacon/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#abnormal_add').modal('show');
            $('#id_abnormal').val(res.id);
            $('#dsi_abnormal').val(res.dsi);
            $('#type_abnormal').val(res.type);
            $('#location_name_abnormal').val(res.location_name);
            $('#power_source_abnormal').val(res.power_source);
            $('#root_cause_abnormal').val(res.root_cause);
            $('#number_day_abnormal').val(res.number_day);
            $('#remark_abnormal').val(res.remark);
            
            }
        });
    }

    //delete abnormal
   function deleteAbnormal(id){
            if (confirm("Delete this report?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/pod/beacon/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table_abnormal.ajax.reload();
                    }
                });
            }
    }

    //Edit port
    function editPort(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/pod/port_permit/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#port_add').modal('show');
            $('#id_port').val(res.id);
            $('#license_no').val(res.license_no);
            $('#date_issue').val(res.date_issue);
            $('#validity_period').val(res.validity_period);
            $('#permission_type').val(res.permission_type);
            $('#instantion_permit').val(res.instantion_permit);
            
            }
        });
    }

    //delete port
   function deletePort(id){
            if (confirm("Delete this record?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/pod/port_permit/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table_port.ajax.reload();
                    }
                });
            }
    }


    function clearField(){
        $('#id').val('');
        $('#name_ship').val('');
        $('#gt_flag').val('');
        $('#gt').val('');
        $('#departure').val('');
        $('#date_arrive').val('');
        $('#port_origin').val('');     
        $('#demolish').val(''); 
        $('#debarkation').val(''); 
        $('#type_of_goods').val('');   
        $('#destination_port').val(''); 
        $('#payload').val(''); 
        $('#embarkation').val(''); 
        $('#trayek_status_l_t').prop('selectedIndex', 0);
        $('#trayek_status_m_ch_k').prop('selectedIndex', 0);
        $('#validate_period').val(''); 
        $('#port_location').val(''); 

        $('#id_export').val('');
        $('#export_container').prop('selectedIndex', 0);
        $('#tonnage_in_loose_export').val('');
        $('#tonnage_cargo_export').val('');
        $('#total_teus_export').val('');     
        $('#total_package_export').val(''); 
        $('#total_export').val(''); 

        $('#id_import').val('');   
        $('#tonnage_in_loose').prop('selectedIndex', 0);
        $('#tonnage_cargo').val(''); 
        $('#total_teus').val(''); 
        $('#total_package').val(''); 
        $('#total').val(''); 

        // // sbnp
            $('#id_sbnp').val('');   
            $('#name_location').val('');
            $('#position ').val('');
            $('#dsi').val('');
            $('#color_light').val('');
            $('#type').val('');
            $('#power_source').val('');
            $('#construction_height').val('');
            $('#construction_color').val('');
            $('#beacon_construction').val('');
            $('#visible_distance').val('');
            $('#remark').val('');
        // abnormal
        $('#id_abnormal').val('');   
            $('#name_location_abnormal').val('');
            $('#dsi_abnormal').val('');
            $('#type_abnormal').val('');
            $('#power_source_abnormal').val('');
            $('#root_cause_abnormal').val('');
            $('#number_day_abnormal').val('');
            $('#remark_abnormal').val('');
        // port facility
        $('#id_port').val('');   
        $('#license_no').val('');
        $('#validity_period').val('');
        $('#date_issue').val('');
        $('#permission_type').val('');
        $('#instantion_permit').val('');
            
    }
</script>
@endpush

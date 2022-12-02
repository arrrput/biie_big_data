@extends('layouts.master')

@push('plugin-styles')
    {!! Html::style('plugins/select2/select2.min.css') !!}
    {!! Html::style('assets/css/forms/form-widgets.css') !!}
    {!! Html::style('assets/css/ui-elements/breadcrumbs.css') !!}
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('assets/css/basic-ui/tabs.css') !!}
    {!! Html::style('plugins/dropify/dropify.min.css') !!}
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
                                {{-- <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('')}}</a></li> --}}
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('CRS ')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    

    {{-- Modal add request --}}
    <div class="modal fade bd-example-modal-xl" id="request_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="tenant_request_add" name="tenant_request_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="fa fa-plus"></i> 
                    Add Request Tenant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TENANT NAME<span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id" id="id"/>
                            {!! Form::text('tenant_name', null, array('id'=> 'tenant_name','placeholder' => 'Tenant Name','class' => 'rounded-1 form-control')) !!}
                            @error('tenant_name')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DESCRIPTION <span class="text-danger">(*)</span> </label>
                            <textarea name="description" id="description" class="form-control" placeholder="Description" style=""></textarea>
                            @error('job_title')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DEPARTMENT</label>
                            <select class="custom-select rounded-1" placeholder="" id="id_department" name="id_department">
                                <option disable>-- Pilih -- </option>
                               @foreach ($dept as $list)
                               <option value="{{ $list->id }}">{{ $list->name }}</option>
                               @endforeach
                            </select>
                            @error('job_title')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TARGET OF COMPLETION</label>
                            {!! Form::date('target_completion', null, array('id'=> 'target_completion','placeholder' => 'DATE','class' => 'rounded-1 form-control')) !!}
                            {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                            @error('target_completion')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">STATUS OF REQUEST</label>
                            {!! Form::text('status', null, array('id'=> 'status','placeholder' => 'Exp (Done / OnProgress/ etc)','class' => 'rounded-1 form-control')) !!}
                            @error('status')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">RECEIVED BY</label>
                            {!! Form::text('received_by', null, array('id'=> 'received_by','placeholder' => 'Received By','class' => 'rounded-1 form-control')) !!}
                            @error('status')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">PIC</label>
                            {!! Form::text('pic', null, array('id'=> 'pic','placeholder' => 'Name PIC','class' => 'rounded-1 form-control')) !!}
                            @error('status')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">ROOT CAUSE</label>
                            <textarea name="root_cause" id="root_cause" class="form-control" placeholder="Root Cause . . . ." style=""></textarea>
                            @error('status')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">CORRECTION</label>
                            <textarea name="correction" id="correction" class="form-control" placeholder="Correction . . ." style=""></textarea>
                            @error('status')
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

    {{-- Modal Man Power --}}
    <div class="modal fade bd-example-modal-xl" id="manpower_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="man_power_add" name="tenant_request_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="fa fa-plus"></i> 
                    Add Man Power</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TOTAL TENANT <span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_manpower" id="id_manpower"/>
                            {!! Form::number('total_tenant', null, array('id'=> 'total_tenant','placeholder' => 'Total Tenant','class' => 'rounded-1 form-control')) !!}
                            @error('total_tenant')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TOTAL EMPLOYEE <span class="text-danger">(*)</span> </label>
                            {!! Form::number('total_employee', null, array('id'=> 'total_employee','placeholder' => 'Total Employee','class' => 'rounded-1 form-control')) !!}
                            @error('job_title')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TOTAL FOREIGN WORKERS <span class="text-danger">(*)</span> </label>
                            {!! Form::number('total_foreign_worker', null, array('id'=> 'total_foreign_worker','placeholder' => 'Total Foreign Workers','class' => 'rounded-1 form-control')) !!}
                            @error('total_foreign_worker')
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

    {{-- Modal Investor Visit --}}
    <div class="modal fade bd-example-modal-xl" style="overflow:hidden;" id="visitor_add" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_visitor_add" name="form_visitor_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="las la-tasks"></i>
                    Investor Visit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Facility <span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_manpower" id="id_manpower"/>
                            <select class="form-control multiple" multiple="multiple" id="select2insidemodal">
                                <option value="AF">{{__('Afghanistan')}}</option>
                                <option value="BS">{{__('Bahamas')}}</option>
                                <option value="KH" selected>{{__('Cambodia')}}</option>
                                <option value="DK">{{__('Denmark')}}</option>
                                <option value="EC">{{__('Ecuador')}}</option>
                                <option value="FK">{{__('Falkland Islands (Malvinas)')}}</option>
                                <option value="GA">{{__('Gabon')}}</option>
                                <option value="HT">{{__('Haiti')}}</option>
                                <option value="IS">{{__('Iceland')}}</option>
                                <option value="JM">{{__('Jamaica')}}</option>
                                <option value="KE">{{__('Kenya')}}</option>
                                <option value="LA">{{__('Lao People\'s Democratic Republic')}}</option>
                                <option value="MO">{{__('Macao')}}</option>
                                <option value="NA">{{__('Namibia')}}</option>
                                <option value="OM">{{__('Oman')}}</option>
                                <option value="PK">{{__('Pakistan')}}</option>
                                <option value="QA">{{__('Qatar')}}</option>
                                <option value="RO">{{__('Romania')}}</option>
                                <option value="SN">{{__('Senegal')}}</option>
                                <option value="TH">{{__('Thailand')}}</option>
                                <option value="UG">{{__('Uganda')}}</option>
                                <option value="VN">{{__('Viet Nam')}}</option>
                                <option value="EH">{{__('Western Sahara')}}</option>
                                <option value="YE">{{__('Yemen')}}</option>
                                <option value="ZW">{{__('Zimbabwe')}}</option>
                            </select>
                            @error('total_tenant')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Ijin Ke <span class="text-danger">(*)</span> </label>
                            {!! Form::number('total_employee', null, array('id'=> 'total_employee','placeholder' => 'Total Employee','class' => 'rounded-1 form-control')) !!}
                            @error('job_title')
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


    {{-- Modal Tenant --}}
    <div class="modal fade bd-example-modal-xl" id="tenantdb_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="tenant_db_add" name="tenant_db_add" method="POST"  enctype="multipart/form-data">                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="fa fa-plus"></i> 
                    Add Tenant Database</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">COMPANY NAME <span class="text-danger">(*)</span> </label>
                            <input type="hidden" name="id_db" id="id_db"/>
                            <input type="hidden" name="img" id="img"/>
                            {!! Form::text('company', null, array('id'=> 'company','placeholder' => 'Company Name','class' => 'rounded-1 form-control')) !!}
                            @error('job_title')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TYPE OF PRODUCTS <span class="text-danger">(*)</span> </label>
                            {!! Form::text('type_product', null, array('id'=> 'type_product','placeholder' => 'Type Of Product','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('type_product')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">OCCUPIED FACTORY <span class="text-danger">(*)</span> </label>
                            {!! Form::text('occupied_factory', null, array('id'=> 'occupied_factory','placeholder' => 'Occupied Factory','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('occupied_factory')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">CONTACT NUMBER <span class="text-danger">(*)</span> </label>
                            {!! Form::text('contact_no', null, array('id'=> 'contact_no','placeholder' => 'Contact Number','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('contact_no')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">PIC <span class="text-danger">(*)</span> </label>
                            {!! Form::text('pic', null, array('id'=> 'pic','placeholder' => 'PIC','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('pic')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DESIGNATION <span class="text-danger">(*)</span> </label>
                            {!! Form::text('designation', null, array('id'=> 'designation','placeholder' => 'Designation','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('designation')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Email <span class="text-danger">(*)</span> </label>
                            {!! Form::text('email', null, array('id'=> 'email','placeholder' => 'Email','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('designation')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">HR MANAGER <span class="text-danger">(*)</span> </label>
                            {!! Form::text('hr_manager', null, array('id'=> 'hr_manager','placeholder' => 'HR Manager','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('designation')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">START DATE <span class="text-danger">(*)</span> </label>
                            {!! Form::date('start_date', null, array('id'=> 'start_date','placeholder' => 'HR Manager','class' => 'date-picker rounded-1 form-control', 'required')) !!}
                            @error('start_date')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">REMARK </label>
                            <textarea name="remark" id="remark" class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Remark"></textarea>
                            @error('remark')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TOTAL EMPLOYEE </label>
                            {!! Form::number('total_employee', null, array('id'=> 'total_employee','placeholder' => 'Total Employee','class' => 'rounded-1 form-control')) !!}
                            @error('total_employee')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                            <label for="exampleInputName" class="form-label">UPLOAD PHOTO </label>
                            <input type="file" name="image" class="rounded-1 form-control" />
                            
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

                                <div class="widget-content widget-content-area br-6">
                                    <ul class="nav nav-tabs mb-2 mt-2" id="normaltab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>{{__('Request Tenant')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><b> {{__('Man Power')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="investor-tab" data-toggle="tab" href="#investor" role="tab" aria-controls="investor" aria-selected="false"><b> {{__('Investor Visit')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="tenan-tab" data-toggle="tab" href="#tenan" role="tab" aria-controls="tenan" aria-selected="false"><b> {{__('Tenant Database')}}</b></a>
                                        </li>

                                    </ul>

                                    <div class="tab-content" id="normaltabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            {{-- content tenant --}}
                                            <div class="table-responsive mb-4">

                                                <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#request_add">
                                                    <i class="las la-plus sidemenu-right-icon"></i>Add Request
                                                </button>
        
                                                <table id="table_tenant" class="table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>{{__('No')}}</th>
                                                            <th>{{__('Tenant Name')}}</th>
                                                            <th>{{__('Department')}}</th>
                                                            <th>{{__('Description')}}</th>
                                                            <th>{{__('Target Completion')}}</th>
                                                            <th>{{__('Status')}}</th>
                                                            <th class="no-content"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                                            {{-- content man power --}}
                                            <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#manpower_add">
                                                <i class="las la-plus sidemenu-right-icon"></i>Add List
                                            </button>

                                            <table id="table_manpower" class="table table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>{{__('No')}}</th>
                                                    <th>{{__('Total Tenant')}}</th>
                                                    <th>{{__('Total Employee')}}</th>
                                                    <th>{{__('Total foreign workers')}}</th>
                                                    <th class="no-content"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                       
                                                </tbody>
                                                
                                            </table>
                                        </div>

                                        <div class="tab-pane fade" id="investor" role="tabpanel" aria-labelledby="investor-tab">
                                            {{-- content man power --}}
                                            <a href="{{ route('crs.investor_add') }}" class="btn btn-primary btn-sm mb-2 mt-2" >
                                                <i class="las la-plus sidemenu-right-icon"></i>Add Visitor
                                            </a>

                                            <table id="table_fas" class="table table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>{{__('No')}}</th>
                                                    <th>{{__('Company/Organitation')}}</th>
                                                    <th>{{__('Department')}}</th>
                                                    <th>{{__('Visit date')}}</th>
                                                    <th>{{__('Arrival time')}}</th>
                                                    <th>{{__('Hours received')}}</th>
                                                    <th>{{__('Hours finish')}}</th>
                                                    <th class="no-content"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                       
                                                </tbody>
                                                
                                            </table>
                                        </div>

                                        <div class="tab-pane fade" id="tenan" role="tabpanel" aria-labelledby="tenan-tab">
                                            
                                            {{-- content man power --}}
                                            <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#tenantdb_add">
                                                <i class="las la-plus sidemenu-right-icon"></i>Add Tenant
                                            </button>

                                            <table id="table_db" class="table table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>{{__('No')}}</th>
                                                    <th>{{__('Company')}}</th>
                                                    <th>{{__('Type of Product')}}</th>
                                                    <th>{{__('Occupied Factory')}}</th>
                                                    <th>{{__('Start Date')}}</th>
                                                    <th>{{__('email')}}</th>
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
    {!! Html::script('plugins/select2/select2.min.js') !!}
    {!! Html::script('assets/js/forms/custom-select2.js') !!}
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/table/datatable/datatables.js') !!}
@endpush

@push('custom-scripts')

<script>


    var SITEURL = '{{URL::to('')}}';

    var table_tenant, table_manpower, table_fas, table_db;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(document).ready(function() {

        $("#select2insidemodal").select2({
            dropdownParent: $("#visitor_add")
        });

        // table tenant
        table_tenant = $('#table_tenant').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        
        ajax: {
            
            url: "{{ route('crs') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'name_tenant', name : 'name_tenant',orderable: true, searchable: true},
                {data: 'department', name: 'department', orderable: true, searchable: true},  
                {data: 'description', name: 'description', orderable: true, searchable: true},            
                {data:'target_completion', name : 'target_completion',orderable: true, searchable: false},
                {data:'status', name : 'status',orderable: true, searchable: false},
                {data:'action', name : 'action',orderable: true, searchable: false},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 

                // table tenant database
        table_db = $('#table_db').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        
        ajax: {
            
            url: "{{ route('crs.tenant_db') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'company', name : 'company',orderable: true, searchable: true},
                {data: 'type_product', name: 'type_product', orderable: true, searchable: true},  
                {data: 'occupied_factory', name: 'occupied_factory', orderable: true, searchable: true},            
                {data:'start_date', name : 'start_date',orderable: true, searchable: false},
                {data:'email', name : 'email',orderable: true, searchable: false},
                {data:'action', name : 'action',orderable: true, searchable: false},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 



        // table manpower
        table_manpower = $('#table_manpower').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        
        ajax: {
            
            url: "{{ route('crs.list_manpower') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'total_tenant', name : 'total_tenant',orderable: true, searchable: true},
                {data: 'total_employee', name: 'total_employee', orderable: true, searchable: true},  
                {data: 'total_foreign_worker', name: 'total_foreign_worker', orderable: true, searchable: true}, 
                {data:'action', name : 'action',orderable: true, searchable: false},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 


        table_fas = $('#table_fas').DataTable({
            "language": {
                "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
                }
            }
        });
          
    });

    $('#tenant_request_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('crs.tenant.add')}}",
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
                $("#request_add").modal('hide');
                table_tenant.ajax.reload();
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })
    });

    $('#man_power_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('crs.manpower.add')}}",
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
                $("#manpower_add").modal('hide');
                table_manpower.ajax.reload();
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })
    });

    // tenant database add
    $('#tenant_db_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('crs.tenant_data.add')}}",
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
                $("#tenantdb_add").modal('hide');
                table_db.ajax.reload();
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })
    });

    //Edit Tenant
    function editRequest(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/crs/tenant/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#request_add').modal('show');
            $('#id').val(res.id);
            $('#tenant_name').val(res.name_tenant);
            $('#target_completion').val(res.target_completion);
            $('#description').val(res.description);
            $('#id_department').val(res.id_department);
            $('#status').val(res.status);
            $('#received_by').val(res.received_by);
            $('#pic').val(res.pic);
            $('#root_cause').val(res.root_cause);
            $('#correction').val(res.correction);


            }
        });
    }

    //delete tenant
   function deleteRequest(id){
            if (confirm("Delete this request?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/crs/tenant/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table_tenant.ajax.reload();
                    }
                });
            }
    }

    //Edit ManPower
    function editMan(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/crs/manpower/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#manpower_add').modal('show');
            $('#id_manpower').val(res.id);
            $('#total_tenant ').val(res.total_tenant );
            $('#total_employee ').val(res.total_employee );
            $('#total_foreign_worker').val(res.total_foreign_worker);

            }
        });
    }

    //Edit tenant database
    function editDb(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/crs/tenant_data/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#tenantdb_add').modal('show');
            $('#id_db').val(res.id);
            $('#company ').val(res.company );
            $('#img ').val(res.image );
            $('#type_product').val(res.type_product);
            $('#start_date').val(res.start_date);
            $('#occupied_factory').val(res.occupied_factory);
            $('#contact_no').val(res.contact_no);
            $('#pic').val(res.pic);
            $('#designation').val(res.designation);
            $('#email').val(res.email);
            $('#hr_manager').val(res.hr_manager);
            $('#remark').val(res.remark);
            $('#total_employee').val(res.total_employee);

            }
        });
    }



    //delete man power
   function deleteMan(id){
            if (confirm("Delete this request?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/crs/manpower/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table_tenant.ajax.reload();
                    }
                });
            }
    }

    //delete man power
   function deleteDb(id){
            if (confirm("Delete this item?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/crs/tenant_data/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table_db.ajax.reload();
                    }
                });
            }
    }

    function clearField(){
        $('#id').val('');
        $('#id').val('');
        $('#tenant_name').val('');
        $('#target_completion').val('');
        $('#description').val('');
        $('#id_department').prop('selectedIndex', 0);
        $('#status').val('');
        $('#received_by').val('');
        $('#pic').val('');
        $('#root_cause').val('');
        $('#correction').val('');
        $('#id_manpower').val('');
        $('#total_tenant ').val('');
        $('#total_employee ').val('');
        $('#total_foreign_worker').val('');

        $('#id_db').val('');
        $('#img').val('');
        $('#image').val('');
        $('#company ').val('');
        $('#type_product').val('');
        $('#start_date').val('');
        $('#occupied_factory').val('');
        $('#contact_no').val('');
        $('#pic').val('');
        $('#designation').val('');
        $('#email').val('');
        $('#hr_manager').val('');
        $('#remark').val('');
        $('#total_employee').val('');
    }
</script>
@endpush

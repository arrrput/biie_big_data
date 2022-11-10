@extends('layouts.master')

@push('plugin-styles')
    {!! Html::style('assets/css/forms/form-widgets.css') !!}
    {!! Html::style('assets/css/forms/multiple-step.css') !!}
    {!! Html::style('assets/css/forms/radio-theme.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('CRS')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Add Investor Visit')}}</span></li>
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
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>{{__('Forms Visitor')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="form-group row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="card multiple-form-one px-0 pb-0 mb-3">
                                                   
                                                    <div class="row">
                                                        <div class="col-md-12 mx-0">
                                                            <form id="msform" method="POST" action="{{ route('crs.investor_add.store') }}">
                                                                @csrf
                                                                <ul id="progressbar" style="margin-left: 250px;">
                                                                    <li class="active" id="account"><strong>{{__('Visitor Information')}}</strong></li>
                                                                    <li id="personal"><strong>{{__('Facility')}}</strong></li>
                                                                    <li id="confirm"><strong>{{__('Finish')}}</strong></li>
                                                                    
                                                                </ul>
                                                                <fieldset>
                                                                    <div class="form-card">
                                                
                                                                        <div class="input-group mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text font-17">
                                                                                    <i class="la la-user"></i>
                                                                                </span>
                                                                            </div>
                                                                            <input type="text" id="company" name="company" class="form-control" placeholder="Company / Organitation">
                                                                        </div>


                                                                        <div class="row">
                                                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                                                <label class="fieldlabels">{{__('Date Visitor')}}</label>
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text font-17">
                                                                                            <i class="la la-calendar"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="date" id="date_visit" name="date_visit" class="form-control" placeholder="Date">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                                                <label class="fieldlabels">{{__('Time Visit')}}</label>
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text font-17">
                                                                                            <i class="la la-clock"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="time" id="time_visit" name="time_visit" class="form-control" placeholder="Date">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                                                <label class="fieldlabels">{{__('Total Visitor')}}</label>
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text font-17">
                                                                                            <i class="la la-user"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="number" name="total_visitor" id="total_visitor" class="form-control" placeholder="Total Visitor">
                                                                                </div>
                                                                            </div>


                                                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                                                    <label class="fieldlabels">{{__('Information Received')}}</label>
                                                                                    <div class="input-group mb-3">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text font-17">
                                                                                                <i class="la la-user"></i>
                                                                                            </span>
                                                                                        </div>
                                                                                        <input type="datetime-local" name="information_received" id="information_received" class="form-control" placeholder="Information Received">
                                                                                    </div>
                                                                            </div>

                                                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                                                    <label class="fieldlabels">{{__('Information has been Submitted')}}</label>
                                                                                    <div class="input-group mb-3">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text font-17">
                                                                                                <i class="la la-user"></i>
                                                                                            </span>
                                                                                        </div>
                                                                                        <input type="datetime-local" name="information_submit" id="information_submit" class="form-control" placeholder="Information has been submitted">
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                       
                                                                    </div>
                                                                    <input type="button" name="next" class="next action-button btn btn-primary" value="Next" />
                                                                </fieldset>
                                                                <fieldset>
                                                                    <div class="form-card">
                                                                        <h5 class="fs-title mb-4">{{__('Permit')}}</h5>
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <div class="ripple-checkbox-primary">
                                                                                        <input class="inp-cbx" id="cbx_imigrasi" name="cbx_imigrasi" value="1" type="checkbox" style="display: none" >
                                                                                        <label class="cbx" for="cbx_imigrasi">
                                                                                                    <span>
                                                                                                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                                        </svg>
                                                                                                    </span>
                                                                                            <span class="text-light-black">{{__('Izin Keimigrasian')}}</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-4">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="las la-users font-17"></i></span>
                                                                                    </div>
                                                                                    <select name="id_dept_imigrasi" id="id_dept_imigrasi" class="form-control custom-select">
                                                                                        <option disable>-- Select --</option>       
                                                                                        @foreach ($dept as $list)
                                                                                        <option value="{{ $list->id }}">{{ $list->name }}</option> 
                                                                                        @endforeach    
                                                                                                                    
                                                                                    </select>

                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-4">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="las la-user font-17"></i></span>
                                                                                    </div>
                                                                                    <input type="text" name="hod_name_imigrasi" id="hod_name_imigrasi" placeholder="{{__('Name')}}"  class="form-control" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <h5 class="fs-title mb-4">{{__('Transportation')}}</h5>

                                                                        <div class="form">
                                                                            <div class="custom-radio-1 ml-2">
                                                                                <label for="rdo-darat" class="btn-radio">
                                                                                    <input type="radio" id="rdo-darat" name="radio-trans" value="darat">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <circle cx="10" cy="10" r="9"></circle>
                                                                                        <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                                                                        <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                                                                                    </svg>
                                                                                    <span>{{__('Darat')}}</span>
                                                                                </label>

                                                                                <label for="rdo-laut" class="btn-radio">
                                                                                    <input type="radio" id="rdo-laut" name="radio-trans" value="laut">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                        <circle cx="10" cy="10" r="9"></circle>
                                                                                        <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                                                                        <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                                                                                    </svg>
                                                                                    <span>{{__('Laut')}}</span>
                                                                                </label>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <p><h5 class="fs-title mb-4 mt-4">{{__('Refreshment')}}</h5></p>
                                                                        
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <div class="ripple-checkbox-primary">
                                                                                        <input class="inp-cbx" id="cbx_minuman" name="cbx_minuman" value="1" type="checkbox" style="display: none">
                                                                                        <label class="cbx" for="cbx_minuman">
                                                                                                    <span>
                                                                                                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                                        </svg>
                                                                                                    </span>
                                                                                            <span class="text-light-black mr-3">{{__('Minuman Panas/Dingin')}}</span>
                                                                                        </label>

                                                                                        <input class="inp-cbx ml-5" id="cbx_makanan_ringan" name="cbx_makanan_ringan" value="1" type="checkbox" style="display: none">
                                                                                        <label class="cbx" for="cbx_makanan_dingin">
                                                                                                    <span>
                                                                                                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                                        </svg>
                                                                                                    </span>
                                                                                            <span class="text-light-black mr-3">{{__('Makanan Ringan')}}</span>
                                                                                        </label>

                                                                                        <input class="inp-cbx " id="cbx_handuk_dingin" name="cbx_handuk_dingin" type="checkbox"  value="1" style="display: none">
                                                                                        <label class="cbx" for="cbx_handuk_dingin">
                                                                                                    <span>
                                                                                                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                                        </svg>
                                                                                                    </span>
                                                                                            <span class="text-light-black mr-3">{{__('Handuk dingin')}}</span>
                                                                                        </label>

                                                                                        <input class="inp-cbx " id="cbx_makan_siang" name="cbx_makan_siang" type="checkbox" value="1" style="display: none">
                                                                                        <label class="cbx" for="cbx_makan_siang">
                                                                                                    <span>
                                                                                                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                                        </svg>
                                                                                                    </span>
                                                                                            <span class="text-light-black mr-3">{{__('Makan Siang')}}</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-4">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="las la-users font-17"></i></span>
                                                                                    </div>
                                                                                    <select name="id_dept_refresh" id="id_dept_refresh" class="form-control custom-select">
                                                                                        <option disable>-- Select --</option>       
                                                                                        @foreach ($dept as $list)
                                                                                        <option value="{{ $list->id }}">{{ $list->name }}</option> 
                                                                                        @endforeach    
                                                                                                                    
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="las la-user font-17"></i></span>
                                                                                    </div>
                                                                                    <input type="text" name="hod_name_refresh" id="hod_name_refresh" placeholder="{{__('Name')}}"  class="form-control" />
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <h5 class="fs-title mb-4 mt-4">{{__('Show Units')}}</h5>

                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <div class="ripple-checkbox-primary">
                                                                                        <input class="inp-cbx" id="cbx_biev" value="1" type="checkbox" style="display: none">
                                                                                        <label class="cbx" for="cbx_biev">
                                                                                                    <span>
                                                                                                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                                        </svg>
                                                                                                    </span>
                                                                                            <span class="text-light-black mr-3">{{__('BIEV')}}</span>
                                                                                        </label>

                                                                                        <input class="inp-cbx ml-5" id="cbx_dorm" value="1" type="checkbox" style="display: none">
                                                                                        <label class="cbx" for="cbx_dorm">
                                                                                                    <span>
                                                                                                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                                        </svg>
                                                                                                    </span>
                                                                                            <span class="text-light-black mr-3">{{__('Dormitory')}}</span>
                                                                                        </label>

                                                                                        <input class="inp-cbx " id="cbx_factory" value="1" type="checkbox" style="display: none">
                                                                                        <label class="cbx" for="cbx_factory">
                                                                                                    <span>
                                                                                                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                                        </svg>
                                                                                                    </span>
                                                                                            <span class="text-light-black mr-3">{{__('Factory')}}</span>
                                                                                        </label>

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-4">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="las la-users font-17"></i></span>
                                                                                    </div>
                                                                                    <select name="id_dept_unit" id="id_dept_unit" class="form-control custom-select">
                                                                                        <option disable>-- Select --</option>       
                                                                                        @foreach ($dept as $list)
                                                                                        <option value="{{ $list->id }}">{{ $list->name }}</option> 
                                                                                        @endforeach                              
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="las la-user font-17"></i></span>
                                                                                    </div>
                                                                                    <input type="text" name="hod_name_unit" id="hod_name_unit" placeholder="{{__('Name')}}"  class="form-control" />
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <h5 class="fs-title mb-4 mt-4">{{__('Others')}}</h5>

                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <div class="ripple-checkbox-primary">
                                                                                        <input class="inp-cbx" id="cbx_presentasi" name="cbx_presentasi" value="1" type="checkbox" style="display: none">
                                                                                        <label class="cbx" for="cbx_presentasi">
                                                                                                    <span>
                                                                                                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                                        </svg>
                                                                                                    </span>
                                                                                            <span class="text-light-black mr-3">{{__('Materi Presentasi')}}</span>
                                                                                        </label>

                                                                                        <input class="inp-cbx ml-5" id="cbx_room" value="1" name="cbx_room" type="checkbox" style="display: none">
                                                                                        <label class="cbx" for="cbx_room">
                                                                                                    <span>
                                                                                                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                                        </svg>
                                                                                                    </span>
                                                                                            <span class="text-light-black mr-3">{{__('Ruangan Board / Room')}}</span>
                                                                                        </label>

                                                                                        <input class="inp-cbx " id="cbx_viewing" name="cbx_viewing" value="1" type="checkbox" style="display: none">
                                                                                        <label class="cbx" for="cbx_viewing">
                                                                                                    <span>
                                                                                                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                                                        </svg>
                                                                                                    </span>
                                                                                            <span class="text-light-black mr-3">{{__('Viewing Gallery')}}</span>
                                                                                        </label>

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-4">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="las la-users font-17"></i></span>
                                                                                    </div>
                                                                                    <select name="id_dept_other" id="id_dept_other" class="form-control custom-select">
                                                                                        <option disable>-- Select --</option>       
                                                                                        @foreach ($dept as $list)
                                                                                        <option value="{{ $list->id }}">{{ $list->name }}</option> 
                                                                                        @endforeach                              
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="las la-user font-17"></i></span>
                                                                                    </div>
                                                                                    <input type="text" name="hod_name_other" id="hod_name_other" placeholder="{{__('Name')}}"  class="form-control" />
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        
                                                                    </div>

                                                                    


                                                                    <input type="button" name="previous" class="previous action-button-previous btn btn-outline-primary" value="{{__('Previous')}}" />
                                                                    <input type="submit" name="next" class="next action-button btn btn-primary" value="{{__('Next Step')}}" />
                                                                </fieldset>
                                                               
                                                                <fieldset>
                                                                    <div class="form-card">
                                                                        <h5 class="fs-title mb-4 text-center">{{__('Congrats !')}}</h5><br>
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-md-3">
                                                                                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>
                                                                            </div>
                                                                        </div> <br><br>
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-md-7 text-center">
                                                                                <p>{{__('You Have Successfully Submit')}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </form>
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
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/forms/multiple-step.js') !!}
@endpush

@push('custom-scripts')

@endpush
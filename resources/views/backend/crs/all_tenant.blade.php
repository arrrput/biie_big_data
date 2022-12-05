@extends('layouts.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/ui-elements/pagination.css') !!}
    {!! Html::style('plugins/jquery-ui/jquery-ui.min.css') !!}
    {!! Html::style('assets/css/apps/companies.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area Starts -->
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('CRS')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('All Tenant')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area Ends -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="row layout-spacing layout-top-spacing" id="cancel-row">
            <div class="col-lg-12">
                <div class="">
                    <div class="widget-content searchable-container grid">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 filtered-list-search align-self-center w-100">
                                    <form class="form-inline my-2 my-lg-0">
                                        <div class="">
                                            <i class="las la-search toggle-search"></i>
                                            <input type="text" id="input-search" class="form-control search-form-control  ml-lg-auto" placeholder="{{__('Search Companies')}}">
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                        <div class="searchable-items grid card-box">
                            @foreach ($list as $list)
                            <div class="items">
                                <div class="item-content">
                                    <div class="user-profile">
                                        <img src="{{asset('storage/crs/tenant_db/'.$list->image)}}" class="light-image" alt="avatar">
                                        <img style="width: 50%; height: auto;" src="{{asset('storage/crs/tenant_db/'.$list->image)}}" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="user-name"> {{$list->company}}</p>
                                            <p class="user-work"> {{__('Occupied Factory')}} {{ $list->occupied_factory }}</p>
                                        </div>
                                    </div>
                                    
                                    <p class="font-12 text-center text-muted"> {{ $list->remark }}</p>
                                    <div class="d-flex company-small-details align-center justify-content-around mt-3">
                                        <div class="left text-center">
                                            <p class="font-12 text-muted  mb-0"> {{__('Total Employee')}}</p>
                                            <p class="font-25 text-primary strong"> {{$list->total_employee}}</p>
                                        </div>
                                        
                                    </div>
                                    <p class="font-12 text-center text-muted">Since {{ \Carbon\Carbon::parse($list->start_date)->format('d M Y') }}</p>
                                    <div class="action-btn">
                                        <a class="btn btn-sm bg-gradient-warning text-white" href="#"> {{__('Details')}}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            
                            
                            
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
    {!! Html::script('plugins/jquery-ui/jquery-ui.min.js') !!}
    {!! Html::script('assets/js/apps/companies.js') !!}
@endpush

@push('custom-scripts')

@endpush

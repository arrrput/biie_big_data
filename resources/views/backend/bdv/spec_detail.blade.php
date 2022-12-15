@extends('layouts.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/ui-elements/pagination.css') !!}
    {!! Html::style('plugins/jquery-ui/jquery-ui.min.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
    {!! Html::style('assets/css/apps/ecommerce.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('BDV')}}</a></li>
                                <li class="breadcrumb-item" aria-current="page">{{__('List Specification')}}</li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{$data->name}}</span></li>
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
                        <div class="card-box product-details">
                            <div class="row">
                                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12">
                                    <div class="tab-content pt-0">
                                        <a class="product-details-wishlist">
                                            <i class="lar la-heart" id="heartIcon"></i>
                                        </a>
                                        @php $n =1; @endphp
                                        @foreach (json_decode($data->image) as $image)
                                            <div class="tab-pane @if($n ==1) show active @endif " id="product-{{$n}}-item">
                                                <img src="{{asset('storage/bdv/spec/'.$image)}}" alt="" class="img-fluid mx-auto d-block rounded">
                                            </div>
                                            @php
                                                $n++;
                                            @endphp
                                        @endforeach
                                                                                
                                    </div>
                                    <ul class="nav nav-pills nav-justified">
                                                                               
                                        @php $n =1; @endphp
                                        @foreach (json_decode($data->image) as $image)
                                        <li class="nav-item">
                                            <a href="#product-{{$n}}-item" data-toggle="tab" aria-expanded="@if ($n ==1) true @else false @endif"
                                            class="nav-link product-thumb @if($n ==1) show @endif ">
                                                <img src="{{asset('storage/bdv/spec/'.$image)}}" alt="" class="img-fluid mx-auto d-block rounded">
                                            </a>
                                            @php
                                                $n++;
                                            @endphp
                                        </li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                                <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12">
                                    <div class="mt-3 mt-xl-0">
                                        <a href="{{ url('/bdv/spec') }}" class="text-primary mb-3 d-block"><i class="las la-arrow-left"></i> {{__('Back to list')}}</a>
                                        @if ($data->category ==1)
                                            <a class="strong text-primary">Bintan Inti Executive Village</a>
                                        @else
                                            <a class="strong text-primary">Bintan Inti Industrial Estate</a>
                                        @endif
                                        
                                        <h4 class="mb-3 text-black strong">{{$data->name}}</h4>
                                        <p class="text-muted float-left mr-2">
                                            <i class="las la-star text-warning"></i>
                                            <i class="las la-star text-warning"></i>
                                            <i class="las la-star text-warning"></i>
                                            <i class="las la-star text-warning"></i>
                                            <i class="las la-star text-warning"></i>
                                        </p>
                                        <p class="mb-3">
                                            <a href="" class="text-muted">{{__('5.0 (74,258 Customer Reviews )')}}</a>
                                        </p>
                                        <h4>
                                            @if ($data->occupied ==1)
                                                <span class="badge badge-success">{{__('Available')}}</span>
                                            
                                            @else
                                                <span class="badge badge-danger">{{__('Booked')}}</span>
                                            @endif
                                        </h4>
                                        <h4 class="mb-3">
                                            <b>{{$data->price_sgd}}</b>
                                            <p></p><b>{{$data->price_idk}}</b>
                                        </h4>
                                        <h4>
                                            <span class="text-success mb-4 font-13">{{__('About Property')}}</span>
                                        </h4>
                                        <p class="text-muted mb-4">{{$data->description}}</p>
                                        <div class="row mb-3"></div>
                                            <div class="col-md-6">
                                                <p class="text-muted strong font-13">{{__('Property Features')}}</p>
                                                <div>
                                                    @foreach (json_decode($data->property) as $property)
                                                        <p class="text-muted"><i class="lar la-check-circle text-success"></i> {{$property}}</p>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-muted strong font-13">{{__('Ammenities')}}</p>
                                                <div>
                                                    @foreach (json_decode($data->amenities) as $amenities)
                                                        <p class="text-muted"><i class="lar la-check-circle text-success"></i> {{$amenities}}</p>
                                                    @endforeach
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
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/apps/ecommerce.js') !!}
@endpush

@push('custom-scripts')

@endpush

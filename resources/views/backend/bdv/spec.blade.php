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
                                <li class="breadcrumb-item"><a href="javascript:void(0);"> {{__('BDV')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Specification list')}}</span></li>
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
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-7 filtered-list-search align-self-center">
                                    <form class="form-inline my-2 my-lg-0">
                                        <div class="">
                                            <i class="las la-search toggle-search"></i>
                                            <input type="text" id="input-search" class="form-control search-form-control  ml-lg-auto" placeholder="{{__('Search Products')}}">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-5 text-sm-right text-center align-self-center">
                                    <div class="d-flex justify-content-sm-end justify-content-center contact-options">
                                        @can('bdv spec-add')
                                            <a href="{{ url('/bdv/spec/form') }}" title="{{__('Add a product')}}" class="pointer font-25 s-o mr-2 bs-tooltip">
                                                <i class="las la-plus-circle"></i>
                                            </a>
                                        @endcan

                                        <a href="javascript:void(0);" title="{{__('List View')}}" class="pointer font-25 view-list s-o mr-2 bs-tooltip">
                                            <i class="las la-list"></i>
                                        </a>
                                        <a title="{{__('Grid View')}}" class="pointer font-25 view-grid active-view s-o mr-2 bs-tooltip">
                                            <i class="las la-th-large"></i>
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="searchable-items grid card-box">
                            <div class="items items-header-section">
                                <div class="item-content">
                                   
                                </div>
                            </div>
                            @foreach ($data as $list)
                            <div class="items">
                                <a href="{{ route('bdv.spec.detail', $list->id) }}">
                                    <div class="item-content">
                                                                            
                                        @php
                                        $n=1;
                                            foreach(json_decode($list->image) as $image){
                                                if ($n==1) {
                                                    $img = $image;
                                                }
                                                $n++;
                                            }
                                        @endphp
                                       
                                        <div class="product-info">
                                            <img src="{{ asset('storage/bdv/spec/'.$img) }}" alt="avatar" >
                                            <div class="user-meta-info">
                                                <p class="product-name text-primary"> {{$list->name}}</p>
                                                @if ($list->category ==1)
                                                    <p class="product-category"> {{__('Bintan Inti Executive Village')}}</p>
                                                @else
                                                    <p class="product-category"> {{__('Bintan Inti Industrial Estate')}}</p>
                                                @endif
                                                
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <p class="product-category-addr"><span class="text-primary"> {{__('Price:')}} </span> {{$list->price_sgd}}</p>  
                                                                               
                                        </div>
                                        <div class="text-center">
                                            <p class="product-category-addr"><span class="text-primary"> {{__('Price:')}} </span> {{$list->price_idk}}</p>
                                        </div>
                                        <div class="product-rating">
                                            <p class="product-rating-inner"><span> {{__('Rating:')}} </span>
                                                <a class="d-flex align-center">
                                                    5 <i class=" ml-1 text-warning las la-star"></i>
                                                </a>
                                            </p>
                                        </div>
                                        <div class="product-stock-status">
                                            <p class="product-stock-status-inner">
                                                @if ($list->occupied ==1)
                                                    <small class="badge badge-primary"> {{__('Available')}}</small>
                                                @else
                                                    <small class="badge badge-danger"> {{__('Booked')}}</small>
                                                @endif
                                                
                                            </p>
                                        </div>
                                        <div class="action-btn">
                                            <form action="{{ route('bdv.spec.delete', $list->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                @can('bdv spec-edit')
                                                    <i class="lar la-edit text-primary font-20 mr-2 btn-edit-contact"></i>
                                                @endcan
                                                @can('bdv spec-delete')
                                                    <button type="submit" value="" class="btn btn-white"><i class="lar la-trash-alt text-danger font-20 mr-2"></i></button>
                                                @endcan
                                                
                                            </form>
                                        </div>
                                       
    
                                    </div>
                                </a>
                                                              
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
    {!! Html::script('assets/js/apps/ecommerce.js') !!}
@endpush

@push('custom-scripts')

@endpush

@push('custom-style')
    <style>
.thumb-post img {
  object-fit: none; /* Do not scale the image */
  object-position: center; /* Center the image within the element */
  width: 100%;
  max-height: 250px;
  margin-bottom: 1rem;
}
    </style>
@endpush
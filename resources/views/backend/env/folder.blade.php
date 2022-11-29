@extends('layouts.master')

    {!! Html::style('assets/css/apps/file-manager.css') !!}
    {!! Html::style('assets/css/ui-elements/breadcrumbs.css') !!}
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('assets/css/ui-elements/alert.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('ENV')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Folder')}}</span></li>
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
                                        <h4 class="table-header"><i class="las la-leaf text-success"></i> {{__('Enviroment Document file')}}</h4>
                                        <div class="table-responsive mb-4">
                                            <hr>
                                            <div class="file-manager-bottom-default mt-3">
                                                <div class="file-manager-right-bottom">
                                                    <div class="mt-4 d-block">
                                                        @php $no=0; @endphp
                                                        @foreach ($folder as $list)
                                                        <div class="folder-list">
                                                            <a href="{{ route('env.folder.category', $list->name) }}">
                                                                <div class="folder">
                                                                    <p class="main-title">{{ $list->total }} File</p>
                                                                    <div class="d-flex">
                                                                    </div>
                                                                    <p></p>
                                                                    <p class="sub-title">{{ $list->name }}</p>
                                                                    <p class="folder-name">{{__('10 Oct 2022')}}</p>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   

@endsection
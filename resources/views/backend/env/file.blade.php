@extends('layouts.master')
    {!! Html::style('assets/css/ui-elements/breadcrumbs.css') !!}
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}

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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Folder')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>{{__('File')}}</span></li>
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
                                        
                                        @can('env-create')
                                            <button href="javascript:void(0)" class="btn btn-sm btn-primary pull-right mb-3" id="add_file" data-toggle="modal" data-target="#estate-edit"><i class="fa fa-plus"></i> Add New File</button>
                                            @endcan
                                            
                                            <table class="table table-stripped" id="tbl_data">
                                                <thead>
                                                    <tr>
                                                        <td>No</td>
                                                        <td>Kode</td>
                                                        <td>Name</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach($list as $list)
                                                        <tr>
                                                            <td>{{$no++}}</td>
                                                            <td>{{ $list->kode_env }}</td>
                                                            <td>{{$list->name}} </td>
                                                            <td>
                                                                @if (Auth::user()->id_department == 4 || Auth::user()->hasRole('admin'))
                                                                    <a href="{{ route('env.download', $list->file) }}" class="btn btn-sm bg-gradient-warning text-white">
                                                                        <i class="las la-download"></i> Download 
                                                                    </a>
                                                                @else 
                                                                    <button class="btn btn-sm btn-primary" > Request</button>
                                                                @endif

                                                            </td>
                                                        </tr>
                                                    @endforeach
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


@endsection
@push('plugin-scripts')
   
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/table/datatable/datatables.js') !!}
    
@endpush

@push('custom-scripts')
<script>
$(document).ready( function () {
    $('#tbl_data').DataTable();
});

var i = 0;

</script>

@endpush
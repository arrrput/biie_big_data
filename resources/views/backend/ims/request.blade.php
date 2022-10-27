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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('IMS')}}</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Master Document')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Request for Download')}}</span></li>
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
                                        <h4 class="table-header"><i class="las la-download text-success"></i> {{__('User Request Approve')}}</h4>
                                        <div class="table-responsive mb-4">
                                            <hr>
                                            
                                            <table id="table_app" class="table table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th style="width: 15px;">{{__('No')}}</th>
                                                    <th>{{__('User')}}</th>
                                                    <th>{{__('No Doc')}}</th>
                                                    <th>{{__('Title')}}</th>
                                                    <th class="no-content"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no=0;
                                                    @endphp
                                                    @foreach ($list as $list)
                                                        <tr>
                                                            <td>{{ $no+1 }}</td>
                                                            <td>{{ $list->username }}</td>
                                                            <td>{{ $list->no_document }}</td>
                                                            <td>{{ $list->title }}</td>
                                                            <td>
                                                                <a href="{{ route('ims.master_doc.request-app', $list->id) }}" class="btn btn-sm btn-success"> <i class="las la-check"></i></a>
                                                                <a href="{{ route('ims.master_doc.request-reject', $list->id) }}" class="btn btn-sm btn-danger"> <i class="las la-window-close"></i></a>
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
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/table/datatable/datatables.js') !!}
@endpush

@push('custom-scripts')
<script>
    $(document).ready( function () {
        $('#table_app').DataTable({
            "language": {
                "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
                }
        }
        });
     
     
    } );
</script>
@endpush

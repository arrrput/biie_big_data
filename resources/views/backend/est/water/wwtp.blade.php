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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('WATER SECTION')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('WWTP')}}</span></li>
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
                        <div class="row layout-top-spacing date-table-container">
                            
                            @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                             </div>
                            @endif
                            
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                                <div class="widget-content widget-content-area br-12">
                                    <ul class="nav nav-tabs mb-2 mt-2" id="normaltab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>{{__('List Content')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><b> {{__('Layout')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="lab-tab" data-toggle="tab" href="#lab" role="tab" aria-controls="lab" aria-selected="false"><b> {{__('Lab Analys')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="drawing-tab" data-toggle="tab" href="#drawing" role="tab" aria-controls="drawing" aria-selected="false"><b> {{__('Drawing Engine')}}</b></a>
                                        </li>
                                        
                                    </ul>

                                    <div class="tab-content" id="normaltabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            {{-- list content --}}
                                            <div class="table-responsive mb-4">
                                                
                                                <button class=" btn btn-primary btn-sm mb-3">
                                                    <i class="las la-plus"></i> Add
                                                </button>

                                                <table id="table_list" class="table table-hovered table-sm table-striped" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="width: 15px;">No</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Capacity</th>    
                                                            <th scope="col">Download</th>
                                                            <th class="no-content"></th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                                            
                                            
                                        </div>

                                        <div class="tab-pane fade" id="lab" role="tabpanel" aria-labelledby="lab-tab">
                                            
                                            
                                        </div>

                                        <div class="tab-pane fade" id="drawing" role="tabpanel" aria-labelledby="drawing-tab">
                                            
                                            
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

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    // table recruitment
    var table_list;

    table_list = $('#table_list').DataTable({
            "language": {
                "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
                }
        },
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('estate.water.wwtp.list_content') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'name', name : 'name',orderable: true, searchable: true},
                {data: 'capacity', name: 'capacity', orderable: true, searchable: true},  
                {data: 'document', name: 'document', orderable: true, searchable: true},
                {data: 'action', name: 'action'},
            ]
        }); 
    </script>
@endpush



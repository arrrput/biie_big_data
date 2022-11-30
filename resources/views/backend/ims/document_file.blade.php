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
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Document File')}}</span></li>
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
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>{{__('Standart Operational Procedure')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><b> {{__('Work Instruction')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="export-tab" data-toggle="tab" href="#export" role="tab" aria-controls="export" aria-selected="false"><b> {{__('Form')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false"><b> {{__('Edited')}}</b></a>
                                        </li>
                                        
                                    </ul>

                                    <div class="tab-content" id="normaltabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            {{-- content tenant --}}
                                            <div class="table-responsive mb-4">
        
                                                <table id="table_sop" class="table table-hover" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th style="width:20px;">{{__('No')}}</th>
                                                        <th>{{__('Doc No')}}</th>
                                                        <th>{{__('Title')}}</th>
                                                        <th>{{__('Hierarchy Doc')}}</th>
                                                        <th>{{__('Document')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $no =0;
                                                        @endphp
                                                        @foreach ($sop as $list)
                                                        <tr>
                                                            <td> {{ $no =$no+1; }}</td>
                                                            <td><a href="{{ route('ims.viewpdf',$list->stamp)  }}" target="_blank" class="text-primary"> {{ $list->no_document }} </a> </td>
                                                            <td> {{ $list->title }}</td>
                                                            <td> {{ $list->department }}</td>
                                                            <td>
                                                                @if (Auth()->user()->hasRole('ims') || Auth()->user()->hasRole('admin'))
                                                                    <a href="{{ route('ims.download.master',$list->document) }}" class="btn btn-sm bg-gradient-warning   text-white">
                                                                        <i class="las la-download"></i>  Download
                                                                    </a>
                                                                @else
                                                                    @php
                                                                        $cek = DB::table('ims_download_master')->select('*')
                                                                            ->where('user_id',Auth::user()->id)
                                                                            ->where('id_doc', $list->id)
                                                                            ->first();
                                                                        
                                                                    @endphp 
                                                                    @if ($cek != null)
                                                                       
                                                                       @if ($cek->status ==1)
                                                                            <a href="{{ route('ims.download.master',$list->document) }}" class="btn btn-sm bg-gradient-warning   text-white">
                                                                                <i class="las la-download"></i>  Download
                                                                            </a>
                                                                       @elseif ($cek->status ==0)
                                                                            <a href="#" class="btn btn-sm bg-gradient-dark   text-white">
                                                                                <i class="las la-clock"></i>  Waiting
                                                                            </a>
                                                                        @elseif ($cek->status ==2)    
                                                                            <button class="btn btn-sm bg-danger" disabled>
                                                                                <i class="las la-ban"></i> Rejected
                                                                            </button>
                                                                        @endif

                                                                    @else
                                                                        <form method="POST" action="{{ route('ims.master_doc.request') }}">
                                                                            @csrf
                                                                            <input type="hidden" value="{{ $list->id }}" name="id_doc" id="id_doc"/>
                                                                            <button type="submit" class="btn btn-sm bg-gradient-success   text-white"  >Request</button>
                                                                        </form>
                                                                    @endif
                                                                    
                                                                    
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                                            
                                            <table id="table_wi" class="table table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>{{__('No')}}</th>
                                                    <th>{{__('Doc No')}}</th>
                                                    <th>{{__('Title')}}</th>
                                                    <th>{{__('Hierarchy Doc')}}</th>
                                                    <th>{{__('Document')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                            $no =0;
                                                        @endphp
                                                        @foreach ($wi as $list)
                                                        <tr>
                                                            <td> {{ $no =$no+1; }}</td>
                                                            <td><a href="{{ route('ims.viewpdf',$list->document) }}" target="_blank" class="text-primary"> {{ $list->stamp }} </a> </td>
                                                            <td> {{ $list->title }}</td>
                                                            <td> {{ $list->department }}</td>
                                                            <td>
                                                                @if (Auth()->user()->hasRole('ims') || Auth()->user()->hasRole('admin'))
                                                                    <a href="{{ route('ims.download.master',$list->document) }}" class="btn btn-sm bg-gradient-warning   text-white">
                                                                        <i class="las la-download"></i>  Download
                                                                    </a>
                                                                @else
                                                                    @php
                                                                        $cek = DB::table('ims_download_master')->select('*')
                                                                            ->where('user_id',Auth::user()->id)
                                                                            ->where('id_doc', $list->id)
                                                                            ->first();
                                                                        
                                                                    @endphp 
                                                                    @if ($cek != null)
                                                                       
                                                                       @if ($cek->status ==1)
                                                                            <a href="{{ route('ims.download.master',$list->stamp) }}" class="btn btn-sm bg-gradient-warning   text-white">
                                                                                <i class="las la-download"></i>  Download
                                                                            </a>
                                                                       @elseif ($cek->status ==0)
                                                                            <a href="#" class="btn btn-sm bg-gradient-dark   text-white">
                                                                                <i class="las la-clock"></i>  Waiting
                                                                            </a>
                                                                        @elseif ($cek->status ==2)    
                                                                            <button class="btn btn-sm bg-danger" disabled>
                                                                                <i class="las la-ban"></i> Rejected
                                                                            </button>
                                                                        @endif

                                                                    @else
                                                                        <form method="POST" action="{{ route('ims.master_doc.request') }}">
                                                                            @csrf
                                                                            <input type="hidden" value="{{ $list->id }}" name="id_doc" id="id_doc"/>
                                                                            <button type="submit" class="btn btn-sm bg-gradient-success   text-white"  >Request</button>
                                                                        </form>
                                                                    @endif
                                                                    
                                                                    
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                
                                                </tbody>
                                                
                                            </table>
                                        </div>

                                        <div class="tab-pane fade" id="export" role="tabpanel" aria-labelledby="export-tab">
                                           
                                            <table id="table_form" class="table table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>{{__('No')}}</th>
                                                    <th>{{__('Doc No')}}</th>
                                                    <th>{{__('Title')}}</th>
                                                    <th>{{__('Hierarchy Doc')}}</th>
                                                    <th>{{__('Document')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                            $no =0;
                                                        @endphp
                                                        @foreach ($form as $list)
                                                        <tr>
                                                            <td> {{ $no =$no+1; }}</td>
                                                            <td><a href="{{ route('ims.viewpdf',$list->stamp) }}" target="_blank" class="text-primary"> {{ $list->no_document }} </a> </td>
                                                            <td> {{ $list->title }}</td>
                                                            <td> {{ $list->department }}</td>
                                                            <td>
                                                                @if (Auth()->user()->hasRole('ims') || Auth()->user()->hasRole('admin'))
                                                                    <a href="{{ route('ims.download.master',$list->document) }}" class="btn btn-sm bg-gradient-warning   text-white">
                                                                        <i class="las la-download"></i>  Download
                                                                    </a>
                                                                @else
                                                                    @php
                                                                        $cek = DB::table('ims_download_master')->select('*')
                                                                            ->where('user_id',Auth::user()->id)
                                                                            ->where('id_doc', $list->id)
                                                                            ->first();
                                                                        
                                                                    @endphp 
                                                                    @if ($cek != null)
                                                                       
                                                                       @if ($cek->status ==1)
                                                                            <a href="{{ route('ims.download.master',$list->document) }}" class="btn btn-sm bg-gradient-warning   text-white">
                                                                                <i class="las la-download"></i>  Download
                                                                            </a>
                                                                       @elseif ($cek->status ==0)
                                                                            <a href="#" class="btn btn-sm bg-gradient-dark   text-white">
                                                                                <i class="las la-clock"></i>  Waiting
                                                                            </a>
                                                                        @elseif ($cek->status ==2)    
                                                                            <button class="btn btn-sm bg-danger" disabled>
                                                                                <i class="las la-ban"></i> Rejected
                                                                            </button>
                                                                        @endif

                                                                    @else
                                                                        <form method="POST" action="{{ route('ims.master_doc.request') }}">
                                                                            @csrf
                                                                            <input type="hidden" value="{{ $list->id }}" name="id_doc" id="id_doc"/>
                                                                            <button type="submit" class="btn btn-sm bg-gradient-success   text-white"  >Request</button>
                                                                        </form>
                                                                    @endif
                                                                    
                                                                    
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                
                                                </tbody>
                                                
                                            </table>
                                        </div>

                                        <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                                        
                                            <table id="table_edit" class="table table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>{{__('No')}}</th>
                                                    <th>{{__('Doc No')}}</th>
                                                    <th>{{__('Title')}}</th>
                                                    <th>{{__('Hierarchy Doc')}}</th>
                                                    <th>{{__('Document')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                            $no =0;
                                                        @endphp
                                                        @foreach ($edited as $list)
                                                        <tr>
                                                            <td> <a href="{{ route('ims.viewpdf',$list->stamp) }}" target="_blank" class="text-primary">{{ $no =$no+1; }}</a></td>
                                                            <td> {{ $list->no_document }} </td>
                                                            <td> {{ $list->title }}</td>
                                                            <td> {{ $list->department }}</td>
                                                            <td>
                                                                @if (Auth()->user()->hasRole('ims') || Auth()->user()->hasRole('admin'))
                                                                    <a href="{{ route('ims.download.master',$list->document) }}" class="btn btn-sm bg-gradient-warning   text-white">
                                                                        <i class="las la-download"></i>  Download
                                                                    </a>
                                                                @else
                                                                    @php
                                                                        $cek = DB::table('ims_download_master')->select('*')
                                                                            ->where('user_id',Auth::user()->id)
                                                                            ->where('id_doc', $list->id)
                                                                            ->first();
                                                                        
                                                                    @endphp 
                                                                    @if ($cek != null)
                                                                       
                                                                       @if ($cek->status ==1)
                                                                            <a href="{{ route('ims.download.master',$list->document) }}" class="btn btn-sm bg-gradient-warning   text-white">
                                                                                <i class="las la-download"></i>  Download
                                                                            </a>
                                                                       @elseif ($cek->status ==0)
                                                                            <a href="#" class="btn btn-sm bg-gradient-dark   text-white">
                                                                                <i class="las la-clock"></i>  Waiting 
                                                                            </a>
                                                                        @elseif ($cek->status ==2)    
                                                                            <button class="btn btn-sm bg-danger" disabled>
                                                                                <i class="las la-ban"></i> Rejected
                                                                            </button>
                                                                        @endif

                                                                    @else
                                                                        <form method="POST" action="{{ route('ims.master_doc.request') }}">
                                                                            @csrf
                                                                            <input type="hidden" value="{{ $list->id }}" name="id_doc" id="id_doc"/>
                                                                            <button type="submit" class="btn btn-sm bg-gradient-success   text-white"  >Request</button>
                                                                        </form>
                                                                    @endif
                                                                    
                                                                    
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
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/table/datatable/datatables.js') !!}
@endpush

@push('custom-scripts')
<script>
    $(document).ready( function () {
        $('#table_sop').DataTable({
            "language": {
                "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
                }
        }
        });
        $('#table_wi').DataTable({
            "language": {
                "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
                }
        }
        });
        $('#table_form').DataTable({
            "language": {
                "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
                }
        }
        });
        $('#table_edit').DataTable({
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

@extends('layouts.master')

{!! Html::style('assets/css/ui-elements/breadcrumbs.css') !!}
{!! Html::style('plugins/table/datatable/datatables.css') !!}
{!! Html::style('plugins/table/datatable/dt-global_style.css') !!}

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{$param}}</a></li>
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
                                        <h4 class="table-header"><i class="las la-pencil-ruler"></i></i> {{__('List Arsitektural')}}</h4>
                                        <div class="table-responsive mb-4">
                                            @if ($message = Session::get('success'))
                                                    <div class="alert alert-success">
                                                        <p>{{ $message }}</p>
                                                    </div>
                                                @endif
                                            @if (session('status'))
                                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                {{ session('status') }}.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @endif

                                            <hr>
                                            
                                            @can('estate-create')
                                            <button href="javascript:void(0)" class="btn btn-sm btn-primary pull-right mb-3" id="add_file" data-toggle="modal" data-target="#estate-edit"><i class="fa fa-plus"></i> Add New File</button>
                                            @endcan

                                            <table class="table table-stripped" id="tbl_data">
                                                <thead>
                                                    <tr>
                                                        <td>No</td>
                                                        <td>Name</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach($list_document as $list)
                                                        <tr>
                                                            <td>{{$no++}}</td>
                                                            <td>{{$list->keterangan}} </td>
                                                            <td>
                                                                {{-- Jika department estate --}}
                                                                @if ( Auth::user()->hasRole('est building') || Auth::user()->hasRole('admin')) 
                                                                    
                                                                    <a href="{{ route('download.master', $list->name) }}" class="btn bg-gradient-warning text-white"><i class="las la-download"></i>Download </a>
                                                                   
                                                                {{-- Jika bukan --}}
                                                                    
                                                                    @elseif ($total_d == 0)
                                                                        <form method="POST" action="{{ route('estate.req.download') }}">
                                                                            @csrf
                                                                            <input type="hidden" value="{{ $param }}" name="kode_bangunan"/>
                                                                            <input type="hidden" value="{{ $list->id }}" name="data_id"/>
                                                                            <input type="submit" class="btn btn-sm bg-gradient-success " value="Request">
                                                                        </form>  
                                                                    @elseif ($total_d > 0) 
            
                                                                            @php
                                                                                $cetak = 0;
                                                                            @endphp
                                                                        @foreach ($list_download as $download)
                                                                            
                                                                            @if ($download->id_data == $list->id && $download->user_id == Auth::user()->id)
                                                                               
                                                                                @if ($download->status == 0) @php $cetak=1; @endphp
                                                                                    <button class="btn btn-sm btn-grey">Waiting</button>    
                                                                                @elseif ($download->status == 1) @php $cetak=1; @endphp
                                                                                    <a href="{{ route('download.master', $list->name) }}" class="btn btn-sm bg-gradient-danger"><i class="las la-download"></i>Download</a>                                                      
                                                                                @elseif ($download->status == 2) @php $cetak=1; @endphp
                                                                                    <button class="btn btn-sm bg-gradient-danger" disabled><i class="las la-ban"></i> Reject</button>
                                                                                @endif
                                                                                   
                                                                            @else
                                                                                                                                                            
                                                                            @endif
                                                                            
                                                                        @endforeach
                                                                        @if ($cetak==0)
                                                                            <form method="POST" action="{{ route('estate.req.download') }}">
                                                                                 @csrf
                                                                                <input type="hidden" value="{{ $param }}" name="kode_bangunan"/>
                                                                                <input type="hidden" value="{{ $list->id }}" name="data_id"/>
                                                                                <input type="submit" class="btn btn-sm btn-primary " value="Request">
                                                                            </form> 
                                                                                    
                                                                        @endif
                    
                                                                    @else
                                                                        <form method="POST" action="{{ route('estate.req.download') }}">
                                                                            @csrf
                                                                            <input type="hidden" value="{{ $param }}" name="kode_bangunan"/>
                                                                            <input type="hidden" value="{{ $list->id }}" name="data_id"/>
                                                                            <input type="submit" class="btn btn-sm btn-primary " value="Request">
                                                                        </form>  
                    
                                                                @endif
            
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
            
            
            
                                            <div class="modal fade bd-example-modal-xl" id="estate-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Add Document</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                        
                                                    <form action="{{ route('estate.update_data') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <table class="table table-stripped" id="dynamicAddRemove-edit">
                                                                    <tr>
                                                                        <td>
                                                                            <input type="hidden" name="addMoreInputFields[0][kd_bangunan]" value="{{ $param }}"  id="ekd_est" class="form-control"/>
                                                                            <input type="file" name="addMoreInputFields[0][name]" placeholder="Nama Barang" class="form-control" />
                                                                        </td>
                                                                        <td>
                                                                            <select class="custom-select rounded-0" placeholder="" id="id_category" name="addMoreInputFields[0][id_category]">
                                                                                <option disable>-- Pilih Kategori --</option>  
                                                                                @foreach ($est_kategori as $kat)
                                                                                    <option value="{{ $kat->id }}">{{ $kat->name }}</option>
                                                                                @endforeach 
                                                                            </select> 
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="addMoreInputFields[0][keterangan]" placeholder="Name" class="form-control" />
                                                                        </td> 
                                                                        <td>
                                                                            <button type="button" name="add" id="dynamic-ar-edit" class="btn btn-outline-primary"><i class="las la-plus"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <input type="submit" value="Submit" class="btn btn-primary"/>  
                                                      <button type="button" class="btn btn-grey" data-toggle="modal" data-target="#estate-edit" data-dismiss="modal">Back</button>
                                                    </div>
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
    <!-- Main Body Ends -->

</div>
@endsection

@push('plugin-scripts')
   
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/table/datatable/datatables.js') !!}
    
@endpush

@push('custom-scripts')
<script>
$(document).ready( function () {
    $('#tbl_data').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        }
    });
});

var i = 0;
//dynamic edit
$("#dynamic-ar-edit").click(function () {
        ++i;
        $("#dynamicAddRemove-edit").append('<tr><td><input type="hidden" name="addMoreInputFields['+i+'][kd_bangunan]" value="{{ $param }}"  id="ekd_est" class="form-control"/> <input type="file" name="addMoreInputFields['+ i +'][name]" placeholder="Nama Barang" class="form-control" /></td> <td><select class="custom-select rounded-0" placeholder="" id="id_category" name="addMoreInputFields['+i+'][id_category]"><option disable>-- Pilih Kategori --</option>@foreach ($est_kategori as $kat)<option value="{{ $kat->id }}">{{ $kat->name }}</option>@endforeach </select></td>  <td><input type="text" name="addMoreInputFields[' + i + '][keterangan]" placeholder="Name" class="form-control" /></td> <td><button type="button" class="btn btn-outline-danger remove-input-field-edit"><i class="las la-trash"></i></button></td></tr>');
    });
    $(document).on('click', '.remove-input-field-edit', function () {
        $(this).parents('tr').remove();
    });
</script>

@endpush
@extends('layouts.backend')

@section('title')
    Estate SOP
@endsection

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
        
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Estate</li>
                        <li class="breadcrumb-item active">FORM</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
           
            @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               {{ session('message') }}.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    {{-- end header --}}

    {{-- Content --}}
    <section class="content">
        <div class="container-fluid">
            
            {{-- SOP --}}
            <div class="card card-success">
                            
                {{-- card header --}}
                <div class="card-header">
                    <h3 class="card-title">Input SOP/WI/FORM </h3>
    
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
    
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2></h2>
                            </div>
                        </div>
                    </div>
                    
                   
                    <table class="table table-stripped mt-2" id="table_sop">
                        <thead>
                            <tr>
                                <th>Nomor Doc {{ $param }}</th>
                                <th>Name</th>
                                <th>Jenis Document</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                        
                    
                </div>
            </div>
            {{-- end SOP --}}
        </div>
    </section>
    
</div>
@endsection

@push('prepend-script')
    <script>

    @if ($param == 'sop')
        var url_data = "{{ route('est.ajax.sop') }}";
    @elseif ($param == 'wi')
        var url_data = "{{ route('est.ajax.wi') }}";
    @elseif ($param == 'form')
        var url_data = "{{ route('est.ajax.form') }}";
    @endif

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table;

    $(document).ready( function () {

    // $('#table_est').DataTable();
    table = $('#table_sop').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: url_data,
        type: "POST",        
    },
        columns: [
            // {data: 'rownum', name: 'id', orderable: false},
            // let name = 'ee'
            {data: 'no_revisi', name: 'no_revisi', orderable: true, searchable: true},
            {data:'name', name : 'name',orderable: true, searchable: true},
            {data:'jns', name : 'jns',orderable: true, searchable: false},
            {data: 'action', name: 'action'},
        ]
        }); 

    });


    </script>
@endpush
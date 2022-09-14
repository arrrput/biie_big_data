@extends('layouts.backend')

@section('title')
    Estate || Big Data
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
        
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">EST </li>
                        <li class="breadcrumb-item">Estate Folder </li>
                        <li class="breadcrumb-item active">Arsitektural </li>
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


    <section class="content">
        <div class="container-fluid">

            {{-- card sukses --}}

            <div class="col-12">
                <div class="card card-success">
                
                    {{-- card header --}}
                    <div class="card-header">
                        <h3 class="card-title">File Arsitektural </h3>
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
                                    <h2>Arsitektural</h2>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <table id="datatable_est" class="table table-hover">
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col">#</th> --}}
                                            <th scope="col">Kode Bangunan</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Sub Category</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
</div>
@endsection


@push('prepend-script')
<script>
    // header request token
    var SITEURL = '{{URL::to('/')}}';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var table;
    $(document).ready( function () {

        table = $('#datatable_est').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('estate.ajax.arsitektural') }}",
            type: "POST"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                {data: 'kode_bangunan', name: 'kode_bangunan', orderable: true, searchable: true},
                {data:'fullname', name : 'name',orderable: true, searchable: true},
                {data:'category', name : 'category',orderable: true, searchable: false},
                {data:'subcategory', name : 'subcategory',orderable: true, searchable: false},
                {data: 'action', name: 'action'},
            ]
        }); 

    });
</script>
@endpush
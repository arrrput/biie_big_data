@extends('layouts.backend')

@section('title')
    ENV File |
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
        
                <div class="col-sm-12 mr-2">
                    <ol class="breadcrumb float-sm-right ">
                        <li class="breadcrumb-item">Environment</li>
                        <li class="breadcrumb-item">File</li>
                        <li class="breadcrumb-item">{{ $param }}</li>
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
         

          <div class="col-12">
            <div class="card card-success">
                
                {{-- card header --}}
                <div class="card-header">
                    <h3 class="card-title">{{ $param }} </h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                    </div>
                </div>
                {{-- end card header --}}
                <div class="card-body">
                    
                        <div class="row">
                            
                            <div class="col-sm-12">
                                {{-- <h1 style="color: rgb(16, 145, 37);"><span><i class="fa fa-home"></i></span> {{ $data->title }}</h1>
                                <h5><i class="fa fa-list"></i> {{ $data->estKategori->name }}  ({{ $data->estSubKategori->name }})</h5>
                                <p> {{ $data->name }}</p>--}}
                                
                                @can('env-create')
                                <button href="javascript:void(0)" class="btn btn-sm btn-success pull-right mb-3" id="add_file" data-toggle="modal" data-target="#estate-edit"><i class="fa fa-plus"></i> Add New File</button>
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
                                                    <a href="{{ route('env.download', $list->file) }}" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-download"></i> Download 
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>



                                {{-- <div class="modal fade bd-example-modal-xl" id="estate-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <button type="button" name="add" id="dynamic-ar-edit" class="btn btn-outline-primary"><i class="fas fa-plus"></i></button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                          <input type="submit" value="Submit" class="btn btn-primary"/>  
                                          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#estate-edit" data-dismiss="modal">Back</button>
                                        </div>
                                        </form>
                                      </div>
                                    </div>
                                </div> --}}
                                
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
$(document).ready( function () {
    $('#tbl_data').DataTable();
});

var i = 0;

</script>

@endpush
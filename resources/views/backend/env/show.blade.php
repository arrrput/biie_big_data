@extends('layouts.backend')

@section('title')
    {{ $param }}
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
                        <li class="breadcrumb-item">Detail</li>
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
                                <h1 style="color: rgb(16, 145, 37);"><span><i class="fa fa-home"></i></span> {{ $list->name }}</h1>
                                <h5><i class="fa fa-list"></i> {{ $list->category }}  ({{ $list->subcategory }})</h5>
                                <p> {{ $list->name }}</p>
                                <h3>Document List</h3>
                                <table class="table table-striped" style="width: 100%;" id="tbl_data">
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
                                        @foreach($file as $list)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$list->name}}</td>
                                                <td>
                                                    <a href="{{ route('env.download', $list->file) }}" class="btn btn-sm btn-danger"><i class="fa fa-download"></i>Download</a> 

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
    
            
        
            
    </section>

</div>
@endsection

@push('prepend-script')
<script>
$(document).ready( function () {
    $('#tbl_data').DataTable();
});
</script>

@endpush
@extends('layouts.backend')

@section('title')
    Request Download
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
        
                <div class="col-sm-12 mr-2">
                    <ol class="breadcrumb float-sm-right ">
                        <li class="breadcrumb-item">Request Download</li>
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
                    <h3 class="card-title">Request Access Download </h3>

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
                           
                            
                        </div>
                        <table id="tbldownload" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Bangunan</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">User Request</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 0;
                                @endphp
                                @foreach ($req as $datas)
                                <tr>
                                    <th scope="row">{{ ++$no }}</th>
                                    <td><a href="{{ route('estate.show',$datas->kode_bangunan) }}"> {{ $datas->kode_bangunan }}</a></td>
                                    <td>{{ $datas->title }}</td>
                                    <td>{{ $datas->name }}</td>
                                    {{-- <td>{{ date('d M Y', strtotime($datas->created_at)); }}</td> --}}
                                    <td>
                                        <a href="#" class="btn btn-primary">Approve</a>
                                        <a href="#" class="btn btn-danger">Reject</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
        $('#tbldownload').DataTable();
    });
</script>

@endpush
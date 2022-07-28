@extends('layouts.backend')

@section('title')
    Estate
@endsection

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
        
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Selamat datang, <b>{{ Auth::user()->name }} </b></li>
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
          
            <div class="card card-success ml-2 mr-2">
                
                {{-- card header --}}
                <div class="card-header">
                    <h3 class="card-title">Estate </h3>

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
                    <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                
            </div>

            {{-- list --}}
            <div class="col-12">
                <div class="card card-success">
                    
                    {{-- card header --}}
                    <div class="card-header">
                        <h3 class="card-title">List Download </h3>
    
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
                                        <th scope="col">Status</th>
                                        <th scope="col">Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 0;
                                    @endphp
                                    @foreach ($list as $data )
                                    @php
                                        $no++;
                                    @endphp 
                                        <tr>
                                            <td> {{ $no }}</td>
                                            <td>
                                                <a href="{{ route('estate.show', $data->kode_bangunan) }}">
                                                    {{ $data->kode_bangunan }}
                                                </a>
                                            <td> 
                                                @if ($data->status ==1)
                                                    <span class="badge bg-success">Approve</span>
                                                @elseif($data->status ==2)
                                                    <span class="badge bg-danger">Reject</span>
                                                @endif
                                            </td>
                                            <td class="col-2">
                                                
                                                @if ($data->type ==2)
                                                <a href="{{ route('download.master', $data->name) }}" class="btn btn-success btn-sm 
                                                    @if ($data->status != 1)
                                                        disabled
                                                    @endif 
                                                    ">
                                                    Download
                                                </a>
                                                @elseif ($data->type ==1)
                                                <a href="{{ route('download.photo', $data->name) }}" class="btn btn-success btn-sm 
                                                    @if ($data->status != 1)
                                                        disabled
                                                    @endif 
                                                    ">
                                                    Download
                                                </a>
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
        
            
    </section>

</div>

@endsection


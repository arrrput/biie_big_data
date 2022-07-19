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
                        <li class="breadcrumb-item">Estate</li>
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
                            <div class="col-sm-6">
                                <img src="{{ URL::asset('/storage/image/') }}/{{ $data->cover }}" class="img-fluid" style="height: 100%;"/>
                            </div>
                            <div class="col-sm-6">
                                <h1 style="color: rgb(16, 145, 37);"><span><i class="fa fa-home"></i></span> {{ $data->title }}</h1>
                                <p> {{ $data->deskripsi }}</p>
                                <h5><i class="fa fa-list"></i> {{ $data->kategori->name }}</h5>
                                
                                

                                @if ($data->status == 2)
                                    @if ($total > 0)
                                        @forelse ( $download->data as $data )
                                            <a href="{{ route('download.master', $data->name) }}" class="btn btn-danger mt-2"><i class="fa fa-download"></i> {{ $data->keterangan }}</a>
                                        @empty
                                            <button class="btn btn-primary"><i class="fa fa-o-clock"></i> Waiting</button>
                                        @endforelse
                                    @elseif ($pending > 0)
                                        <button class="btn btn-primary"><i class="fa fa-clock-o"></i> Waiting</button>
                                    @else
                                        <form method="POST" action="{{ route('request.download') }}">
                                            @csrf
                                            <input type="hidden" value="{{ $param }}" name="kode_bangunan"/>
                                            <input type="submit" class="btn btn-primary " value="Request Download">
                                        </form>
                                        
                                    @endif
                                @endif

                                @if ($data->status == 1)
                                
                                    @foreach ($data->dataEstate as $download)
                                        @if ($download->type == 2)
                                            <a href="{{ route('download.master', $download->name) }}" class="btn btn-danger mt-2"><i class="fa fa-download"></i> {{ $download->keterangan }}</a>
                                        @elseif ($download->type == 1)
                                            <a href="{{ route('download.photo', $download->name) }}" class="btn btn-danger mt-2"><i class="fa fa-download"></i> {{ $download->keterangan }}</a>
                                        @endif
                                    @endforeach
                                @endif
                                
                            </div>
                        </div>
                    
                </div>
            </div>
          </div>
          
        </div>
    
            
        
            
    </section>

</div>
@endsection
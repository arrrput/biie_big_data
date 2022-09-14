@extends('layouts.backend')

@section('title')
    ENV Folder
@endsection
@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <div class="content-header">
        <div class="container-fluid">
           
            <div class="row mb-2">
        
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">ENV</li>
                        <li class="breadcrumb-item active">Environment Folder</li>
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

            <div class="col-12">
                <div class="card card-success">
                  
                  {{-- card header --}}
                  <div class="card-header">
                      <h3 class="card-title">File Environment </h3>
  
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
                  <form method="POST">
                    
                  </form>
                  <div class="card-body">

                    {{-- Public Estate File --}}
                    <h3 class="mb-3 text-primary"> <span><i class="fa fa-folder active"></i></span> Public Environment File</h3>
                    
                    @php $no=0; @endphp
                    <div class="row">
                    @foreach ($folder as $list)
                        
                        @if ($no == 0 || $no % 3 == 0)
                            {{-- <div class="row"> --}}
                        @endif
                        
                        <div class="col-lg-4 col-6">
                            <div class="small-box bg-light">
                                <div class="inner">
                                    <h3>{{ $list->total }}</h3>
                                    <p>{{ $list->name }}</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-folder"></i>
                                </div>
                                    <a href="{{ route('env.file.folder', $list->id_sub_category) }}" class="small-box-footer">See File <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        @if ($no == 0 || $no % 3 == 0)
                        {{-- </div> --}}
                        @endif
                        @php $no++; @endphp
                    @endforeach
                </div>


                  </div>

                  

                </div>
            </div>
        </div>
    </section>

</div>
@endsection
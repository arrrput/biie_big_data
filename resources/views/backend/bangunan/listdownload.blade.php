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
                        <li class="breadcrumb-item">My List Download </b></li>
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
         
          
          {{-- Tab View --}}                    
          <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-success card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-est-tab" data-toggle="pill" href="#custom-tabs-one-est" role="tab" aria-controls="custom-tabs-one-est" aria-selected="false">
                                    <b>EST</b>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-gmo-tab" data-toggle="pill" href="#custom-tabs-one-gmo" role="tab" aria-controls="custom-tabs-one-gmo" aria-selected="false">
                                    <b>GMO</b>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-ims-tab" data-toggle="pill" href="#custom-tabs-one-ims" role="tab" aria-controls="custom-tabs-one-ims" aria-selected="false">
                                    <b>IMS</b>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="custom-tabs-one-aml-tab" data-toggle="pill" href="#custom-tabs-one-aml" role="tab" aria-controls="custom-tabs-one-aml" aria-selected="true">
                                    <b>AML</b>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="custom-tabs-one-cdd-tab" data-toggle="pill" href="#custom-tabs-one-cdd" role="tab" aria-controls="custom-tabs-one-cdd" aria-selected="true">
                                    <b>CDD</b>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="custom-tabs-one-hrd-tab" data-toggle="pill" href="#custom-tabs-one-hrd" role="tab" aria-controls="custom-tabs-one-hrd" aria-selected="true">
                                    HRD
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="custom-tabs-one-pod-tab" data-toggle="pill" href="#custom-tabs-one-pod" role="tab" aria-controls="custom-tabs-one-pod" aria-selected="true">
                                    <b>POD</b>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="custom-tabs-one-ssd-tab" data-toggle="pill" href="#custom-tabs-one-ssd" role="tab" aria-controls="custom-tabs-one-ssd" aria-selected="true">
                                <b>SSD</b>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="custom-tabs-one-bdv-tab" data-toggle="pill" href="#custom-tabs-one-bdv" role="tab" aria-controls="custom-tabs-one-bdv" aria-selected="true">
                                    <b>BDV</b>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        {{-- estate --}}
                        <div class="tab-pane fade active show" id="custom-tabs-one-est" role="tabpanel" aria-labelledby="custom-tabs-one-est-tab">
                            <h4><i class="fa fa-download"></i> Estate List Download</h4>
                            <table id="tbl_est" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kode Bangunan</th>
                                        <th scope="col">Name</th>
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
                                                    {{ $data->kode_bangunan }}      
                                            </td>
                                            <td>{{ $data->keterangan }}</td>
                                            <td> 
                                                @if ($data->status ==1)
                                                    <span class="badge bg-success">Approve</span>
                                                @elseif($data->status ==2)
                                                    <span class="badge bg-danger">Reject</span>
                                                @endif
                                            </td>
                                            <td class="col-2">
                                                
                                                @if ($data->status ==1)
                                                <a href="{{ route('view.pdf',$data->file) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-sm btn-danger" href="{{ route('download.master', $data->kode_bangunan) }}">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                                @elseif ($data->status ==2)
                                                    <button class="btn btn-sm btn-secondary" > <i class="fa fa-ban"></i> Reject</button>
                                                @endif
 
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                        {{-- GMO --}}
                        <div class="tab-pane fade" id="custom-tabs-one-gmo" role="tabpanel" aria-labelledby="custom-tabs-one-gmo-tab">
                             gmo
                        </div>
                        {{-- IMS --}}
                        <div class="tab-pane fade" id="custom-tabs-one-ims" role="tabpanel" aria-labelledby="custom-tabs-one-ims-tab">
                            ims
                        </div>
                        {{-- AML --}}
                        <div class="tab-pane fade  selection: show" id="custom-tabs-one-aml" role="tabpanel" aria-labelledby="custom-tabs-one-aml-tab">
                            aml
                        </div>
                        {{-- cdd --}}
                        <div class="tab-pane fade" id="custom-tabs-one-cdd" role="tabpanel" aria-labelledby="custom-tabs-one-cdd-tab">
                            cdd
                        </div>
                        {{-- hrd --}}
                        <div class="tab-pane fade " id="custom-tabs-one-hrd" role="tabpanel" aria-labelledby="custom-tabs-one-hrd-tab">
                            hrd
                        </div>
                        {{-- pod --}}
                        <div class="tab-pane fade " id="custom-tabs-one-pod" role="tabpanel" aria-labelledby="custom-tabs-one-pod-tab">
                            pod
                        </div>
                        {{-- ssd --}}
                        <div class="tab-pane fade" id="custom-tabs-one-ssd" role="tabpanel" aria-labelledby="custom-tabs-one-ssd-tab">
                            ssd
                        </div>
                        {{-- bdv --}}
                        <div class="tab-pane fade " id="custom-tabs-one-bdv" role="tabpanel" aria-labelledby="custom-tabs-one-bdv-tab">
                            bdv
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
    $('#tbl_est').DataTable();
});
</script>

@endpush


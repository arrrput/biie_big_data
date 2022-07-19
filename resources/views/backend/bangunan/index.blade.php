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
              @can('estate-create')
              <div class="card card-success">
                
                {{-- card header --}}
                <div class="card-header">
                    <h3 class="card-title">Form Input Gambar </h3>

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
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2></h2>
                            </div>
                        </div>
                    </div>
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif

                   
                    <form action="{{ route('estate.store') }}" method="POST" enctype="multipart/form-data">                   
                        @csrf

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">Judul<span class="text-danger">(*)</span></label>
                
                                    {!! Form::text('title', null, array('placeholder' => 'Judul','class' => 'form-control')) !!}
                                </div>
                            </div>
                            
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">Deskripsi singkat<span class="text-danger">(*)</span></label>
                                    <textarea name="title" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea>
                                </div>
                            </div>
                            
                        </div>

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-4">
                            <div class="form-group">
                                <label for="exampleInputName" class="form-label">Cover Photo<span class="text-danger">(*.jpg/jpeg/png)</span></label>
                                {!! Form::file('cover',array('class'=>'form-control rounded-0')) !!}
                                @error('cover')
                                        <span class="text-danger text-sm">{{ $message }}</span>                              
                                @enderror
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label for="exampleInputName" class="form-label">Status File<span class="text-danger">(*)</span></label>
                                <select class="custom-select rounded-0" placeholder="" id="jenis_barang" name="status">
                                    <option disable>-- Type File -- </option>                                    
                                        <option value="1">Public</option>
                                        <option value="2">Request</option>     
                                </select>
                                @error('status')
                                        <span class="text-danger text-sm">{{ $message }}</span>                              
                                @enderror
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-5">
                            <div class="form-group">
                                <label for="exampleInputName" class="form-label">Kategori <span class="text-danger">(*)</span></label>
                                <select class="custom-select rounded-0" placeholder="" id="jenis_barang" name="kategori">
                                    <option disable>-- Pilih Kategori -- </option>  
                                    @foreach ($kategori as $kat)
                                        <option value="{{ $kat->id }}">{{ $kat->name }}</option>
                                    @endforeach                                  
                                    
                                </select>
                                @error('kategori')
                                        <span class="text-danger text-sm">{{ $message }}</span>                              
                                @enderror
                            </div>
                        </div>
                    </div>
                      
                        @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <p>{{ Session::get('success') }}</p>
                        </div>
                        @endif
                        <table class="table table-hover" id="dynamicAddRemove">
                           
                            <tr>
                                <td><input type="file" name="addMoreInputFields[0][name]" placeholder="Nama" class="form-control" /></td>
                                <td><select class="custom-select rounded-0" placeholder="" id="jenis_barang" name="addMoreInputFields[0][type]">
                                    <option disable>-- Type File -- </option>                                    
                                        <option value="1">Photo</option>
                                        <option value="2">File Master (*.cad, or etc)</option>     
                                    </select>
                                </td>
                                <td><input type="text" name="addMoreInputFields[0][keterangan]" placeholder="Keterangan" class="form-control" /></td>
                                <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary"><i class="fa fa-plus"></i></button></td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-outline-success btn-block mt-3 mb-3">Submit</button>
                    </form>
                    {{-- end form --}}
                        
                    
                </div>
                </div>
            </div>
              @endcan
            
          
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
                
                @can('list-estate')
                <div class="card-body">

                    @foreach ($list_estate as $list)
                    <div class="info-box">
                        <div class="col-md-1 col-sm-6 col-12">
                            <img src="{{ URL::asset('storage/image/') }}/{{ $list->cover }}" class="img-fluid"/>
                        </div>
                        <div class="info-box-content">
                            
                            <span class="info-box-text">
                            <a href="{{ route('estate.show', $list->kode_bangunan) }}">
                            <h3>{{ $list->title }}</h3></a> {{ $list->deskripsi }}</span>
                            
                        </div>
                        <div class="align-right">
                            <p><span class="align-right ml-5">{{ $list->kategori->name }}</span></p>
                            <form method="DELETE" action="{{ route('estate.destroy', $list->kode_bangunan) }}">
                                @csrf
                                @can('estate-delete')
                                    <input type="submit" class="btn btn-danger " value="Delete">
                                @endcan
                            </form>
                        </div>
                    </div>
                    @endforeach
                            

                    {{ $list_estate->links() }}
                </div>
                    
                @endcan
                
            </div>
        
        </div>       
        
            
    </section>

</div>

@endsection

@push('prepend-script')
    <script>
        var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="file" name="addMoreInputFields['+ i +'][name]" placeholder="Nama Barang" class="form-control" /></td> <td><select class="custom-select rounded-0" placeholder="" id="jenis_barang" name="addMoreInputFields[' + i + '][type]"><option disable>-- Type File -- </option><option value="1">Photo</option><option value="2">File Master (*.cad, or etc)</option></select></td>  <td><input type="text" name="addMoreInputFields[' + i + '][keterangan]" placeholder="Keterangan" class="form-control" /></td> <td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="fa fa-trash"></i></button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

    $(document).ready( function () {
        $('#tableDashboard').DataTable();
    });

   


    </script>
@endpush

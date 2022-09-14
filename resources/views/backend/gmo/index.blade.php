@extends('layouts.backend')

@section('title')
    GMO
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
                        <li class="breadcrumb-item active">ENV /</li>
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

    {{-- Content --}}
    <section class="content">
        <div class="container-fluid">
            {{-- Card Form --}}

            {{-- modal edit --}}
            <div class="modal fade bd-example-modal-xl" id="env_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <form action="{{ route('env.store') }}" method="POST" enctype="multipart/form-data">                   
                        @csrf
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="k_bangunan"><i class="fa fa-plus"></i> Add Document</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">                            
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">Title<span class="text-danger">(*)</span></label>
                                    {!! Form::text('name', null, array('id'=> 'title','placeholder' => 'Title','class' => 'form-control')) !!}
                                    {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">Status<span class="text-danger">(*)</span></label>
                                    <select class="custom-select rounded-0" placeholder="" name="status" id="status">
                                        <option disable>-- Pilih -- </option>       
                                        <option value="1">Public</option>
                                        <option value="2">Request</option>                             
                                    </select>
                                    @error('status')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">Status Akses<span class="text-danger">(*)</span></label>
                                    <select class="custom-select rounded-0" placeholder="" name="status_akses" id="status_akses">
                                        <option disable>-- Pilih -- </option>       
                                        <option value="1">All Department</option>
                                        <option value="2">Internal</option>                             
                                    </select>
                                    @error('status')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">Category <span class="text-danger">(*)</span></label>
                                    <select class="custom-select rounded-0" placeholder="" id="id_category" name="kategori">
                                        <option disable>-- Pilih Kategori -- </option>  
                                        @foreach ($gmo_kategori as $kat)
                                            <option value="{{ $kat->id }}">{{ $kat->name }}</option>
                                        @endforeach 
                                    </select>
                                    @error('kategori')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                    
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">Sub Category<span class="text-danger">(*)</span></label>
                                    <select class="custom-select rounded-0" placeholder="" id="sub_category" name="sub_category">
                                        <option disable>-- Pilih -- </option>                                    
                                    </select>
                                    @error('status')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">Due Date (Optional)</label>
                                    <input type="date" id="edue_date" name="due_date" class="date-picker form-control rounded-0" data-date-format="dd//yyyy" placeholder="Due Date"/>
                                    @error('status')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">Reminder Day<span class="text-danger">(*)</span></label>
                                    <select class="custom-select rounded-0" placeholder="" name="reminder" id="reminder">
                                        <option disable>-- Pilih -- </option>       
                                        <option value="7">1 Minggu</option>
                                        <option value="30">1 bulan</option>
                                        <option value="90">3 bulan</option>
                                        <option value="180">6 bulan</option>                             
                                    </select>
                                    @error('status')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-12">
                                <table class="table table-stripped" id="dynamicAddRemove">
                                    <tr>
                                        <td>
                                            <input type="file" name="addMoreInputFields[0][name]" placeholder="File" class="form-control" />
                                        </td>
                                        
                                        <td>
                                            <input type="text" name="addMoreInputFields[0][keterangan]" placeholder="Name File" class="form-control" />
                                        </td> 
                                        <td>
                                            <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary"><i class="fas fa-plus"></i></button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="Submit" />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                    </form>
                </div>
            </div>

            <div class="card card-success">
                
                {{-- card header --}}
                <div class="card-header">
                    <h3 class="card-title">File GMO </h3>
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
                                {{-- <h2>Arsitektural</h2> --}}
                            </div>
                        </div>

                        
                        <div class="col-lg-12">
                            <button class="btn btn-sm btn-success float-right mb-2" data-toggle="modal" data-target="#env_add"><i class="fa fa-upload"></i>  Add File</button>
                            <table id="datatable_env" class="table table-hover">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">#</th> --}}
                                        <th scope="col">#</th>
                                        <th scope="col">Name File</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Sub Category</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $list)
                                        <tr>
                                            <td><a href="{{ route('env.show', $list->kode_env) }}">{{ $list->kode_env }}</a></td>
                                            <td>{{ $list->name }}</td>
                                            <td>{{ $list->category }}</td>
                                            <td>{{ $list->subcategory }}</td>
                                            <td><button class="btn btn-sm btn-success"><i class="fa fa-edit"></i> update</button></td>
                                        </tr>                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- End Content --}}
</div>
    
@endsection

@push('prepend-script')
    <script>
        var table;
        $(document).ready( function () {

            table = $('#datatable_env').DataTable({

            });

        });

        // multiple file upload
        var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="file" name="addMoreInputFields['+ i +'][name]" placeholder="Nama Barang" class="form-control" /></td>  <td><input type="text" name="addMoreInputFields[' + i + '][name]" placeholder="Name File" class="form-control" /></td> <td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="fa fa-trash"></i></button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

    //dropdown category and sub category
   $('#id_category').change(function(){
    var idDept = $(this).val();    
    if(idDept){
        $.ajax({
           type:"GET",
           url:"gmo/gmo_cat/"+idDept,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#sub_category").empty();
                $("#sub_category").append('<option>--Pilih SubCategory--</option>');
                $.each(res,function(name,id){
                    $("#sub_category").append('<option value="'+id+'">'+name+'</option>');
                });
            }else{
               $("#sub_category").empty();
            }
           }
        });
    }else{
        $("#sub_category").empty();
    }      
   });
    </script>
@endpush
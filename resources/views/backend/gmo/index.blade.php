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

            {{-- modal add --}}
            <div class="modal fade bd-example-modal-xl" id="env_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <form action="{{ route('gmo.store') }}" method="POST" enctype="multipart/form-data">                   
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
                                    <label for="exampleInputName" class="form-label">Reminder Day (Optional)</label>
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


            {{-- modal edit --}}
            <div class="modal fade bd-example-modal-xl" id="env-edit" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <form action="{{ route('env.store') }}" method="POST" enctype="multipart/form-data">                   
                        @csrf
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="k_bangunan"><i class="fa fa-plus"></i> Edit File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">                            
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">Title<span class="text-danger">(*)</span></label>
                                    {!! Form::text('name', null, array('id'=> 'etitle','placeholder' => 'Title','class' => 'form-control')) !!}
                                    {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">Status<span class="text-danger">(*)</span></label>
                                    <select class="custom-select rounded-0" placeholder="" name="status" id="estatus">
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
                                    <select class="custom-select rounded-0" placeholder="" name="status_akses" id="estatus_akses">
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
                                    <select class="custom-select rounded-0" placeholder="" id="eid_category" name="kategori">
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
                                    <select class="custom-select rounded-0" placeholder="" id="eid_sub_category" name="sub_category">
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
                                    <label for="exampleInputName" class="form-label">Reminder Day (Optional)</label>
                                    <select class="custom-select rounded-0" placeholder="" name="reminder" id="ereminder">
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
                                <table id="datatable_edit" class="table table-hover">
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col">#</th> --}}
                                            <th scope="col">File</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="Submit" />
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-dismiss="modal">Add New File</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                    </form>
                </div>
            </div>

            {{-- Add Document --}}
            <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Add Document</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
        
                    <form action="{{ route('gmo.update_data') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <table class="table table-stripped" id="dynamicAddRemove-edit">
                                    <tr>
                                        <td>
                                            <input type="hidden" name="addMoreInputFields[0][kode_gmo]"  id="ekd_est" class="form-control"/>
                                            <input type="file" name="addMoreInputFields[0][file]" placeholder="Nama Barang" class="form-control" />
                                        </td>
                                        
                                        <td>
                                            <input type="text" name="addMoreInputFields[0][name]" placeholder="Name" class="form-control" />
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
                            <table id="list" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">kode</th>
                                        <th scope="col">name</th>
                                        <th scope="col">category</th>
                                        <th scope="col">sub_category</th>
                                        <th scope="col">action</th>
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
    </section>
    {{-- End Content --}}
</div>
    
@endsection

@push('prepend-script')
    <script>
        var table;
        var SITEURL = '{{URL::to('')}}';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $(document).ready( function () {

            table = $('#datatable_env').DataTable({

            });

            $('#list').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('gmo.ajax.file') }}",
                type: "GET",
                dataType: 'JSON',
            },
                columns: [
                    // {data: 'rownum', name: 'id', orderable: false},
                    // let name = 'ee'
                    {data: 'kode_gmo', name: 'kode_gmo', orderable: true, searchable: false},
                    {data:'name', name : 'name',orderable: true, searchable: true},
                    {data:'category', name : 'category',orderable: true, searchable: false},
                    {data:'subcategory', name : 'subcategory',orderable: true, searchable: false},
                    {data: 'action', name: 'action'},
                ]
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

   //dropdown edit category and sub category
   $('#eid_category').change(function(){
    var idDept = $(this).val();    
    if(idDept){
        $.ajax({
           type:"GET",
           url:"gmo/gmo_cat/"+idDept,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#eid_sub_category").empty();
                $("#eid_sub_category").append('<option>--Pilih SubCategory--</option>');
                $.each(res,function(name,id){
                    $("#eid_sub_category").append('<option value="'+id+'">'+name+'</option>');
                });
            }else{
               $("#eid_sub_category").empty();
            }
           }
        });
    }else{
        $("#eid_sub_category").empty();
    }      
   });


   function editEnv(id){
    let kd;
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/gmo/gmo-edit/"+id,
        dataType: 'json',
        success: function(res){
           
            document.getElementById("k_bangunan").innerHTML = res.kode_env;
            kd = res.kode_bangunan;
            //document.getElementById("etitle").innerHTML = res.title;
            console.log(res.id);
            kd_est_edit = res.kode_gmo;
            $('#eid').val(res.id);
            $('#ekode_env').val(res.kode_gmo);
            $('#etitle').val(res.name);
            $('#estatus').val(res.status_request);
            $('#estatus_akses').val(res.status_akses);
            $('#edue_date').val(res.due_date);
            $('#ereminder').val(res.reminder);
            $('#eid_category').val(res.id_category).change();
                setTimeout(function() { 
                    $('#eid_sub_category').val(res.id_sub_category).change();
                }, 500);
            document.getElementById("ekd_est").value = res.kode_gmo;
            // request
             table_edit =  $('#datatable_edit').DataTable({
                        processing: true,
                        serverSide: true,
                        stateSave: true,
                        "bDestroy": true,
                        ajax: {
                            url: "{{ URL::to('/') }}/gmo/ajax/"+res.kode_gmo+"/gmo",
                            dataType: 'json',
                            type: "GET",                    
                        },
                            columns: [
                                // {data: 'rownum', name: 'id', orderable: false},
                                // let name = 'ee'
                                {data: 'file', name: 'file', orderable: false, searchable: false},
                                {data:'name', name : 'name',orderable: false, searchable: true},
                                {data: 'action', name: 'action'},
                            ]
                }); 
            
        }

        });
   }

   //delete Estate
   function deleteFunc(id){
            if (confirm("Delete File ini?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/gmo/delete-file/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){
                        // var oTable = $('#table_est').dataTable();
                        // oTable.fnDraw(false);
                        table.ajax.reload();
                        $('#list').ajax.reload();

                    }
                });
            }
        }

    
    function deleteData(id){
        if (confirm("Delete item ini?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/gmo/delete-data/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){
                        
                        table_edit.ajax.reload();
                    }
                });
            }
    }


    </script>
@endpush
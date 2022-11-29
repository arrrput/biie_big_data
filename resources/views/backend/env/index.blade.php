@extends('layouts.master')


@push('plugin-styles')
    {!! Html::style('assets/css/ui-elements/breadcrumbs.css') !!}
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('assets/css/ui-elements/alert.css') !!}
    
@endpush
@section('title')
    Environment
@endsection


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('ENV')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Environment Document')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    @if (session('message'))
    <div class="alert alert-icon-button-left alert-light-success text-success-teal mb-4" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="{{__('Close')}}">
            <i class="las la-times text-success-teal"></i>
        </button>
        <i class="las la-check-double text-success-teal font-20"></i>
        <strong>{{__('Success!')}}</strong> Data Successfully Add!
        <button type="button" class="btn btn-sm bg-gradient-success float-right mr-2 text-white" data-dismiss="alert" aria-label="{{__('Close')}}">
            {{__('Dismiss')}}
        </button>
    </div>    
    @endif

     {{-- modal add --}}
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
                                @foreach ($env_kategori as $kat)
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
                                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary"><i class="las la-plus"></i></button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Submit" />
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
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
                                @foreach ($env_kategori as $kat)
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
                            <label for="exampleInputName" class="form-label">Reminder Day<span class="text-danger">(*)</span></label>
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
                <input type="submit" class="btn btn-primary" value="Submit" />
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-dismiss="modal">Add New File</button>
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
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

            <form action="{{ route('env.update_data') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table class="table table-stripped" id="dynamicAddRemove-edit">
                            <tr>
                                <td>
                                    <input type="hidden" name="addMoreInputFields[0][kode_env]"  id="ekd_est" class="form-control"/>
                                    <input type="file" name="addMoreInputFields[0][file]" placeholder="Nama Barang" class="form-control" />
                                </td>
                                
                                <td>
                                    <input type="text" name="addMoreInputFields[0][name]" placeholder="Name" class="form-control" />
                                </td> 
                                <td>
                                    <button type="button" name="add" id="dynamic-ar-edit" class="btn btn-outline-primary"><i class="las la-plus"></i></button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" value="Submit" class="btn btn-primary"/>  
              <button type="button" class="btn btn-white" data-toggle="modal" data-target="#estate-edit" data-dismiss="modal">Back</button>
            </div>
            </form>
          </div>
        </div>
    </div>
   

    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="layout-top-spacing mb-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing">
                            <div class="col-lg-12 layout-spacing">
                                <!-- Your Content Here -->

                                 <!-- BASIC -->
                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                    <div class="widget-content widget-content-area br-6">
                                        <h4 class="table-header"><i class="las la-leaf text-success"></i> {{__('Enviroment Document file')}}</h4>
                                        <div class="table-responsive mb-4">
                                            <hr>
                                            @can('ims external-add')
                                            <button class="btn btn-sm btn-primary float-right mb-2 ml-3" data-toggle="modal" data-target="#env_add">
                                                <i class="las la-upload"></i>  Add File
                                            </button>

                                            
                                            @endcan
                                            
                                            <table id="list" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">kode</th>
                                                        <th scope="col">name</th>
                                                        <th scope="col">category</th>
                                                        <th scope="col">sub_category</th>
                                                        <th scope="col" style="width:70px;">action</th>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->

   
</div>
    
@endsection

@push('plugin-scripts')
   
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/table/datatable/datatables.js') !!}
    
@endpush

@push('custom-scripts')
    <script>

        // header request token
    var SITEURL = '{{URL::to('')}}';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        var table, list;
        var table_edit;
        $(document).ready( function () {

            table =  $('#list').DataTable({
            "language": {
                "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
                }
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('env.ajax.file') }}",
                type: "GET",
                dataType: 'JSON',
            },
                columns: [
                    // {data: 'rownum', name: 'id', orderable: false},
                    // let name = 'ee'
                    {data: 'kode_env', name: 'kode_env', orderable: true, searchable: false},
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
        $("#dynamicAddRemove").append('<tr><td><input type="file" name="addMoreInputFields['+ i +'][name]" placeholder="Nama Barang" class="form-control" /></td>  <td><input type="text" name="addMoreInputFields[' + i + '][name]" placeholder="Name File" class="form-control" /></td> <td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="las la-trash"></i></button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

    $("#close_edit").click(function () {
        table_edit.DataTable().clear().draw();
        console.log('Close Edit');
    });

    //dynamic edit
    $("#dynamic-ar-edit").click(function () {
        ++i;
        $("#dynamicAddRemove-edit").append('<tr><td><input type="hidden" name="addMoreInputFields['+i+'][kode_env]" value="'+kd_est_edit+'"  id="ekd_est" class="form-control"/> <input type="file" name="addMoreInputFields['+ i +'][file]" placeholder="Nama Barang" class="form-control" /></td>  <td><input type="text" name="addMoreInputFields[' + i + '][name]" placeholder="Name" class="form-control" /></td> <td><button type="button" class="btn btn-outline-danger remove-input-field-edit"><i class="las la-trash"></i></button></td></tr>');
    });
    $(document).on('click', '.remove-input-field-edit', function () {
        $(this).parents('tr').remove();
    }); 

    //dropdown category and sub category
   $('#id_category').change(function(){
    var idDept = $(this).val();    
    if(idDept){
        $.ajax({
           type:"GET",
           url:"env/env_cat/"+idDept,
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

   //dropdown category and sub category
   $('#eid_category').change(function(){
    var idDept = $(this).val();    
    if(idDept){
        $.ajax({
           type:"GET",
           url:"env/env_cat/"+idDept,
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
        url: "{{ URL::to('/') }}/env/env-edit/"+id,
        dataType: 'json',
        success: function(res){
           
            // document.getElementById("k_bangunan").innerHTML = res.kode_env;
            kd = res.kode_bangunan;
            //document.getElementById("etitle").innerHTML = res.title;
            console.log(res.id);
            kd_est_edit = res.kode_env;
            $('#eid').val(res.id);
            $('#ekode_env').val(res.kode_env);
            $('#etitle').val(res.name);
            $('#estatus').val(res.status_request);
            $('#estatus_akses').val(res.status_akses);
            $('#edue_date').val(res.due_date);
            $('#ereminder').val(res.reminder);
            $('#eid_category').val(res.id_category).change();
                setTimeout(function() { 
                    $('#eid_sub_category').val(res.id_sub_category).change();
                }, 500);
            document.getElementById("ekd_est").value = res.kode_env;
            // request
             table_edit =  $('#datatable_edit').DataTable({
                        processing: true,
                        serverSide: true,
                        stateSave: true,
                        "bDestroy": true,
                        ajax: {
                            url: "{{ URL::to('/') }}/env/ajax/"+res.kode_env+"/env",
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
                    url: "{{ URL::to('/') }}/env/delete-file/"+id,
                    data: { id: id},
                    success: function(res){
                        table.ajax.reload();
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
                    url: "{{ URL::to('/') }}/env/delete-data/"+id,
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
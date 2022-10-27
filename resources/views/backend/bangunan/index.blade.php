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

    {{-- modal view --}}
    <div class="modal fade bd-example-modal-xl" id="estate-view" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="kode_bangunan"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  
                  <div class="text-center">
                    <lottie-player class="img img-fluid ml-5" src="https://assets10.lottiefiles.com/private_files/lf30_qfo5v4ih.json" background="transparent"  speed="1"  style="width: 300px; height: 300px;" loop autoplay>
                    </lottie-player>
                  </div>
                  <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-4">
                            <div class="form-group">
                                
                                <p id="title"></p>
                                <p id="name"></p>
                                <p id="category"></p>
                                <p id="subcategory"></p>
                                <p id="btn-download"></p>
                            </div>
                        </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
        </div>
    </div>

    {{-- modal edit --}}
    <div class="modal fade bd-example-modal-xl" id="estate-edit" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <form action="{{ route('estate.store') }}" method="POST" enctype="multipart/form-data">                   
                @csrf
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="k_bangunan"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Title<span class="text-danger">(*)</span></label>
                            <input type="hidden" class="form-control" id="eid" name="id"/>
                            <input type="hidden" class="form-control" id="ekode_bangunan" name="kode_bangunan"/>
                            {{-- {!! Form::text('title', null, array('id'=> 'etitle', 'placeholder' => 'Title','class' => 'form-control')) !!} --}}
                            <select class="custom-select rounded-0" placeholder="" name="title" id="etitle">
                                <option disable>-- Pilih -- </option>   
                                <option value="MAP">MAP</option>    
                                <option value="FACTORY">FACTORY </option> 
                                <option value="DORMITORY">DORMITORY</option>
                                <option value="PORT">PORT</option>  
                                <option value="TOWN CENTER">TOWN CENTER</option>  
                                <option value="POWER HOUSE">POWER HOUSE</option>
                                <option value="RWPS">RWPS</option>
                                <option value="STP">STP</option>
                                <option value="WTP">WTP</option>
                                <option value="WWTP">WWTP</option>
                                <option value="VILLA">VILLA</option>                           
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Name<span class="text-danger">(*)</span></label>
                            {!! Form::text('name', null, array('id'=> 'ename','placeholder' => 'Name','class' => 'form-control')) !!}
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
                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Category <span class="text-danger">(*)</span></label>
                            <select class="custom-select rounded-0" placeholder="" id="eid_category" name="kategori">
                                <option disable>-- Pilih Kategori -- </option>  
                                @foreach ($est_kategori as $kat)
                                    <option value="{{ $kat->id }}">{{ $kat->name }}</option>
                                @endforeach 
                            </select>
                            @error('kategori')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                            
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Sub Category<span class="text-danger">(*)</span></label>
                            <select class="custom-select rounded-0" placeholder="" id="esub_category" name="sub_category">
                                <option disable>-- Pilih -- </option>                                    
                            </select>
                            @error('status')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Due Date (Optional)</label>
                            <input type="date" id="edue_date" name="due_date" class="date-picker form-control rounded-0" data-date-format="dd//yyyy" placeholder="Due Date"/>
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
                <input type="submit" class="btn btn-success" value="Update" />
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-dismiss="modal">Add New File</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close_edit">Close</button>
              </div>
            </div>
            </form>
        </div>
    </div>

    <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Add Document</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="{{ route('estate.update_data') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table class="table table-stripped" id="dynamicAddRemove-edit">
                            <tr>
                                <td>
                                    <input type="hidden" name="addMoreInputFields[0][kd_bangunan]"  id="ekd_est" class="form-control"/>
                                    <input type="file" name="addMoreInputFields[0][name]" placeholder="Nama Barang" class="form-control" />
                                </td>
                                <td>
                                    <select class="custom-select rounded-0" placeholder="" id="id_category" name="addMoreInputFields[0][id_category]">
                                        <option disable>-- Pilih Kategori --</option>  
                                        @foreach ($est_kategori as $kat)
                                            <option value="{{ $kat->id }}">{{ $kat->name }}</option>
                                        @endforeach 
                                    </select> 
                                </td>
                                <td>
                                    <input type="text" name="addMoreInputFields[0][keterangan]" placeholder="Name" class="form-control" />
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
                    <h3 class="card-title">Drawing Input Estate </h3>

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
                                    <label for="exampleInputName" class="form-label">Type<span class="text-danger">(*)</span></label>
                
                                    {{-- {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!} --}}

                                    <select class="custom-select rounded-0" placeholder="" name="title">
                                        <option disable>-- Pilih -- </option>   
                                        <option value="MAP">MAP</option>    
                                        <option value="FACTORY">FACTORY </option> 
                                        <option value="DORMITORY">DORMITORY</option>
                                        <option value="PORT">PORT</option>  
                                        <option value="TOWN CENTER">TOWN CENTER</option>  
                                        <option value="POWER HOUSE">POWER HOUSE</option>
                                        <option value="RWPS">RWPS</option>
                                        <option value="STP">STP</option>
                                        <option value="WTP">WTP</option>
                                        <option value="WWTP">WWTP</option>
                                        <option value="VILLA">VILLA</option>                           
                                    </select>
                                </div>
                            </div>
                            
                            
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">Name<span class="text-danger">(*)</span></label>
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">Status Document<span class="text-danger">(*)</span></label>
                                    <select class="custom-select rounded-0" placeholder="" name="status">
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
                                    <select class="custom-select rounded-0" placeholder="" name="status_akses">
                                        <option disable>-- Pilih -- </option>       
                                        <option value="1">All Department</option>
                                        <option value="2">Internal Department</option>                             
                                    </select>
                                    @error('status')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">Category <span class="text-danger">(*)</span></label>
                                    <select class="custom-select rounded-0" placeholder="" id="add_id_category" name="kategori">
                                        <option disable>-- Pilih Kategori --</option>  
                                        @foreach ($est_kategori as $kat)
                                            <option value="{{ $kat->id }}">{{ $kat->name }}</option>
                                        @endforeach 
                                    </select>
                                    @error('kategori')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                    
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">Sub Category<span class="text-danger">(*)</span></label>
                                    <select class="custom-select rounded-0" placeholder="" id="add_sub_category" name="sub_category">
                                        <option value="" disable>-- Pilih -- </option>                                    
                                    </select>
                                    @error('sub_category')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">Due Date (Optional)</label>
                                    <input type="date" name="due_date" class="date-picker form-control rounded-0" data-date-format="dd//yyyy" placeholder="Due Date"/>
                                    @error('status')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="row">                          

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <table class="table table-stripped" id="dynamicAddRemove">
                                    <tr>
                                        <td>
                                            <input type="file" name="addMoreInputFields[0][name]" placeholder="Nama Barang" class="form-control" />
                                        </td>
                                        <td>
                                            <select class="custom-select rounded-0" placeholder="" id="id_category" name="addMoreInputFields[0][id_category]">
                                                <option disable>-- Pilih Kategori --</option>  
                                                @foreach ($est_kategori as $kat)
                                                    <option value="{{ $kat->id }}">{{ $kat->name }}</option>
                                                @endforeach 
                                            </select>
                                            
                                        </td>
                                        <td>
                                            <input type="text" name="addMoreInputFields[0][keterangan]" placeholder="Name" class="form-control" />
                                        </td> 
                                        <td>
                                            <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary"><i class="fas fa-plus"></i></button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                      
                        @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <p>{{ Session::get('success') }}</p>
                        </div>
                        @endif
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

                    {{-- Advanced Filter --}}
                    <h4><i class="fa fa-filter"></i> Filter Estate</h4>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-3">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id"/>
                                <input type="text" name="etitle" placeholder="Title" id="etitle" class="form-control filter"/>
                                
                            </div>
                        </div>
                        
                        
                        <div class="col-xs-6 col-sm-6 col-md-3">
                            <div class="form-group">
                                <input type="text" name="ename" placeholder="Name" id="ename" class="form-control filter"/>
                            </div>
                        </div>
                        
                        <div class="col-xs-6 col-sm-6 col-md-3">
                            <div class="form-group">
                                <select class="custom-select rounded-0 filter" placeholder="" id="cid_category" name="kategori">
                                    <option disable>-- All Category -- </option>  
                                    @foreach ($est_kategori as $kat)
                                        <option value="{{ $kat->id }}">{{ $kat->name }}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
    
                        <div class="col-xs-6 col-sm-6 col-md-3">
                            <div class="form-group">
                                <select class="custom-select rounded-0 filter" placeholder="" id="csub_category" name="sub_category">
                                    <option disable>-- All SubCategory -- </option>                                    
                                </select>
                            </div>
                        </div>

                        

                    </div>
    
                    <hr>
                    <table id="datatable_est" class="table table-hover">
                        <thead>
                            <tr>
                                {{-- <th scope="col">#</th> --}}
                                <th scope="col">Kode Bangunan</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Sub Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>

                    {{-- {{ $list_estate->links() }} --}}
                </div>
                    
                @endcan
                
            </div>
        
        </div>       
        
            
    </section>

</div>

@endsection

@push('prepend-script')
    <script>
    
    // header request token
    var SITEURL = '{{URL::to('')}}';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var table;
    var kd_est_edit;
    let cid_category = $("#cid_category").val()
    let csub_category = $("#csub_category").val()

    $(document).ready( function () {

        // $('#table_est').DataTable();
        table = $('#datatable_est').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('est-filter') }}",
            type: "POST",
            data: function(d){
                d.id_est_category = cid_category;
                d.id_est_sub_category = csub_category; 
                d.ename = $("#ename").val();
                d.etitle = $("#etitle").val();
                return d
            }
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                {data: 'kode_bangunan', name: 'kode_bangunan', orderable: true, searchable: false},
                {data:'fullname', name : 'name',orderable: true, searchable: true},
                {data:'category', name : 'category',orderable: true, searchable: false},
                {data:'subcategory', name : 'subcategory',orderable: true, searchable: false},
                {data: 'action', name: 'action'},
            ]
        }); 
  
    });

    // function filterSearch(){
    //      cid_category = $("#cid_category").val()
    //      csub_category = $("#csub_category").val()
    //     table.ajax.reload(null, false)
    //     console.log([cid_category, csub_category])
    // }
   $(".filter").on('change', function(){
        console.log("FILTER")
        cid_category = $("#cid_category").val()
        csub_category = $("#csub_category").val()
        

        $('#datatable_est').DataTable().ajax.reload(null, false)
   });


    
    //delete Estate
    function deleteFunc(id){
            if (confirm("Delete item ini?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/est-delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){
                        // var oTable = $('#table_est').dataTable();
                        // oTable.fnDraw(false);
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
                    url: "{{ URL::to('/') }}/est-file-delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){
                        
                        table_edit .ajax.reload();
                    }
                });
            }
    }
        
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="file" name="addMoreInputFields['+ i +'][name]" placeholder="Nama Barang" class="form-control" /></td> <td><select class="custom-select rounded-0" placeholder="" id="id_category" name="addMoreInputFields['+i+'][id_category]"><option disable>-- Pilih Kategori --</option>@foreach ($est_kategori as $kat)<option value="{{ $kat->id }}">{{ $kat->name }}</option>@endforeach </select></td> <td><input type="text" name="addMoreInputFields[' + i + '][keterangan]" placeholder="Name" class="form-control" /></td> <td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="fa fa-trash"></i></button></td></tr>');
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
        $("#dynamicAddRemove-edit").append('<tr><td><input type="hidden" name="addMoreInputFields['+i+'][kd_bangunan]" value="'+kd_est_edit+'"  id="ekd_est" class="form-control"/> <input type="file" name="addMoreInputFields['+ i +'][name]" placeholder="Nama Barang" class="form-control" /></td> <td><select class="custom-select rounded-0" placeholder="" id="id_category" name="addMoreInputFields['+i+'][id_category]"><option disable>-- Pilih Kategori --</option>@foreach ($est_kategori as $kat)<option value="{{ $kat->id }}">{{ $kat->name }}</option>@endforeach </select></td>  <td><input type="text" name="addMoreInputFields[' + i + '][keterangan]" placeholder="Name" class="form-control" /></td> <td><button type="button" class="btn btn-outline-danger remove-input-field-edit"><i class="fa fa-trash"></i></button></td></tr>');
    });
    $(document).on('click', '.remove-input-field-edit', function () {
        $(this).parents('tr').remove();
    });

    //close edit
    $("#close_edit").click(function () {
        table_edit.DataTable().clear().draw();
        console.log('Close Edit');
    });

    //show estate
    function showEstate(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/estate-edit/"+id,
        dataType: 'json',
        success: function(res){
            $('#estate-view').modal('show');
            document.getElementById("kode_bangunan").innerHTML = res.kode_bangunan;
            document.getElementById("title").innerHTML = res.title;
            document.getElementById("name").innerHTML = res.name;
            document.getElementById("category").innerHTML = res.category;
            document.getElementById("subcategory").innerHTML = res.subcategory;
            document.getElementById("btn-download").appendChild('<a href="#" class="btn btn-success">Request File</a> ');   
            if(res.status = 1){
                document.getElementById("btn-download").appendChild('<a href="#" class="btn btn-success">Request File</a> ');
            }else{
                document.getElementById("btn-download").appendChild('<a href="#" class="btn btn-danger">Danger</a> ');
            }
            // $('#kode_bangunan').val(res.kode_bangunan);
            // $('#name').val(res.name);
            }
        });
    }
    
    

   //dropdown category and sub category
   $('#id_category').change(function(){
    var idDept = $(this).val();    
    if(idDept){
        $.ajax({
           type:"GET",
           url:"/est_cat/"+idDept,
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
   $('#add_id_category').change(function(){
    var idDept = $(this).val();    
    if(idDept){
        $.ajax({
           type:"GET",
           url:"/est_cat/"+idDept,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#add_sub_category").empty();
                $("#add_sub_category").append('<option>--Pilih SubCategory--</option>');
                $.each(res,function(name,id){
                    $("#add_sub_category").append('<option value="'+id+'">'+name+'</option>');
                });
            }else{
               $("#add_sub_category").empty();
            }
           }
        });
    }else{
        $("#add_sub_category").empty();
    }      
   });

   //dropdown edit category and sub category
   $('#eid_category').change(function(){
    var idDept = $(this).val();    
    if(idDept){
        $.ajax({
           type:"GET",
           url:"/est_cat/"+idDept,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#esub_category").empty();
                $("#esub_category").append('<option>--Pilih SubCategory--</option>');
                $.each(res,function(name,id){
                    $("#esub_category").append('<option value="'+id+'">'+name+'</option>');
                });
            }else{
               $("#esub_category").empty();
            }
           }
        });
    }else{
        $("#esub_category").empty();
    }      
   });

   //dropdown edit category and sub category
   $('#cid_category').change(function(){
    var idDept = $(this).val();    
    if(idDept){
        $.ajax({
           type:"GET",
           url:"/est_cat/"+idDept,
           dataType: 'JSON',
           success:function(res){      
                     
            if(res){
                $("#csub_category").empty();
                $("#csub_category").append('<option>--Pilih SubCategory--</option>');
                $.each(res,function(name,id){
                    $("#csub_category").append('<option value="'+id+'">'+name+'</option>');
                });
            }else{
               $("#csub_category").empty();
            }
           }
        });
    }else{
        $("#csub_category").empty();
    }      
   });

   var table_edit;
   //Edit estate
   function editEstate(id){
       let kd;
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/estate-edit/"+id,
        dataType: 'json',
        success: function(res){
            $('#estate-edit').modal('show');
            document.getElementById("k_bangunan").innerHTML = res.kode_bangunan;
            kd = res.kode_bangunan;
            //document.getElementById("etitle").innerHTML = res.title;
            console.log(res.id);
            kd_est_edit = res.kode_bangunan;
            $('#eid').val(res.id);
            $('#ekode_bangunan').val(res.kode_bangunan);
            $('#etitle').val(res.title);
            $('#ename').val(res.name);
            $('#deskripsi').val(res.deskripsi);
            $('#status').val(res.status);
            $('#status_akses').val(res.status_akses);
            $('#edue_date').val(res.due_date);
            document.getElementById("ekd_est").value = res.kode_bangunan;
            // $('#efile').attr('src', SITEURL +'public/file/'+res.cover);

            $('#eid_category').val(res.id_est_category).change();
                setTimeout(function() { 
                    $('#esub_category').val(res.id_est_sub_category).change();
                }, 500);
                $('#status').val(res.status);

            // request
             table_edit =   $('#datatable_edit').DataTable({
                        processing: true,
                        serverSide: true,
                        stateSave: true,
                        "bDestroy": true,
                        ajax: {
                            url: "{{ URL::to('/') }}/ajax/"+res.kode_bangunan+"/estate",
                            dataType: 'json',
                            type: "GET",                    
                        },
                            columns: [
                                // {data: 'rownum', name: 'id', orderable: false},
                                // let name = 'ee'
                                {data:'keterangan', name : 'keterangan',orderable: false, searchable: true},
                                {data: 'category', name: 'category', orderable: false, searchable: true},
                                {data: 'action', name: 'action'},
                            ]
                }); 
            
        }

        });

        
         
                
        
    }


    </script>
@endpush

@extends('layouts.backend')

@section('title')
    List Estate
@endsection

@section('content')
    

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
        
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">EST / LIST</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
           
            @if ($message = Session::has('success'))
                @php 
                    alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.'); 
                @endphp
              
            @endif

            @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                @php 
                    alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.'); 
                @endphp
                <p>{{ $message }}</p>
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

            <div class="messages"></div>
            {{-- modal add --}}
            <div class="modal fade bd-example-modal-xl" id="env_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <form action="javascript:void(0)" id="estate_list_add" name="estate_list_add" method="POST" >                   
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="k_bangunan"><i class="fa fa-plus"></i> Add Factory List</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">                            
                            
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">CATEGORY<span class="text-danger">(*)</span></label>
                                    <input type="hidden" name="id" id="id"/>
                                    <select class="custom-select rounded-0" placeholder="" id="category" name="category">
                                        <option disable>-- Pilih -- </option>
                                        @foreach ($kategori as  $list)
                                            <option value="{{ $list->id }}">{{ $list->name }}</option>                        
                                        @endforeach
                                    </select>
                                    @error('category')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">LOT</label>
                                    {!! Form::text('lot', null, array('id'=> 'lot','placeholder' => 'LOT','class' => 'form-control')) !!}
                                    {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">                            
                            
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">NAME OF TENANT<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" placeholder="NAME" id="tenant" name="tenant">
                                        
                                    @error('tenant')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">OCCUPIED<span class="text-danger">(*)</span></label>
                                    <select class="custom-select rounded-0" placeholder="" id="occupied" name="occupied">
                                        <option disable>-- Pilih -- </option>   
                                        <option value="1">SALES</option>  
                                        <option value="2">RENTAL</option>  
                                        <option value="3">VACANT</option>  
                                        <option value="4">PT BIIE</option>  
                                                                    
                                    </select>
                                    @error('occupied')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                </div>
                            </div>
                            
                        </div>

                        

                        <div class="row">
                            

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">HANDOVER DATE</label>
                                    <input type="date" id="hod" name="hod" class="date-picker form-control rounded-0" data-date-format="dd/mm/yyyy" placeholder="Handover Date"/>
                                    @error('occupied')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">END OF LEASE</label>
                                    <input type="date" id="eol" name="eol" class="date-picker form-control rounded-0" data-date-format="dd/mm/yyyy" placeholder="End Of Lease"/>
                                    @error('occupied')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">LAND AREA<span class="text-danger"></span></label>
                                    <input type="text" class="form-control" placeholder="Exp(2300)" id="land_area" name="land_area">
                                        
                                    @error('land_area')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">. </label>
                                    <select class="custom-select rounded-0" placeholder="" id="satuan" name="satuan">
                                        <option disable>-- Pilih -- </option>   
                                        <option value="1">HA</option>  
                                        <option value="2">M2</option>  
                                                                    
                                    </select>
                                    @error('satuan')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="btn-save" class="btn btn-success" value="Submit" />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                    </form>
                </div>
            </div>
            
            {{-- content --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="card card-success card-tabs">
                                <div class="card-header p-0 pt-1">
                                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-one-est-tab" data-toggle="pill" href="#custom-tabs-one-est" role="tab" aria-controls="custom-tabs-one-est" aria-selected="false">
                                                <b>FACTORY </b>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-gmo-tab" data-toggle="pill" href="#custom-tabs-one-gmo" role="tab" aria-controls="custom-tabs-one-gmo" aria-selected="false">
                                                <b>DORMITORY </b>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-ims-tab" data-toggle="pill" href="#custom-tabs-one-ims" role="tab" aria-controls="custom-tabs-one-ims" aria-selected="false">
                                                <b>TOWN CENTER </b>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-meter-tab" data-toggle="pill" href="#custom-tabs-one-meter" role="tab" aria-controls="custom-tabs-one-meter" aria-selected="false">
                                                <b>METEREADING</b>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    {{-- estate --}}
                                    <div class="tab-pane fade active show"  id="custom-tabs-one-est" role="tabpanel" aria-labelledby="custom-tabs-one-est-tab">
                                        
                                        <button class="btn btn-success btn-md pull-left mb-2" onclick="clearField()" data-toggle="modal" data-target="#env_add"><i class="fa fa-plus"></i> Add List</button>
                                        <table id="tbl_est" class="table table-hovered table-sm table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">TYPE</th>
                                                    <th scope="col">LOT</th>
                                                    <th scope="col">TENANT</th>
                                                    <th scope="col">STATUS VACANT</th>
                                                    <th scope="col">STATUS BUILDING</th>
                                                    <th scope="col">ACTION</th>
                                                    {{-- <th scope="col">END OF LEASE</th>
                                                    <th scope="col">BUILDING STATUS</th>
                                                    <th scope="col">LAND AREA</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                            
                                            </tbody>
                                        </table>
                                    </div>
            
            
                                    {{-- GMO --}}
                                    <div class="tab-pane fade" id="custom-tabs-one-gmo" role="tabpanel" aria-labelledby="custom-tabs-one-gmo-tab">
                                         Dormitory 
                                    </div>
                                    {{-- IMS --}}
                                    <div class="tab-pane fade" id="custom-tabs-one-ims" role="tabpanel" aria-labelledby="custom-tabs-one-ims-tab">
                                        Town Center
                                    </div>

                                    <div class="tab-pane fade" id="custom-tabs-one-meter" role="tabpanel" aria-labelledby="custom-tabs-one-mater-tab">
                                        Metereading
                                    </div>
                                    
                                </div>
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

    // header request token
    var SITEURL = '{{URL::to('')}}';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var table;


    // $('#table_est').DataTable();
    $(document).ready( function () {
        // $('#tbl_est').DataTable();

        table = $('#tbl_est').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('estate.list') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                {data: 'category', name: 'category', orderable: true, searchable: true},
                {data:'lot', name : 'name',orderable: true, searchable: true},
                {data:'name_tenant', name : 'name_tenant',orderable: true, searchable: false},
                {data:'status', name : 'status',orderable: true, searchable: true},
                {data: 'status_building', name: 'status_building'},
                {data: 'action', name: 'action'},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 
    });


    //Edit estate
    function editEstate(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/estate/list/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#env_add').modal('show');
            console.log(res.id);
            $('#id').val(res.id);
            $('#tenant').val(res.name_tenant);
            $('#category').val(res.id_factory_category);
            $('#lot').val(res.lot);
            $('#occupied').val(res.status_vacant);
            $('#hod').val(res.hod);
            $('#eol').val(res.eol);
            $('#land_area').val(res.land_area);
            $('#satuan').val(res.satuan);
            document.getElementById("sop_title").innerHTML = '<i class="fas fa-edit"></i> Edit Form';
            // $('#efile').attr('src', SITEURL +'public/file/'+res.cover);

            }
        });
    }

    //delete Estate
   function deleteFunc(id){
            if (confirm("Delete list ini?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/estate/list/delete/"+id,
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

    function clearField(){
        $('#id').val('');
        $('#tenant').val('');
        $('#category').prop('selectedIndex', 0);
        $('#lot').val('');
        $('#occupied').prop('selectedIndex', 0);;
        $('#hod').val('');
        $('#eol').val('');
        $('#land_area').val('');
        $('#satuan').prop('selectedIndex', 0);;
    }

    $('#estate_list_add').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('estate.list.add')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            if(data.success == 1){
                $("#env_add").modal('hide');
                table.ajax.reload();
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
    })
    });


    
</script>

@endpush

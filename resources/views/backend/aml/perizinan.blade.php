@extends('layouts.master')

@push('plugin-styles')
    {!! Html::style('assets/css/ui-elements/breadcrumbs.css') !!}
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('assets/css/basic-ui/tabs.css') !!}
@endpush

@section('content')
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
                                <li class="breadcrumb-item " aria-current="page">AML</li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0);">{{__('Contract & Permit')}}</a></li>
                                
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    

   {{-- modal contract employee --}}
   <div class="modal fade bd-example-modal-xl" id="contract_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="contract_form_add" name="contract_form_add" method="POST" enctype="multipart/form-data" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block" id="no_emp">
                    <i class="fa fa-plus"></i> 
                    Add Contract</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">CONTRACT NUMBER<span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id" id="id"/>
                            <input type="hidden" name="doc" id="doc"/>
                            <input type="text" name="contract_number" id="contract_number" class=" rounded-1 form-control" placeholder="Contract Number"/>
                            @error('contract_number')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">CONTRACT TYPE<span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control rounded-1" placeholder="Contract Type" id="type_contract" name="type_contract">
                            {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                            @error('type_contract')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DESCRIPTION </label>
                            <input type="text" class="rounded-1 form-control" placeholder="Description" id="description" name="description">
                            {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                            @error('description')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">PARTNER </label>
                            <input type="text" class="rounded-1 form-control" placeholder="Partner" id="mitra" name="mitra">
                        </div>
                    </div>   

                    <div class="col-xs-5 col-sm-5 col-md-5 ">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">BUSSINESS OWNER</label>
                            <input type="text" class="rounded-1 form-control" placeholder="Bussiness Owner" id="bussiness_owner" name="bussiness_owner">
                        </div>
                    </div>
                    
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">ISSUED DATE</label>
                            <input type="date" class="rounded-1 form-control" placeholder="Issued Date" id="publication_date" name="publication_date">
                        </div>
                    </div>
                    

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DOCUMENT</label>
                            <input type="file" class="rounded-1 form-control" placeholder="Service" id="document" name="document">
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">START DATE</label>
                            <input type="date" class="date-picker rounded-1 form-control" placeholder="Start Date" id="start_date" name="start_date">
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">END DATE</label>
                            <input type="date" class="date-picker rounded-1 form-control" placeholder="End Date" id="end_date" name="end_date">
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">RENEWAL DATE</label>
                            <input type="date" class="date-picker rounded-1 form-control" placeholder="Renewal Date" id="renewal_date" name="renewal_date">
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" id="btn-save-contract" class="btn btn-primary" value="Submit" />
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
            </div>
            </form>
        </div>
    </div>


    {{-- modal permit --}}
   <div class="modal fade bd-example-modal-xl" id="permit_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="javascript:void(0)" id="form_permit_add" name="form_permit_add" method="POST" enctype="multipart/form-data" >                   
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title block text-primary" id="no_emp">
                <i class="las la-file-contract"></i>
                Add Permit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
            <div class="row">                            

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">NAME<span class="text-danger">(*)</span></label>
                        <input type="hidden" name="id_permit" id="id_permit"/>
                        <input type="hidden" name="doc_permit" id="doc_permit"/>
                        <input type="text" name="name" id="name" class=" rounded-1 form-control" placeholder="Name"/>
                        @error('name')
                                <span class="text-danger text-sm">{{ $message }}</span>                              
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">CONTRACT TYPE<span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control rounded-1" placeholder="Contract Type" id="type_contract" name="type_contract">
                        {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                        @error('type_contract')
                                <span class="text-danger text-sm">{{ $message }}</span>                              
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">PERMIT OWNER </label>
                        <select class="custom-select rounded-1" placeholder="" id="id_permit_owner" name="id_permit_owner" required>
                            <option disable>-- Select -- </option>
                            @foreach ($permit_owner as $list)
                            <option value="{{ $list->id }}"> {{ $list->name }} </option>
                            @endforeach
                            
                        </select>
                        {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                        @error('id_permit_owner')
                                <span class="text-danger text-sm">{{ $message }}</span>                              
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">PERMIT TYPE </label>
                        <select class="custom-select rounded-1" placeholder="" id="id_permit_type" name="id_permit_type" required>
                            <option disable>-- Select -- </option>
                        </select>''
                        {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                        @error('id_permit_type')
                                <span class="text-danger text-sm">{{ $message }}</span>                              
                        @enderror
                    </div>
                </div>   

                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">START DATE</label>
                        <input type="date" class="date-picker rounded-1 form-control" placeholder="Start Date" id="start_date_permit" name="start_date_permit">
                    </div>
                </div>

                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">END DATE</label>
                        <input type="date" class="date-picker rounded-1 form-control" placeholder="End Date" id="end_date_permit" name="end_date_permit">
                    </div>
                </div>

                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">ISSUED DATE</label>
                        <input type="date" class="rounded-1 form-control" placeholder="Issued Date" id="issued_date_permit" name="issued_date_permit">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 ">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">DESCRIPTION</label>
                        <textarea class="form-control" rows="2" id="description_permit" name="description_permit" placeholder="Description . . ." ></textarea>
                        
                    </div>
                </div>
                

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName" class="form-label">DOCUMENT</label>
                        <input type="file" class="rounded-1 form-control" placeholder="Service" id="document_permit" name="document_permit">
                    </div>
                </div>               

            </div>

        </div>
        <div class="modal-footer">
            <input type="submit" id="btn-save-contract" class="btn btn-primary" value="Submit" />
            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
        </div>
        </div>
        </form>
    </div>
</div>


    <!-- Main Body Starts -->
    <div class="">
        <div class="layout-top-spacing">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing date-table-container">
                            <!-- Datatable with a dropdown -->
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                                <div class="widget-content widget-content-area br-6">
                                    <ul class="nav nav-tabs mb-2 mt-2" id="normaltab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>{{__('Contract')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="permit-tab" data-toggle="tab" href="#permit" role="tab" aria-controls="about" aria-selected="false"><b> {{__('Permit')}}</b></a>
                                        </li>
                                       
                                    </ul>

                                    <div class="tab-content" id="normaltabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            {{-- content tenant --}}
                                            <div class="table-responsive mb-4">

                                                <button class="btn btn-primary btn-sm pull-left mb-2" onclick="clearField()" data-toggle="modal" data-target="#contract_add"><i class="las la-plus"></i> Add Contract</button>
                                    
                                    

                                                <table id="table_halal" class="table table-hovered table-sm" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="width: 15px;">No</th>
                                                            <th scope="col">Contract Number</th>
                                                            <th scope="col">Contract Type</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Mitra</th>
                                                            <th scope="col">End Date</th>
                                                            <th class="no-content"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="permit" role="tabpanel" aria-labelledby="permit-tab">
                                            {{-- content man import --}}
                                            <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#permit_add">
                                                <i class="las la-plus sidemenu-right-icon"></i>Add Permit
                                            </button>

                                            <table id="table_permit" class="table table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>{{__('No')}}</th>
                                                    <th>{{__('Name')}}</th>
                                                    <th>{{__('Permit Owner')}}</th>
                                                    <th>{{__('Permit Type')}}</th>
                                                    <th>{{__('Issued Date')}}</th>
                                                    <th>{{__('End Date')}}</th>
                                                    <th>{{__('Document')}}</th>
                                                    <th class="no-content"></th>
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

@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/table/datatable/datatables.js') !!}
    
@endpush

@push('custom-scripts')

<script>

var table_halal, table_permit;
 // header request token
 var SITEURL = '{{URL::to('')}}';
        var table_contract;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        // table recruitment
        table_halal = $('#table_halal').DataTable({
            "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('aml.perizinan') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'no_perjanjian', name : 'no_perjanjian',orderable: true, searchable: true},
                {data: 'type_perjanjian', name: 'type_perjanjian', orderable: true, searchable: true},    
                {data: 'deskripsi', name: 'deskripsi', orderable: true, searchable: true},  
                {data: 'mitra', name: 'mitra', orderable: true, searchable: true},  
                {data: 'tgl_berakhir', name: 'tgl_berakhir', orderable: true, searchable: true},  
                {data: 'action', name: 'action'},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 

        // permit
        // table recruitment
        table_permit = $('#table_permit').DataTable({
            "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('aml.permit') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'name', name : 'name',orderable: true, searchable: true},
                {data: 'owner_name', name: 'owner_name', orderable: true, searchable: true},    
                {data: 'type_name', name: 'type_name', orderable: true, searchable: true},  
                {data: 'issued_date', name: 'issued_date', orderable: true, searchable: true},                  
                {data: 'end_date', name: 'end_date', orderable: true, searchable: true},  
                {data: 'download', name: 'download', orderable: true, searchable: true},  
                {data: 'action', name: 'action'},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 

        // contratct add
        $('#contract_form_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('aml.perizinan.add')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `Data succesfully!`,
                    showConfirmButton: false,
                    timer: 3000
                });
            if(data.success == 1){
                $("#contract_add").modal('hide');
                table_halal.ajax.reload();
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })

        
    });

    // contratct add
    $('#form_permit_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('aml.permit.add')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `Data succesfully!`,
                    showConfirmButton: false,
                    timer: 3000
                });
            if(data.success == 1){
                $("#permit_add").modal('hide');
                table_permit.ajax.reload();
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })

        
    });


    //dropdown category and sub category
    $('#id_permit_owner').change(function(){
            var idDept = $(this).val();    
            if(idDept){
                $.ajax({
                type:"GET",
                url:"permit_owner/"+idDept,
                dataType: 'JSON',
                success:function(res){               
                    if(res){
                        $("#id_permit_type").empty();
                        $("#id_permit_type").append('<option>--Select--</option>');
                        $.each(res,function(name,id){
                            $("#id_permit_type").append('<option value="'+id+'">'+name+'</option>');
                        });
                    }else{
                    $("#id_permit_type").empty();
                    }
                }
                });
            }else{
                $("#id_permit_type").empty();
            }      
        });


    //Edit contract
    function editIzin(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/aml/perizinan/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#contract_add').modal('show');
            $('#id').val(res.id);
            $('#type_contract').val(res.type_perjanjian);
            $('#contract_number').val(res.no_perjanjian);
            $('#description').val(res.deskripsi);
            $('#mitra').val(res.mitra);
            $('#service').val(res.jasa);
            $('#start_date').val(res.tgl_mulai);
            $('#end_date').val(res.tgl_berakhir);
            $('#renewal_date').val(res.tgl_perpanjang);
            $('#publication_date').val(res.tgl_penerbitan);
            $('#doc').val(res.document);

            }
        });
    }

    //delete halal
   function deleteIzin(id){
            if (confirm("Delete Document ini?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/aml/perizinan/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table_halal.ajax.reload();
                    }
                });
            }
    }


    //Edit contract
    function editPermit(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/aml/permit/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#permit_add').modal('show');
            $('#doc_permit').val(res.document);
            $('#id_permit').val(res.id);
            $('#name').val(res.name);
            $('#type_contract').val(res.type_contract);
            
            $('#description_permit').val(res.description);
            $('#issued_date_permit').val(res.issued_date);
            $('#start_date_permit').val(res.start_date);
            $('#end_date_permit').val(res.end_date);

            $('#id_permit_owner').val(res.permit_owner).change();
                setTimeout(function() { 
                    $('#id_permit_type').val(res.permit_type).change();
                }, 500);

            }
        });
    }

    //delete halal
   function deletePermit(id){
            if (confirm("Delete Document ini?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/aml/perizinan/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table_halal.ajax.reload();
                    }
                });
            }
    }

    function clearField(){
        $('#id').val('');
            $('#doc').val('');
            $('#contract_number').val('');
            $('#type_contract ').val('');
            $('#description').val('');
            $('#mitra').val('');
            $('#bussiness_owner ').val('');
            $('#start_date').val('');
            $('#end_date').val('');
            $('#renewal_date').val('');
            $('#publication_date').val(''); 
            $('#document').val(''); 

    }
</script>
@endpush

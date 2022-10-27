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
                                            <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><b> {{__('Permit')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="export-tab" data-toggle="tab" href="#export" role="tab" aria-controls="export" aria-selected="false"><b> {{__('Contract Employee')}}</b></a>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="normaltabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            {{-- content tenant --}}
                                            <div class="table-responsive mb-4">

                                                <button class="btn btn-primary btn-md pull-left mb-2" onclick="clearField()" data-toggle="modal" data-target="#contract_add"><i class="las la-plus"></i> Add Contract</button>
                                    
                                    

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
                                        <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                                            {{-- content man import --}}
                                            <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#import_add">
                                                <i class="las la-plus sidemenu-right-icon"></i>Add List
                                            </button>

                                            <table id="table_import" class="table table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>{{__('No')}}</th>
                                                    <th>{{__('Container 20 & 40')}}</th>
                                                    <th>{{__('Tonnage in Loose')}}</th>
                                                    <th>{{__('Tonnage Cargo')}}</th>
                                                    <th>{{__('Total of Teus')}}</th>
                                                    <th>{{__('Total No of Package')}}</th>
                                                    <th>{{__('Total')}}</th>
                                                    <th class="no-content"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                
                                                </tbody>
                                                
                                            </table>
                                        </div>

                                        <div class="tab-pane fade" id="export" role="tabpanel" aria-labelledby="export-tab">
                                            {{-- content man import --}}
                                            <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#export_add">
                                                <i class="las la-plus sidemenu-right-icon"></i>Add List
                                            </button>
                                            <table id="table_export" class="table table-hover text-center" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>{{__('No')}}</th>
                                                    <th>{{__('Container 20 & 40')}}</th>
                                                    <th>{{__('Tonnage in Loose')}}</th>
                                                    <th>{{__('Tonnage Cargo')}}</th>
                                                    <th>{{__('Total of Teus')}}</th>
                                                    <th>{{__('Total No of Package')}}</th>
                                                    <th>{{__('Total')}}</th>
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

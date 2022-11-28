@extends('layouts.master')

@push('plugin-styles')
    {!! Html::style('assets/css/ui-elements/breadcrumbs.css') !!}
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('FIN')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Procurement')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->

    {{-- Modal add Procurement--}}
    <div class="modal fade bd-example-modal-xl" id="pro_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_pro_add" name="form_pro_add" method="POST" enctype="multipart/form-data" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="fa fa-plus"></i> 
                    Procurement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NO PR<span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id" id="id"/>
                            <input type="hidden" name="doc" id="doc"/>
                            {!! Form::text('no_pr', null, array('id'=> 'no_pr','placeholder' => 'No PR','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('no_pr')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NO PO<span class="text-danger">(*)</span></label>
                            {!! Form::text('no_po', null, array('id'=> 'no_po','placeholder' => 'No PO','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('no_po')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NO DO<span class="text-danger">(*)</span></label>
                           
                            {!! Form::text('no_do', null, array('id'=> 'no_do','placeholder' => 'No DO','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('no_do')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">CATEGORY</label>
                            <select class="custom-select rounded-1" placeholder="" id="category" name="category" required>
                                <option disable>-- Select -- </option>
                                <option value="operational"> Operational </option>
                                <option value="capex"> Capex </option>
                            </select>
                            @error('hirarki_doc')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">STATUS</label>
                            <select class="custom-select rounded-1" placeholder="" id="status" name="status" required>
                                <option disable>-- Select -- </option>
                                <option value="done"> Done </option>
                                <option value="partial"> Partial </option>
                                <option value="cancel"> Cancel </option>
                            </select>
                            @error('hirarki_doc')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DEPARTMENT</label>
                            <select class="custom-select rounded-1" placeholder="" id="id_department" name="id_department" required>
                                <option disable>-- Select -- </option>
                                @foreach ($dept as $list)
                                    <option value="{{ $list->id }}"> {{ $list->name }} </option>
                                @endforeach
                            </select>
                            @error('id_department')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="row">
                    

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">INVOICE NO<span class="text-danger">(*)</span></label>
                            {!! Form::text('no_inv', null, array('id'=> 'no_inv','placeholder' => 'Invoice No','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('no_inv')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">UPLOAD FILE (pdf/image)</label>
                            <input type="file" name="document" id="document" class="form-control" placeholder="Remark" />
                            @error('status')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" id="btn-save-recruitment" class="btn btn-primary" value="Submit" />
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
            </div>
            </form>
        </div>
    </div>


    {{-- Modal add Lav--}}
    <div class="modal fade bd-example-modal-xl" id="lav_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_lav_add" name="form_lav_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="las la-desktop"></i>
                    LAV Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">VENDOR NO<span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_lav" id="id_lav"/>
                            {!! Form::text('vendor_no', null, array('id'=> 'vendor_no','placeholder' => 'Vendor No','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('no_vendor')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">VENDOR NAME<span class="text-danger">(*)</span></label>
                            
                            {!! Form::text('vendor_name', null, array('id'=> 'vendor_name','placeholder' => 'Vendor Name','class' => 'rounded-1 form-control')) !!}
                            @error('vendor_name')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">CONTACT PERSON </label>
                            
                            {!! Form::text('contact_person', null, array('id'=> 'contact_person','placeholder' => 'Contact Person','class' => 'rounded-1 form-control')) !!}
                            @error('contact_person')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Address </label>
                            
                            <textarea name="address" id="address" class="form-control" placeholder="Address" rows="3"></textarea>
                            @error('contact_person')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">CONTACT NUMBER</label>
                            {!! Form::text('contact_number', null, array('id'=> 'contact_number','placeholder' => 'Contact Number','class' => 'rounded-1 form-control')) !!}
                            
                            @error('contact_number')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">EMAIL</label>
                            {!! Form::text('email', null, array('id'=> 'email','placeholder' => 'Email','class' => 'rounded-1 form-control')) !!}
                            
                            @error('email')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" id="btn-save-recruitment" class="btn btn-primary" value="Submit" />
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
            </div>
            </form>
        </div>
    </div>

    <!-- Import Excel Lav-->
    <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('fin.import') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import CSV / Excel</h5>
                    </div>
                    <div class="modal-body">

                        {{ csrf_field() }}

                        <label>Pilih file CSV / excel</label>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="layout-top-spacing mb-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing date-table-container">
                            
                            @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                             </div>
                            @endif
                            
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                                <div class="widget-content widget-content-area br-12">
                                    <ul class="nav nav-tabs mb-2 mt-2" id="normaltab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>{{__('Procurement Record')}}</b></a>
                                        </li>
                                        @can('finlav-manage')
                                        <li class="nav-item">
                                            <a class="nav-link" id="lav-tab" data-toggle="tab" href="#lav" role="tab" aria-controls="lav" aria-selected="true"><b>{{__('LAV Status')}}</b></a>
                                        </li>
                                        @endcan
                                        
                                        
                                    </ul>

                                    <div class="tab-content" id="normaltabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            {{-- content tenant --}}
                                            <div class="table-responsive mb-4">
        
                                                @can('finpro-add')
                                                <button class="btn bg-gradient-success text-white btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#pro_add">
                                                    <i class="las la-plus sidemenu-right-icon"></i>Add PR
                                                </button>
                                                @endcan
                                               
                                                <table id="table_pro" class="table table-hover" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th style="width:20px;">{{__('No')}}</th>
                                                        <th>{{__('No PR')}}</th>
                                                        <th>{{__('No PO')}}</th>
                                                        <th>{{__('No DO')}}</th>
                                                        <th>{{__('No invoice')}}</th>
                                                        <th>{{__('Category')}}</th>
                                                        <th>{{__('Status')}}</th>
                                                        <th>{{__('Document')}}</th>
                                                        <th class="no-content"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                      

                                        <div class="tab-pane fade show" id="lav" role="tabpanel" aria-labelledby="lav-tab">
                                            <h5 class="text-primary mt-3">
                                                <i class="las la-desktop"></i>
                                                Approval Monitoring Status
                                            </h5>

                                            <a href="{{ route('fin.download.lav') }}" class="btn bg-gradient-warning text-white btn-sm mb-2 mt-2">
                                                <i class="la la-file-export sidemenu-right-icon"></i>Export
                                            </a>

                                            <button class="btn bg-gradient-primary text-white btn-sm mb-2 mt-2" data-toggle="modal" data-target="#import">
                                                <i class="la la-file-import sidemenu-right-icon"></i>Import
                                            </button>

                                            <button class="btn bg-gradient-success text-white btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#lav_add">
                                                <i class="las la-plus sidemenu-right-icon"></i>Add LAV
                                            </button>
                                            <table id="table_lav" class="table table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th style="width:20px;">{{__('No')}}</th>
                                                    <th>{{__('Vendor No')}}</th>
                                                    <th>{{__('Vendor Name')}}</th>
                                                    <th>{{__('Contact Person')}}</th>
                                                    <th>{{__('Contact Number')}}</th>
                                                    <th>{{__('Email')}}</th>
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
     var table_pro, table_lav;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready( function () {
        

        // table recruitment
        table_pro = $('#table_pro').DataTable({
            "language": {
                "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
                }
        },
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('fin.procurement') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data:'no_pr', name : 'no_pr',orderable: true, searchable: true},
                    {data: 'no_po', name: 'no_po', orderable: true, searchable: true},  
                    {data:'no_do', name : 'no_do',orderable: true, searchable: true},
                    {data: 'no_inv', name: 'no_inv', orderable: true, searchable: true},    
                    {data: 'category', name: 'category', orderable: true, searchable: true},  
                    {data: 'status', name: 'status', orderable: true, searchable: true}, 
                    {data: 'download', name: 'download', orderable: true, searchable: true},
                    {data: 'action', name: 'action'},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 

        table_lav = $('#table_lav').DataTable({
            "language": {
                "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
                }
            },
            processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('fin.lav') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data:'vendor_no', name : 'vendor_no',orderable: true, searchable: true},
                    {data: 'vendor_name', name: 'vendor_name', orderable: true, searchable: true},  
                    {data:'contact_person', name : 'contact_person',orderable: true, searchable: true},
                    {data: 'contact_number', name: 'contact_number', orderable: true, searchable: true},    
                    {data: 'email', name: 'email', orderable: true, searchable: true},  
                    {data: 'action', name: 'action'},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        });
        
        // procurement add
         $('#form_pro_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('fin.procurement.add')}}",
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
                $("#pro_add").modal('hide');
                table_pro.ajax.reload();
                
            }
            
        },
            error: function(data){
                    console.log(data);
                }
            })
        });
    });


    // LAV add
    $('#form_lav_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('fin.lav.add')}}",
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
                $("#lav_add").modal('hide');
                table_lav.ajax.reload();
                
            }
            
        },
            error: function(data){
                    console.log(data);
                }
            })
        });
  

     //Edit procurement fin
     function editPro(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/fin/procurement/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#pro_add').modal('show');
            $('#id').val(res.id);
            $('#no_pr').val(res.no_pr);
            $('#no_po').val(res.no_po);
            $('#no_do').val(res.no_do);
            $('#category').val(res.category);
            $('#status').val(res.status);
            $('#id_department').val(res.id_department);
            $('#no_inv').val(res.no_inv);
            $('#doc').val(res.document);

            }
        });
    }

    //delete procurement
   function deletePro(id){
            if (confirm("Delete Document ini?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/fin/procurement/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table_pro.ajax.reload();
                    }
                });
            }
    }

    //Edit lav
    function editLav(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/fin/lav/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#lav_add').modal('show');
            $('#id_lav').val(res.id);
            $('#vendor_no').val(res.vendor_no);
            $('#vendor_name').val(res.vendor_name);
            $('#contact_person').val(res.contact_person);
            $('#contact_number').val(res.contact_number);
            $('#email').val(res.email);
            $('#address').val(res.address);
            }
        });
    }

    //delete lave
   function deleteLav(id){
            if (confirm("Delete this record?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/fin/lav/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table_lav.ajax.reload();
                    }
                });
            }
    }

    function clearField(){
        $('#id').val('');
        $('#no_pr').val('');
        $('#no_po').val('');
        $('#no_do').val('');
        $('#category').prop('selectedIndex', 0);
        $('#status').prop('selectedIndex', 0);
        $('#id_department').prop('selectedIndex', 0);
        $('#inv_no').val('');
        $('#document').val('');

        $('#id_lav').val('');
        $('#vendor_no').val('');
        $('#vendor_name').val('');
        $('#contact_person').val('');
        $('#contact_number').val('');
        $('#email').val('');
        $('#address').val('');
    }
</script>
@endpush

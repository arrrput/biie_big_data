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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('IMS')}}</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Master Document')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Add Master Document')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->


    {{-- Modal add Master document --}}
    <div class="modal fade bd-example-modal-xl" id="master_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="master_doc_add" name="master_doc_add" method="POST" enctype="multipart/form-data" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="fa fa-plus"></i> 
                    Add Master Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NO DOCUMENT<span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id" id="id"/>
                            <input type="hidden" name="doc" id="doc"/>
                            <input type="hidden" name="doc_stamp" id="doc_stamp"/>
                            {!! Form::text('no_document', null, array('id'=> 'no_document','placeholder' => 'No Document','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('no_document')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TITLE <span class="text-danger">(*)</span> </label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title" />
                            @error('title')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">HIERARCHY DOC</label>
                            <select class="custom-select rounded-1" placeholder="" id="hirarki_doc" name="hirarki_doc" required>
                                <option disable>-- Select -- </option>
                                @foreach ($hirarki as $list)
                                    <option value="{{ $list->id }}">{{ $list->name }}</option>
                                @endforeach
                               
                            </select>
                            @error('hirarki_doc')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DEPARTMENT</label>
                            <select class="custom-select rounded-1" placeholder="" id="id_dept" name="id_dept" required>
                                <option disable>-- Select -- </option>
                                @foreach ($dept as $list)
                                    <option value="{{ $list->id }}">{{ $list->name }}</option>
                                @endforeach
                                
                               
                            </select>
                            @error('id_dept')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">UPLOAD FILE</label>
                            <input type="file" name="document" id="document" class="form-control" placeholder="Remark" />
                            @error('status')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">REMARK</label>
                            <textarea name="remark" id="remark" class="form-control" placeholder="Remark" ></textarea>
                            @error('remark')
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
                                        <h4 class="table-header"><i class="lab la-medapps text-success"></i> {{__('Integrated Management System')}}</h4>
                                        <div class="table-responsive mb-4">
                                            <hr>
                                            <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#master_add">
                                                <i class="las la-plus sidemenu-right-icon"></i>Add Request
                                            </button>
                                            <table id="table-master" class="table table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>{{__('No')}}</th>
                                                    <th>{{__('Document')}}</th>
                                                    <th>{{__('Title')}}</th>
                                                    <th>{{__('hierarchy doc')}}</th>
                                                    <th>{{__('Department')}}</th>
                                                    <th>{{__('Download')}}</th>
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

    var SITEURL = '{{URL::to('')}}';

    var table_master, table_manpower;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(document).ready(function() {

        // table tenant
        table_master = $('#table-master').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        
        ajax: {
            
            url: "{{ route('ims.master_doc') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'no_document', name : 'no_document',orderable: true, searchable: true},
                {data: 'title', name: 'title', orderable: true, searchable: true},
                {data: 'hirarki', name: 'hirarki', orderable: true, searchable: true},  
                {data: 'department', name: 'department', orderable: true, searchable: true},            
                {data:'download', name : 'download',orderable: true, searchable: false},
                {data:'action', name : 'action',orderable: true, searchable: false},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 



        // table manpower
        table_manpower = $('#table_manpower').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        
        ajax: {
            
            url: "{{ route('crs.list_manpower') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'total_tenant', name : 'total_tenant',orderable: true, searchable: true},
                {data: 'total_employee', name: 'total_employee', orderable: true, searchable: true},  
                {data: 'total_foreign_worker', name: 'total_foreign_worker', orderable: true, searchable: true}, 
                {data:'action', name : 'action',orderable: true, searchable: false},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 
          
    });

    $('#master_doc_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('ims.master_doc.add')}}",
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
                $("#master_add").modal('hide');
                table_master.ajax.reload();
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })
    });

    $('#man_power_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('crs.manpower.add')}}",
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
                $("#manpower_add").modal('hide');
                table_manpower.ajax.reload();
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })
    });

    function clearField(){
        $('#id').val('');
        $('#doc').val('');
        $('#doc_stamp').val('');
        $('#no_document').val('');
        $('#title').val('');
        $('#hirarki_doc').prop('selectedIndex', 0);
        $('#id_dept').prop('selectedIndex', 0);
        $('#document').val('');
        
    }

    //Edit Tenant
    function editMaster(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/ims/master-doc/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#master_add').modal('show');
            $('#id').val(res.id);
            $('#no_document').val(res.no_document);
            $('#title').val(res.title);
            $('#hirarki_doc').val(res.hirarki_doc);
            $('#id_dept').val(res.id_dept);
            $('#doc').val(res.document);
            $('#doc_stamp').val(res.stamp);

            }
        });
    }

    //delete tenant
   function deleteMaster(id){
            if (confirm("Delete this request?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/ims/master-doc/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table_master.ajax.reload();
                    }
                });
            }
    }

    
</script>
@endpush

@extends('layouts.master')

@push('plugin-styles')
    {!! Html::style('assets/css/ui-elements/breadcrumbs.css') !!}
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('assets/css/forms/form-widgets.css') !!}
    {!! Html::style('assets/css/forms/checkbox-theme.css') !!}
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
                                <li class="breadcrumb-item" aria-current="page"><span>{{__('IT & Media')}}</span></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Form IT Request')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->

   
     {{-- Modal add Proposal--}}
     <div class="modal fade bd-example-modal-xl" id="it_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_it_add" name="form_it_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="las la-plus"></i> 
                    Add Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">JENIS DUKUNGAN <span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id" id="id"/>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <select class="custom-select rounded-1" placeholder="" id="type_request" name="type_request" required>
                                        <option disable>-- Select -- </option>
                                        <option value="1">IT</option>
                                        <option value="2">MEDIA</option>
                                    </select>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <select class="custom-select rounded-1" placeholder="" id="jenis_dukungan" name="jenis_dukungan" required>
                                        <option disable>-- Select -- </option>
                                        <option value="PERMINTAAN">PERMINTAAN</option>
                                        <option value="PERBAIKAN">PERBAIKAN</option>
                                        <option value="PENGEMBALIAN">PENGEMBALIAN</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">                            
                            <div class="checkbox-list ml-3">
                                <label class="checkbox-success">
                                    <input type="checkbox" name="email_req" id="email_req" value="1" onclick="showEmail()" value="1"/>
                                    <span></span>{{__(' Email, Sebutkan Alamat email')}}

                                   
                                </label>

                                <label class="checkbox-success">
                                    <input type="checkbox" name="user_req" id="user_req" value="1" onclick="showUser()"/>
                                    <span></span>{{__(' Username komputer, Nama user sebutkan')}}
                                </label>

                                <label class="checkbox-success">
                                    <input type="checkbox" name="internet_req" id="internet_req" value="1"/>
                                    <span></span>{{__(' Akses Internet / Jaringan')}}
                                </label>

                                <label class="checkbox-success">
                                    <input type="checkbox" name="backup_req" id="backup_req" value="1"/>
                                    <span></span>{{__(' Backup Data (Seminggu sekali)')}}
                                </label>

                                <label class="checkbox-success">
                                    <input type="checkbox" name="download_req" id="download_req" value="1" onclick="showDownload()"/>
                                    <span></span>{{__(' Download/Install Aplikasi, Sebutkan aplikasinya')}}
                                </label>

                                <label class="checkbox-success">
                                    <input type="checkbox" name="perangkat_komputer_req" id="perangkat_komputer_req" value="1" onclick="showPerangkat()"/>
                                    <span></span>{{__(' Perangkat komputer, sebutkan')}}
                                </label>

                                <label class="checkbox-success">
                                    <input type="checkbox" name="desain_req" id="desain_req" value="1"/>
                                    <span></span>{{__(' Desain / Dokumentasi')}}
                                </label>
                            </div>
                            
                        </div>
                    </div>


                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group" style="display: none;" id="show_email">
                            <div class="input-group" >
                                <input type="text" id="email_desc" name="email_desc" class="form-control" placeholder="{{__('Email')}}" aria-describedby="basic-addon2" >
                                <div class="input-group-append">
                                    <span class="input-group-text">{{__('@biie.co.id')}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="display: none;" id="show_username">
                            <input type="text" name="username_desc" id="username_desc" class="form-control" placeholder="Username Komputer" />
                        </div>

                        <div class="form-group" style="display: none;" id="show_download">
                            <input type="text" name="download_desc" id="download_desc" class="form-control" placeholder="Sebutkan nama aplikasi" />
                        </div>

                        <div class="form-group" style="display: none;" id="show_perangkat">
                            <input type="text" name="download_perangkat" id="download_perangkat" class="form-control" placeholder="Sebutkan perangkat" />
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DESKRIPSI<span class="text-danger">(*)</span></label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" cols="4" placeholder="Deskripsi permintaan/ perbaikan/ pengembalian" required></textarea>
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
                                <div class="widget-content widget-content-area br-6">
                                    <h4 class="table-header text-primary">
                                        <i class="las la-desktop "></i> 
                                        {{__('Form IT & Media')}}
                                    </h4>
                                    <div class="table-responsive mb-4">

                                        <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#it_add">
                                            <i class="las la-plus sidemenu-right-icon"></i>Add Request
                                        </button>  

                                        <table id="table_proposal" class="table table-hovered table-sm table-striped" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 15px;">No</th>
                                                    <th scope="col">Jenis Dukkungan</th>
                                                    <th scope="col">Deskripsi</th>    
                                                    <th scope="col">Verify Request</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Date</th>
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
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/table/datatable/datatables.js') !!}
    {!! Html::script('plugins/typehead/typeahead.bundle.js') !!}
@endpush

@push('custom-scripts')
<script>

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    // table recruitment
    var table_pro, table_act;

    table_pro = $('#table_proposal').DataTable({
            "language": {
                "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
                }
        },
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('gmo.it_request') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data:'type', name : 'type',orderable: true, searchable: true},
                    {data: 'deskripsi', name: 'deskripsi', orderable: true, searchable: true},  
                    {data:'verify', name : 'verify',orderable: true, searchable: true},
                    {data:'status', name : 'status',orderable: true, searchable: true},
                    {data:'date', name : 'date',orderable: true, searchable: true},
                    {data: 'action', name: 'action'},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 

        table_act = $('#table_act').DataTable({
            "language": {
                "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
                }
        },
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('cdd.activity') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data:'activity', name : 'activity',orderable: true, searchable: true},
                    {data: 'pic', name: 'pic', orderable: true, searchable: true},  
                    {data:'date', name : 'date',orderable: true, searchable: true},
                    {data:'budget', name : 'budget',orderable: true, searchable: true},
                    {data:'remark', name : 'remark',orderable: true, searchable: true},
                    {data: 'action', name: 'action'},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 


        $('#form_it_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('gmo.it_request.add')}}",
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
                $("#it_add").modal('hide');
                table_pro.ajax.reload();
                
            }
            
        },
            error: function(data){
                    console.log(data);
                }
            })
        });


       

function showEmail(){
  var checkBox = document.getElementById("email_req");
  var text = document.getElementById("show_email");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}

function showUser(){
  var checkBox = document.getElementById("user_req");
  var text = document.getElementById("show_username");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}

function showDownload(){
  var checkBox = document.getElementById("download_req");
  var text = document.getElementById("show_download");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}

function showPerangkat(){
  var checkBox = document.getElementById("perangkat_komputer_req");
  var text = document.getElementById("show_perangkat");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}


//Edit procurement fin
function editReq(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/gmo/it_request/show/"+id,
        dataType: 'json',
        success: function(res){
                $('#it_add').modal('show');
                $('#id').val(res.id);
                $('#type_request').val(res.type_request);
                $('#jenis_dukungan').val(res.jenis_dukungan);

                $('#email_desc').val(res.email_desc);
                $('#username_desc').val(res.username_desc);
                $('#download_desc').val(res.download_desc);
                $('#download_perangkat').val(res.download_perangkat);
                $('#deskripsi').val(res.deskripsi);

                if(res.email_req == 1){
                    document.getElementById("email_req").checked = true;
                    document.getElementById("show_email").style.display = "block";
                }
                if(res.user_req == 1){
                    document.getElementById("user_req").checked = true;
                }
                if(res.internet_req == 1){
                    document.getElementById("internet_req").checked = true;
                }
                if(res.backup_req == 1){
                    document.getElementById("backup_req").checked = true;
                }
                if(res.download_req == 1){
                    document.getElementById("download_req").checked = true;
                }
                if(res.perangkat_komputer_req == 1){
                    document.getElementById("perangkat_komputer_req").checked = true;
                }
                if(res.desain_req == 1){
                    document.getElementById("desain_req").checked = true;
                }
                
            }
        });
}

    //delete tenant
   function deleteReq(id){
            if (confirm("Delete this request?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/gmo/it_request/delete/"+id,
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


    function clearField(){      
        document.getElementById("show_email").style.display = "none";
        document.getElementById("show_username").style.display = "none";
        document.getElementById("show_download").style.display = "none";
        document.getElementById("show_perangkat").style.display = "none";
        $('#id').val('');
        $('#email_desc').val('');
        $('#username_desc').val('');
        $('#download_desc').val('');
        $('#download_perangkat').val('');
        $('#deskripsi').val('');
        $('#type_request').prop('selectedIndex', 0);
        $('#jenis_dukungan').prop('selectedIndex', 0);

        document.getElementById("email_req").checked = false;
        document.getElementById("user_req").checked = false;
        document.getElementById("internet_req").checked = false;
        document.getElementById("backup_req").checked = false;
        document.getElementById("download_req").checked = false;
        document.getElementById("perangkat_komputer_req").checked = false;
        document.getElementById("desain_req").checked = false;

        

    }


    



  

</script>
@endpush

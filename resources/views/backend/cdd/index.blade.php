@extends('layouts.master')

@push('plugin-styles')
    {!! Html::style('assets/css/ui-elements/breadcrumbs.css') !!}
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('assets/css/forms/form-widgets.css') !!}
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
                                
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('CDD')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->

   
     {{-- Modal add Proposal--}}
     <div class="modal fade bd-example-modal-xl" id="pro_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_pro_add" name="form_pro_add" method="POST" enctype="multipart/form-data" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="fa fa-plus"></i> 
                    Proposal Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">INSTITUTION NAME<span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id" id="id"/>
                            {!! Form::text('name', null, array('id'=> 'name','placeholder' => 'Institution Name','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('name')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">PIC<span class="text-danger">(*)</span></label>
                            {!! Form::text('pic', null, array('id'=> 'pic','placeholder' => 'PIC','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('pic')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DONATION<span class="text-danger">(*)</span></label>
                           
                            {!! Form::number('donation', null, array('id'=> 'donation','placeholder' => 'Donation','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('no_do')
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
   

     {{-- Modal add Activity--}}
     <div class="modal fade bd-example-modal-xl" id="act_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_act_add" name="form_act_add" method="POST" enctype="multipart/form-data" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="fa fa-plus"></i> 
                    CDD Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">ACTIVITY<span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_act" id="id_act"/>
                            {!! Form::text('activity', null, array('id'=> 'activity','placeholder' => 'Activity','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('name')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">PIC<span class="text-danger">(*)</span></label>
                            {!! Form::text('pic_act', null, array('id'=> 'pic_act','placeholder' => 'PIC','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('pic_act')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DATE<span class="text-danger">(*)</span></label>
                           
                            {!! Form::date('date', null, array('id'=> 'date','placeholder' => 'Date','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('date')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">BUDGET<span class="text-danger">(*)</span></label>
                           
                            {!! Form::number('budget', null, array('id'=> 'budget','row'=>'2', 'placeholder' => 'Budget','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('budget')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">REMARK<span class="text-danger">(*)</span></label>
                           
                            <textarea id="remark" name="remark" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
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
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>{{__('Proposal Status')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><b> {{__('Activity Record')}}</b></a>
                                        </li>                                      
                                        
                                    </ul>

                                    <div class="tab-content" id="normaltabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            {{-- content tenant --}}
                                            <div class="table-responsive mb-4">
                                                @can('cdd proposal-add')
                                                <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#pro_add">
                                                    <i class="las la-plus sidemenu-right-icon"></i>Add Proposal
                                                </button>                                                    
                                                @endcan

                                                <table id="table_proposal" class="table table-hovered table-sm table-striped" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="width: 15px;">No</th>
                                                            <th scope="col">Institution Name</th>
                                                            <th scope="col">PIC</th>    
                                                            <th scope="col">Total Donation</th>
                                                            <th class="no-content"></th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                                            @can('cdd activity-add')
                                            <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#act_add">
                                                <i class="las la-plus sidemenu-right-icon"></i>Add Activity
                                            </button>
                                            @endcan
                                            
                                            <table id="table_act" class="table table-hovered table-sm table-striped" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="width: 15px;">No</th>
                                                            <th scope="col">Activity</th>
                                                            <th scope="col">Type</th>    
                                                            <th scope="col">date</th>
                                                            <th scope="col">Budget</th>
                                                            <th scope="col">Remark</th>
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
            
            url: "{{ route('cdd') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data:'name', name : 'name',orderable: true, searchable: true},
                    {data: 'pic', name: 'pic', orderable: true, searchable: true},  
                    {data:'donation', name : 'donation',orderable: true, searchable: true},
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


        $('#form_pro_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('cdd.proposal.add')}}",
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


        $('#form_act_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('cdd.activity.add')}}",
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
                $("#act_add").modal('hide');
                table_act.ajax.reload();
                
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
        url: "{{ URL::to('/') }}/cdd/proposal/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#pro_add').modal('show');
            $('#id').val(res.id);
            $('#name').val(res.name);
            $('#pic').val(res.pic);
            $('#donation').val(res.donation);

            }
        });
    }

    //delete tenant
   function deletePro(id){
            if (confirm("Delete this request?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/cdd/proposal/delete/"+id,
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
        $('#id').val('');
        $('#name').val('');
        $('#pic').val('');
        $('#donation').val('');

        $('#id_act').val('');
        $('#activity').val('');
        $('#pic_act').val('');
        $('#date').val('');
        $('#budget').val('');
        $('#remark').val('');

    }


    //edit activity
    function editAct(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/cdd/activity/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#act_add').modal('show');
            $('#id_act').val(res.id);
            $('#activity').val(res.activity);
            $('#pic_act').val(res.pic);
            $('#date').val(res.date);
            $('#budget').val(res.budget);
            $('#remark').val(res.remark);
            }
        });
    }



    //delete activity
   function deleteAct(id){
            if (confirm("Delete this activity?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/cdd/activity/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        
                        table_act.ajax.reload();
                    }
                });
            }
    }

</script>
@endpush

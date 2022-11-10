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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('BDV')}}</a></li>
                                <li class="breadcrumb-item active">{{__('Occupancy')}}</li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->

    {{-- Modal add Procurement--}}
    <div class="modal fade bd-example-modal-xl" id="occ_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_occ_add" name="form_occ_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="fa fa-plus"></i> 
                    Add Occupancy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">ROOM<span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id" id="id"/>
                            {!! Form::text('room', null, array('id'=> 'room','placeholder' => 'Room','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('room')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">COMPANY </label>
                            {!! Form::text('company', null, array('id'=> 'company','placeholder' => 'Company name','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('company')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">PERIOD </label>
                           
                            <select class="custom-select rounded-1" placeholder="" id="period" name="period" required>
                                <option disable>-- Select -- </option>
                                <option value="Daily">Daily</option>
                                <option value="Monthly">Monthly</option>
                                <option value="Year">Year</option>
                                <option value="Permanent">Permanent</option>
                            </select>
                            @error('period')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">GUEST</label>
                            {!! Form::text('guest', null, array('id'=> 'guest','placeholder' => 'Guest','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('guest')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">STATUS</label>
                            <select class="custom-select rounded-1" placeholder="" id="status" name="status" required>
                                <option disable>-- Select -- </option>
                                <option value="Occupied">Occupied</option>
                                <option value="Vacant">Vacant</option>
                            </select>
                            @error('status')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">CHECK IN / CHECK OUT</label>
                            <select class="custom-select rounded-1" placeholder="" id="cekin_cekout" name="cekin_cekout" required>
                                <option disable>-- Select -- </option>
                                <option value="Check In">Check In</option>
                                <option value="Check Out">Check Out</option>
                            </select>
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
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>{{__('Occupancy')}}</b></a>
                                        </li>
                                       
                                        
                                    </ul>

                                    <div class="tab-content" id="normaltabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            {{-- content tenant --}}
                                            <div class="table-responsive mb-4">
        
                                                <button class="btn bg-gradient-success text-white btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#occ_add">
                                                    <i class="las la-plus sidemenu-right-icon"></i>Add Guest
                                                </button>
                                               
                                                <table id="table_occ" class="table table-hover" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th style="width:20px;">{{__('No')}}</th>
                                                        <th>{{__('Room')}}</th>
                                                        <th>{{__('Period')}}</th>
                                                        <th>{{__('Status')}}</th>
                                                        <th>{{__('guest name')}}</th>
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
     var table_occ;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready( function () {
        

        // table recruitment
        table_occ = $('#table_occ').DataTable({
            "language": {
                "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
                }
        },
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('bdv') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data:'room', name : 'room',orderable: true, searchable: true},
                    {data: 'period', name: 'period', orderable: true, searchable: true},  
                    {data:'occupied', name : 'occupied',orderable: true, searchable: true},
                    {data: 'guest', name: 'guests', orderable: true, searchable: true},    
                    {data: 'action', name: 'action'},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 
        
         // halal add
         $('#form_occ_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('bdv.occcupancy.add')}}",
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
                $("#occ_add").modal('hide');
                table_occ.ajax.reload();
                
            }
            
        },
            error: function(data){
                    console.log(data);
                }
            })
        });
    });

     //Edit procurement fin
     function editOcc(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/bdv/occcupancy/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#occ_add').modal('show');
            $('#id').val(res.id);
            $('#room').val(res.room);
            $('#company').val(res.company);
            $('#status').val(res.occupied);
            $('#cekin_cekout').val(res.cekin_cekout);
            $('#guest').val(res.guest);
            $('#period').val(res.period);
            }
        });
    }

    //delete procurement
   function deleteOcc(id){
            if (confirm("Delete this record?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/bdv/occcupancy/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table_occ.ajax.reload();
                    }
                });
            }
    }

    function clearField(){
        $('#id').val('');
        $('#room').val('');
        $('#guest').val('');
        $('#company').val('');
        $('#period').prop('selectedIndex', 0);
        $('#cekin_cekout').prop('selectedIndex', 0);
        $('#status').prop('selectedIndex', 0);
    }
</script>
@endpush

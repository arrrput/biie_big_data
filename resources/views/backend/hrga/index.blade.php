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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('HR & GA')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('General Affair')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->

    {{-- modal add gasoline --}}
    <div class="modal fade bd-example-modal-xl" id="car_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_car_add" name="form_car_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="fa fa-plus"></i> 
                    Car Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NAME USER<span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_car" id="id_car"/>
                            {!! Form::text('name_user_car', null, array('id'=> 'name_user_car','placeholder' => 'Name of user','class' => 'rounded-1 form-control', 'required')) !!}
                           
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">CAR NAME/MERK <span class="text-danger">(*)</span> </label>
                            <input type="text" name="car_name" id="car_name" class="form-control" placeholder="Exm : Datsun/ Agya/ Etc" required />
                            @error('driver')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">VHICLE PLAT <span class="text-danger">(*)</span> </label>
                            <input type="text" name="plat_no" id="plat_no" class="form-control" placeholder="Plat No" required />
                           
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

    {{-- modal add gasoline --}}
    <div class="modal fade bd-example-modal-xl" id="gasoline_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_gasoline" name="form_gasoline" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="fa fa-plus"></i> 
                    Fuel Usage</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">MERK & PLAT NUMBER<span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id" id="id"/>
                            {!! Form::text('merk_plat', null, array('id'=> 'merk_plat','placeholder' => 'Merk & Plat Number','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('merk_plat')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DRIVER <span class="text-danger">(*)</span> </label>
                            <input type="text" name="driver" id="driver" class="form-control" placeholder="Driver Name" required />
                            @error('driver')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="row">
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">KM CAR<span class="text-danger">(*)</span></label>
                            
                            {!! Form::number('km', null, array('id'=> 'km','placeholder' => 'Kilometer Car','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('km')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DATE <span class="text-danger">(*)</span> </label>
                            <input type="date" name="date" id="date" class="date-picker form-control" placeholder="Date" required />
                            @error('date')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Price <span class="text-primary">(Rp.)</span> </label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="Price of fuel" required />
                            @error('date')
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

    {{-- modall add form --}}
    <div class="modal fade bd-example-modal-xl" id="dorm_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_dorm" name="form_dorm" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="fa fa-plus"></i> 
                    Dormitory Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">BLOCK<span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_dorm" id="id_dorm"/>
                            <input class="form-control typeahead" type="text" name="blok" id="blok" placeholder="{{__('Blok')}}">
                            @error('blok')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">UNIT <span class="text-danger">(*)</span> </label>
                            <input class="form-control unit" type="text" name="unit" id="unit" placeholder="{{__('Unit')}}">
                            @error('unit')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="row">
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NAME EMPLOYEE<span class="text-danger">(*)</span></label>
                            
                            {!! Form::text('name', null, array('id'=> 'name','placeholder' => 'Name Employee','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('name')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DEPARTMENT <span class="text-danger">(*)</span> </label>
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

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">ROOM NO <span class="text-danger">(*)</span> </label>
                            <input type="number" name="room_no" id="room_no" class="form-control" placeholder="Room" required />
                            @error('room_no')
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
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>{{__('Dormitory Status')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false"><b> {{__('Fuel Record')}}</b></a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" id="car-tab" data-toggle="tab" href="#car" role="tab" aria-controls="car" aria-selected="false"><b> {{__('Car Status')}}</b></a>
                                        </li>                                        
                                        
                                    </ul>

                                    <div class="tab-content" id="normaltabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            {{-- content tenant --}}
                                            <div class="table-responsive mb-4">
        
                                                <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#dorm_add">
                                                    <i class="las la-plus sidemenu-right-icon"></i>Add Dorm
                                                </button>
                                                <table id="table_dorm" class="table table-hovered table-sm table-striped" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="width: 15px;">No</th>
                                                            <th scope="col">Blok</th>
                                                            <th scope="col">Unit</th>    
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Dept</th>
                                                            <th scope="col">Room No</th>
                                                            <th class="no-content"></th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                                            <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#gasoline_add">
                                                <i class="las la-plus sidemenu-right-icon"></i>Add Fuel Usage
                                            </button>
                                            <table id="table_gs" class="table table-hovered table-sm table-striped" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="width: 15px;">No</th>
                                                        <th scope="col">Merk & Plate No</th>
                                                        <th scope="col">Driver</th>  
                                                        <th scope="col">Price Fuel</th>    
                                                        <th scope="col">KM Car</th>
                                                        <th scope="col">Date</th>
                                                        <th class="no-content"></th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                </tbody>
                                            </table> 
                                        </div>

                                        <div class="tab-pane fade" id="car" role="tabpanel" aria-labelledby="car-tab">
                                            <button class="btn btn-primary btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#car_add">
                                                <i class="las la-plus sidemenu-right-icon"></i>Add Car 
                                            </button>
                                            <table id="table_car" class="table table-hovered table-sm table-striped" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="width: 15px;">No</th>
                                                        <th scope="col">Name User</th>
                                                        <th scope="col">Car Name / Merk</th>  
                                                        <th scope="col">Vehicles Plate</th>
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

    var SITEURL = '{{URL::to('')}}';

    var table_gs, table_dorm, table_car;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready( function () {


        // table gas
        table_gs = $('#table_gs').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        
        ajax: {
            
            url: "{{ route('hrga.gasoline') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'merk_plat_no', name : 'merk_plat_no',orderable: true, searchable: true},
                {data: 'driver', name: 'driver', orderable: true, searchable: true},
                {data: 'price', name: 'price', orderable: true, searchable: true},
                {data: 'km', name: 'km', orderable: true, searchable: true},  
                {data: 'date', name: 'date', orderable: true, searchable: true},          
                {data:'action', name : 'action',orderable: true, searchable: false},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 

        table_dorm = $('#table_dorm').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        
        ajax: {
            
            url: "{{ route('hrga.dorm') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'blok', name : 'blok',orderable: true, searchable: true},
                {data: 'unit', name: 'unit', orderable: true, searchable: true},
                {data: 'name', name: 'name', orderable: true, searchable: true},  
                {data: 'department', name: 'department', orderable: true, searchable: true},  
                {data: 'room_no', name: 'room_no', orderable: true, searchable: true},           
                {data:'action', name : 'action',orderable: true, searchable: false},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 


        table_car = $('#table_car').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
        processing: true,
        serverSide: true,
        
        ajax: {
            
            url: "{{ route('hrga.car_status') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'name', name : 'name',orderable: true, searchable: true},
                {data: 'car_name', name: 'car_name', orderable: true, searchable: true},
                {data: 'plat_no', name: 'plat_no', orderable: true, searchable: true},          
                {data:'action', name : 'action',orderable: true, searchable: false},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 
        
        
    } );


    //Edit Gasoline
    function editGasoline(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/hrga/gasoline/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#gasoline_add').modal('show');
            $('#id').val(res.id);
            $('#merk_plat').val(res.merk_plat_no);
            $('#driver').val(res.driver);
            $('#km').val(res.km);
            $('#date').val(res.date);
            $('#price').val(res.price);
            }
        });
    }

    // gasoline add
    $('#form_gasoline').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('hrga.gasoline.add')}}",
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
                $("#gasoline_add").modal('hide');
                table_gs.ajax.reload();
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })
    });

    // dorm add
    $('#form_dorm').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('hrga.dorm.add')}}",
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
                $("#dorm_add").modal('hide');
                table_dorm.ajax.reload();
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })
    });

    // car status add
    // gasoline add
    $('#form_car_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('hrga.car_status.add')}}",
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
                $("#car_add").modal('hide');
                table_car.ajax.reload();
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })
    });

    //Edit Dorm
    function editDorm(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/hrga/dorm/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#dorm_add').modal('show');
            $('#id_dorm').val(res.id);
            $('#blok').val(res.blok);
            $('#unit').val(res.unit);
            $('#name').val(res.name);
            $('#id_dept').val(res.id_dept);
            $('#room_no').val(res.room_no);
            $('#remark').val(res.remark);
            }
        });
    }

    //Edit Dorm
    function editCar(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/hrga/car_status/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#car_add').modal('show');
            $('#id_car').val(res.id);
            $('#name_user_car').val(res.name);
            $('#car_name').val(res.car_name);
            $('#plat_no').val(res.plat_no);
            }
        });
    }

    //delete dorm
   function deleteDorm(id){
            if (confirm("Delete this request?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/hrga/dorm/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `Delete succesfully!`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        table_dorm.ajax.reload();
                    }
                });
            }
    }


    function clearField(){
        $('#id').val('');
        $('#merk_plat').val('');
        $('#driver').val('');
        $('#km').val('');
        $('#date').val('');     
        $('#id_dorm').val(''); 
        $('#blok').val(''); 
        $('#unit').val('');   
        $('#name').val(''); 
        $('#id_dept').val(''); 
        $('#room_no').val(''); 

        $('#id_car').val('');
            $('#name_user_car').val('');
            $('#car_name').val('');
            $('#plat_no').val('');
    }


    //delete gasoline
   function deleteGasoline(id){
            if (confirm("Delete this request?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/hrga/gasoline/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `Delete succesfully!`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        table_gs.ajax.reload();
                    }
                });
            }
    }

    // delete car status
    function deleteCar(id){
        if (confirm("Delete this item?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/hrga/car_status/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `Delete succesfully!`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        table_car.ajax.reload();
                    }
                });
            }
    }

    // typehead
    (function($) {
    "use strict";
    $(document).ready(function() {
    // Defining the local dataset
            var cars = ['BLOK 5 (Executive)', 'BLOK 34 (Worker)', 'BLOK 3 (SPV)', 'BLOK 40 (SSD)'];
    // Constructing the suggestion engine
            var cars = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                local: cars
            });
    // Initializing the typeahead
        $('.typeahead').typeahead({
                    hint: true,
                    highlight: true, /* Enable substring highlighting */
                    minLength: 1 /* Specify minimum characters required for showing suggestions */
                },
                {
                    name: 'cars',
                    source: cars
                });
        });
    })(jQuery);

    (function($) {
    "use strict";
    $(document).ready(function() {
    // Defining the local dataset
            var unit = ['UNIT 1', 'UNIT 2', 'UNIT 3', 'UNIT 4', 'UNIT 5', 'UNIT 6', 'UNIT 7','UNIT 8', 'UNIT 9', 'UNIT 10'];
    // Constructing the suggestion engine
            var unit = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                local: unit
            });
    // Initializing the typeahead
        $('.unit').typeahead({
                    hint: true,
                    highlight: true, /* Enable substring highlighting */
                    minLength: 1 /* Specify minimum characters required for showing suggestions */
                },
                {
                    name: 'unit',
                    source: unit
                });
        });
    })(jQuery);


</script>
@endpush

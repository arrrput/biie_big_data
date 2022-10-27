@extends('layouts.backend')

@section('title')
    Finance |
@endsection
@section('content')
    

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
        
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">FINANCE / LIST</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    {{-- Content --}}
    <section class="content">
        <div class="container-fluid">

             {{-- modal contract employee --}}
             <div class="modal fade bd-example-modal-xl" id="halal_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <form action="javascript:void(0)" id="halal_form_add" name="halal_form_add" method="POST" enctype="multipart/form-data" >                   
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title block" id="no_emp">
                            <i class="fa fa-plus"></i> 
                            Add Document</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">                            
        
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">TITLE<span class="text-danger">(*)</span></label>
                                    <input type="hidden" name="id" id="id"/>
                                    <input type="hidden" name="doc" id="doc"/>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="TITLE"/>
                                    @error('title')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">DOCUMENT <span class="text-danger">(*)</span></label>
                                    <input type="file" class="form-control-file" id="document" name="document">
                                    {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                                    @error('job_title')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">DUE DATE </label>
                                    <input type="date" class=" date-picker form-control" id="date" name="date">
                                    {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                                    @error('date')
                                            <span class="text-danger text-sm">{{ $message }}</span>                              
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName" class="form-label">REMINDER </label>
                                    <select class="custom-select rounded-0" placeholder="" id="reminder" name="reminder">
                                        <option disable>-- Select Here -- </option>
                                        <option value="7">1 Minggu</option>
                                        <option value="30">1 Bulan</option>
                                        <option value="90">3 Bulan</option>
                                        <option value="180">6 Bulan</option>
                                    </select>
                                </div>
                            </div>    
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="btn-save-contract" class="btn btn-success" value="Submit" />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                    </form>
                </div>
            </div>


            {{-- content --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-halal-tab" data-toggle="pill" href="#custom-tabs-one-halal" role="tab" aria-controls="custom-tabs-one-est" aria-selected="false">
                                        <b>Sertifikat
                                            @if ($n > 0)
                                            <span class="badge badge-danger">{{ $n }}</span> 
                                            @endif  
                                        </b>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-gmo-tab" data-toggle="pill" href="#custom-tabs-one-gmo" role="tab" aria-controls="custom-tabs-one-gmo" aria-selected="false">
                                        <b>CONTRACT EMPLOYEE </b>
                                    </a>
                                </li>    

                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-cash-tab" data-toggle="pill" href="#custom-tabs-one-cash" role="tab" aria-controls="custom-tabs-one-gmo" aria-selected="false">
                                        <b>MONITORING RECRUTMENT</b>
                                    </a>
                                </li>                           --}}
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                {{-- Inventory IT --}}
                                <div class="tab-pane fade active show"  id="custom-tabs-one-halal" role="tabpanel" aria-labelledby="custom-tabs-one-halal-tab">
                                    
                                    <button class="btn btn-success btn-md pull-left mb-2" onclick="clearField()" data-toggle="modal" data-target="#halal_add"><i class="fa fa-plus"></i> Add List</button>
                                    
                                    @if ($n > 0)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                        
                                        @php $key =0; @endphp
                                        <ul>
                                            @foreach ($list_date as $data)
                                                <li>
                                                    <strong>{{ $list_date[$key]['title'] }}</strong> - Document duedate {{ $list_date[$key]['due_date'] }}.
                                                </li>
                                                @php $key++; @endphp
                                            @endforeach 
                                        </ul>
                                      </div>
                                    @endif

                                    <table id="table_halal" class="table table-hovered table-sm table-striped" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 15px;">No</th>
                                                <th scope="col">NAME</th>
                                                <th scope="col">DUE DATE</th>
                                                <th scope="col" style="width: 150px;">DOCUMENT</th>
                                                <th scope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        
                                        </tbody>
                                    </table>
                                </div>
        
        
                                {{-- Contract Employee --}}
                                <div class="tab-pane fade" id="custom-tabs-one-gmo" role="tabpanel" aria-labelledby="custom-tabs-one-gmo-tab">
                                    <div class="row">
                                       
                                    </div>
                                </div>
                                
                                {{-- Cash Claim --}}
                                <div class="tab-pane fade" id="custom-tabs-one-cash" role="tabpanel" aria-labelledby="custom-tabs-one-cash-tab">
                                    <div class="row">
                                        
                                       
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

        var table_halal;

        // table recruitment
        table_halal = $('#table_halal').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('fin.halal') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data:'name', name : 'name',orderable: true, searchable: true},
                {data: 'due_date', name: 'due_date', orderable: true, searchable: true},    
                {data: 'download', name: 'download', orderable: true, searchable: true},  
                {data: 'action', name: 'action'},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 

        // halal add
        $('#halal_form_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('fin.halal.add')}}",
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
                $("#halal_add").modal('hide');
                table_halal.ajax.reload();
                
            }
            
        },
            error: function(data){
                console.log(data);
            }
        })
    });

    //Edit halal fin
    function editHalal(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/fin/halal/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#halal_add').modal('show');
            $('#id').val(res.id);
            $('#title').val(res.name);
            $('#doc').val(res.document);
            $('#date').val(res.due_date);
            $('#reminder').val(res.reminder);

            }
        });
    }

    //delete halal
   function deleteHalal(id){
            if (confirm("Delete Document ini?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/fin/halal/delete/"+id,
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
    </script>
@endpush
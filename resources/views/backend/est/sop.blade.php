@extends('layouts.backend')

@section('title')
    Estate SOP
@endsection

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
        
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Estate</li>
                        <li class="breadcrumb-item active">FORM</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
           
            @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               {{ session('message') }}.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    {{-- end header --}}

    {{-- Content --}}
    <section class="content">
        <div class="container-fluid">

            {{-- Modal Form --}}

            <div class="modal fade" id="modal-sop">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content modal-lg">
                        <div class="modal-header">
                            <h4 class="modal-title" id="sop_title"><i class="fas fa-edit"></i> Add Form SOP</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            

                            <form action="{{ route('estate.sop.store') }}" method="POST" enctype="multipart/form-data">                   
                                @csrf
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName" class="form-label">No Document<span class="text-danger">(*)</span></label>
                                            <input type="hidden" name="id" id="id"/>
                                            <input type="hidden" name="f_edit" id="f_edit"/>
                                            {!! Form::text('no_revisi', null, array('id'=>'no_revisi','placeholder' => 'Example (GMO-0003 Rev 0)','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName" class="form-label">Name<span class="text-danger">(*)</span></label>
                                            {!! Form::text('name', null, array('id' =>'name','placeholder' => 'Name','class' => 'form-control')) !!}
                                            {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                                        </div>
                                    </div>
                                    
                                </div>
        
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName" class="form-label">Upload Document <span class="text-danger">(*.pdf / *.doc / *.docx)</span></label>
                                            <input type="file" id="file" class="form-control" name="file" />
                                            @error('file')
                                                <span class="text-danger text-sm">{{ $message }}</span>                              
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName" class="form-label">Jenis Document<span class="text-danger">(*)</span></label>
                                            <select class="custom-select rounded-0" id="jenis_sop" placeholder="" name="jenis_sop">
                                                <option disable>-- Pilih -- </option>       
                                                <option value="1">Standart Operational Procedure</option>
                                                <option value="2">Work Instruction</option>
                                                <option value="3">FORM</option>                             
                                            </select>
                                            @error('status')
                                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                                            @enderror
                                        </div>
                                    </div>
        
                                </div>
        
        
                              
                                @if (Session::has('success'))
                                <div class="alert alert-success text-center">
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                                @endif
                            
                            {{-- end form --}}


                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" onclick="clearForm()" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>    
            </div>
            {{-- End modal Form --}}
            
            {{-- SOP --}}
            <div class="card card-success">
                            
                {{-- card header --}}
                <div class="card-header">
                    <h3 class="card-title">Input SOP/WI/FORM </h3>
    
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
    
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2></h2>
                            </div>
                        </div>
                    </div>
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <button type="button" class="btn btn-primary pull-right mb-2" data-toggle="modal" data-target="#modal-sop">
                       <i class="fas fa-plus"></i> Add Form
                    </button>
                   
                    <table class="table table-stripped mt-2" id="table_sop">
                        <thead>
                            <tr>
                                <th>Nomor Doc</th>
                                <th>Name</th>
                                <th>Jenis Document</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                        
                    
                </div>
            </div>
            {{-- end SOP --}}
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

    $(document).ready( function () {

    // $('#table_est').DataTable();
    table = $('#table_sop').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        
        url: "{{ route('get.sop') }}",
        type: "POST",        
    },
        columns: [
            // {data: 'rownum', name: 'id', orderable: false},
            // let name = 'ee'
            {data: 'no_revisi', name: 'no_revisi', orderable: true, searchable: true},
            {data:'name', name : 'name',orderable: true, searchable: true},
            {data:'jns', name : 'jns',orderable: true, searchable: false},
            {data: 'action', name: 'action'},
        ]
        }); 

    });


    //Edit estate
    function editEstate(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/est-sop-edit/"+id,
        dataType: 'json',
        success: function(res){
            $('#modal-sop').modal('show');
            console.log(res.id);
            $('#id').val(res.id);
            $('#no_revisi').val(res.no_revisi);
            $('#name').val(res.name);
            $('#f_edit').val(res.file);
            $('#jenis_sop').val(res.jenis_sop);
            document.getElementById("sop_title").innerHTML = '<i class="fas fa-edit"></i> Edit Form';
            // $('#efile').attr('src', SITEURL +'public/file/'+res.cover);

            }
        });
    }

    function clearForm(){
        console.log('clear');
        $('#id').val('');
            $('#no_revisi').val('');
            $('#name').val('');
            $('#f_edit').val('');
            $('#jenis_sop').val('');
            document.getElementById("sop_title").innerHTML = '<i class="fas fa-edit"></i> Add Form SOP';
    }

    //delete Estate
    function deleteFunc(id){
            if (confirm("Delete item ini?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/est-sop/del/"+id,
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
    </script>
@endpush

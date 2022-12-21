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
                                <li class="breadcrumb-item active"><a href="javascript:void(0);">{{__('HSE')}}</a></li>
                                
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->

    {{-- Modal Incident report--}}
    <div class="modal fade bd-example-modal-xl" id="inc_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_inc_add" name="form_inc_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="las la-plus"></i> 
                    Add Incident Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NAMA<span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id" id="id"/>
                            {!! Form::text('nama', null, array('id'=> 'nama','placeholder' => 'Nama','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('nama')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TANGGAL </label>
                            {!! Form::date('tgl', null, array('id'=> 'tgl','placeholder' => 'Tanggal','class' => 'date-picker rounded-1 form-control', 'required')) !!}
                            @error('company')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DEPARTMENT </label>
                           
                            <select class="custom-select rounded-1" placeholder="" id="department" name="department" required>
                                <option disable>-- Select -- </option>
                                @foreach ($dept as $list)
                                <option value="{{ $list->id }}">{{ $list->name }}</option>
                                @endforeach
                                
                            </select>
                            @error('department')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">JAM </label>
                            {!! Form::time('jam', null, array('id'=> 'jam','placeholder' => 'Jam','class' => 'rounded-1 form-control', 'required')) !!}
                            @error('jam')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">KATEGORI KECELAKAAN </label>
                           
                            <select class="custom-select rounded-1" placeholder="" id="kategori_kecelakaan" name="kategori_kecelakaan" required>
                                <option disable>-- Select -- </option>
                                <option value="NEAR MISS">NEAR MISS</option>
                                <option value="FIRST AID">FIRST AID</option>
                                <option value="MEDICAL TREATMENT">MEDICAL TREATMENT</option>
                                <option value="LOST TIME INJURIES">LOST TIME INJURIES</option>
                                <option value="FATALITY">FATALITY</option>
                                <option value="PROPERTY DEMAGE">PROPERTY DEMAGE</option>
                                
                            </select>
                            @error('kategori_kecelakaan')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">PENYEBAB KECELAKAAN </label>
                           
                            <select class="custom-select rounded-1" placeholder="" id="penyebab" name="penyebab" required>
                                <option disable>-- Select -- </option>
                                <option value="TERTUSUK">TERTUSUK</option>
                                <option value="TERPUKUL">TERPUKUL</option>
                                <option value="TERJEPIT">TERJEPIT</option>
                                <option value="TERJATUH DARI KETINGGIAN/LUBANG">TERJATUH DARI KETINGGIAN/LUBANG</option>
                                <option value="TERGELINCIR">TERGELINCIR</option>
                                <option value="TERTUMPAH BAHAN KIMIA">TERTUMPAH BAHAN KIMIA</option>
                                <option value="TERSENGAT LISTRIK">TERSENGAT LISTRIK</option>
                                <option value="LAIN-LAIN">LAIN-LAIN</option>
                                
                            </select>
                            @error('penyebab')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">BAGIAN TERLUKA </label>
                           
                            <select class="custom-select rounded-1" placeholder="" id="bagian_terluka" name="bagian_terluka" required>
                                <option disable>-- Select -- </option>
                                <option value="KEPALA">KEPALA</option>
                                <option value="MATA">MATA</option>
                                <option value="TELINGA">TELINGA</option>
                                <option value="BADAN">BADAN</option>
                                <option value="LENGAN">LENGAN</option>
                                <option value="TANGAN">TANGAN</option>
                                <option value="JARI TANGAN">JARI TANGAN</option>
                                <option value="PAHA">PAHA</option>
                                <option value="TELAPAK KAKI">TELAPAK KAKI</option>
                                <option value="PERGELANGAN TANGAN">PERGELANGAN TANGAN</option>
                                <option value="PERGELANGAN KAKI">PERGELANGAN KAKI</option>
                                <option value="BAGIAN DALAM TUBUH">BAGIAN DALAM TUBUH</option>
                            </select>
                            @error('bagian_terluka')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">MESIN / ALAT PENYEBAB KECELAKAAN </label>
                           
                            <select class="custom-select rounded-1" placeholder="" id="alat_penyebab" name="alat_penyebab" required>
                                <option disable>-- Select -- </option>
                                <option value="POMPA">POMPA</option>
                                <option value="LIFT">LIFT</option>
                                <option value="PERALATAN BERGERAK">PERALATAN BERGERAK</option>
                                <option value="KONVEYOR">KONVEYOR</option>
                                <option value="ALAT TRANSPORT/LORI">ALAT TRANSPORT/LORI</option>
                                <option value="TRANSMISI MEKANIK">TRANSMISI MEKANIK</option>
                                <option value="PERALATAN TANGAN(PALU, PISAU, GERINDA)">PERALATAN TANGAN(PALU, PISAU, GERINDA)</option>
                                <option value="LISTRIK">LISTRIK</option>
                                <option value="BAHAN KIMIA">BAHAN KIMIA</option>
                                <option value="DEBU BERBAHAYA">DEBU BERBAHAYA</option>
                                <option value="LINGKUNGAN KERJA">LINGKUNGAN KERJA</option>
                                <option value="AREA MESIN YANG PANAS">AREA MESIN YANG PANAS</option>
                                <option value="BINATANG">BINATANG</option>
                                <option value="LANTAI KERJA">LANTAI KERJA</option>
                                <option value="LAIN-LAIN">LAIN-LAIN</option>
                            </select>
                            @error('penyebab')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">KRONOLOGI INSIDEN </label>
                            <textarea class="rounded-1 form-control" cols="5" placeholder="Kronologi Insiden" name="kronologi" id="kronologi"></textarea>
                            @error('kronologi')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">ANALISA PENYEBAB KEJADIAN</label>
                            <textarea class="rounded-1 form-control" cols="5" placeholder="Analisan Penyebab Kejadian" name="analisa_kejadian" id="analisa_kejadian"></textarea>
                            @error('analisa_kejadian')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TINDAKAN PERBAIKAN</label>
                            <textarea class="rounded-1 form-control" cols="5" placeholder="Tindakan Perbaikan" name="tindakan_perbaikan" id="tindakan_perbaikan"></textarea>
                            @error('analisa_kejadian')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TINDAKAN PENCEGAHAN</label>
                            <textarea class="rounded-1 form-control" cols="5" placeholder="Tindakan Pencegahan" name="tindakan_pencegahan" id="tindakan_pencegahan"></textarea>
                            @error('analisa_kejadian')
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


     {{-- Modal add p3k--}}
     <div class="modal fade bd-example-modal-xl" id="p3k_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="form_p3k_add" name="form_p3k_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title block text-primary" id="no_emp">
                    <i class="las la-plus"></i> 
                    Add P3K</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NO P3K <span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_pk" id="id_pk"/>
                            {!! Form::text('no_p3k', null, array('id'=> 'no_p3k','placeholder' => 'No P3K','class' => 'rounded-1 form-control', 'required')) !!}
                           
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TANGGAL <span class="text-danger">(*)</span></label>
                            {!! Form::date('tgl_pk', null, array('id'=> 'tgl_pk','placeholder' => 'Tanggal','class' => 'date-picker rounded-1 form-control', 'required')) !!}
                           
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">CONTACT  <span class="text-danger">(*)</span></label>
                            {!! Form::text('contact_pk', null, array('id'=> 'contact_pk','placeholder' => 'Contact','class' => 'rounded-1 form-control', 'required')) !!}
                            
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NAMA  <span class="text-danger">(*)</span></label>
                            {!! Form::text('nama_pk', null, array('id'=> 'nama_pk','placeholder' => 'Nama','class' => 'rounded-1 form-control', 'required')) !!}
                            
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">LOKASI  <span class="text-danger">(*)</span></label>
                            {!! Form::text('lokasi_pk', null, array('id'=> 'lokasi_pk','placeholder' => 'Lokasi','class' => 'rounded-1 form-control', 'required')) !!}
                            
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
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><b>{{__('Incident Report')}}</b></a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" id="p3k-tab" data-toggle="tab" href="#p3k" role="tab" aria-controls="p3k" aria-selected="true"><b>{{__('P3K')}}</b></a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="apar-tab" data-toggle="tab" href="#apar" role="tab" aria-controls="apar" aria-selected="true"><b>{{__('APAR')}}</b></a>
                                        </li>
                                        
                                    </ul>

                                    <div class="tab-content" id="normaltabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            {{-- content tenant --}}
                                            <div class="table-responsive mb-4">
        
                                                <button class="btn bg-gradient-success text-white btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#inc_add">
                                                    <i class="las la-plus sidemenu-right-icon"></i>Add Incident
                                                </button>
                                               
                                                <table id="table_occ" class="table table-hover" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th style="width:20px;">{{__('No')}}</th>
                                                        <th>{{__('Nama')}}</th>
                                                        <th>{{__('Deparment')}}</th>
                                                        <th>{{__('Kategori Kecelakaan')}}</th>
                                                        <th>{{__('Bagian terluka')}}</th>
                                                        <th>{{__('Alat Penyebab')}}</th>
                                                        <th class="no-content"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="p3k" role="tabpanel" aria-labelledby="p3k-tab">

                                            <button class="btn bg-gradient-success text-white btn-sm mb-2 mt-2" onclick="clearField()" data-toggle="modal" data-target="#p3k_add">
                                                <i class="las la-plus sidemenu-right-icon"></i>Add P3K
                                            </button>

                                            <table id="table_p3k" class="table table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th style="width:20px;">{{__('No')}}</th>
                                                    <th>{{__('No P3K')}}</th>
                                                    <th>{{__('Lokasi')}}</th>
                                                    <th>{{__('Tanggal')}}</th>
                                                    <th>{{__('Nama')}}</th>
                                                    <th>{{__('Contact')}}</th>
                                                    <th class="no-content"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                        <div class="tab-pane fade show" id="apar" role="tabpanel" aria-labelledby="apar-tab">

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
     var table_occ, table_p3k;

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
            
            url: "{{ route('hse') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data:'nama', name : 'nama',orderable: true, searchable: true},
                    {data: 'department', name: 'department', orderable: true, searchable: true},  
                    {data:'kategori_kecelakaan', name : 'kategori_kecelakaan',orderable: true, searchable: true},
                    {data: 'bagian_terluka', name: 'bagian_terluka', orderable: true, searchable: true},                     
                    {data: 'alat_penyebab', name: 'alat_penyebab', orderable: true, searchable: true}, 
                    {data: 'action', name: 'action'},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 


        // table p3K
        table_p3k = $('#table_p3k').DataTable({
            "language": {
                "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
                }
        },
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "{{ route('hse.p3k') }}",
            type: "GET"
            
        },
            columns: [
                // {data: 'rownum', name: 'id', orderable: false},
                // let name = 'ee'
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data:'no_p3k', name : 'no_p3k',orderable: true, searchable: true},
                    {data: 'lokasi', name: 'lokasi', orderable: true, searchable: true},  
                    {data:'tgl', name : 'tgl',orderable: true, searchable: true},
                    {data: 'nama', name: 'nama', orderable: true, searchable: true},                     
                    {data: 'contact', name: 'contact', orderable: true, searchable: true}, 
                    {data: 'action', name: 'action'},
            //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
            ]
        }); 
        
         // halal add
         $('#form_inc_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('hse.incident.add')}}",
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
                $("#inc_add").modal('hide');
                table_occ.ajax.reload();
                
            }
            
        },
            error: function(data){
                    console.log(data);
                }
            })
        });

        $('#form_p3k_add').submit(function(e) {
        // document.getElementById("hrga_title").innerHTML = '<i class="fas fa-plus"></i> Add Employee';
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
        type:'POST',
        url: "{{ route('hse.p3k.add')}}",
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
                $("#p3k_add").modal('hide');
                table_p3k.ajax.reload();
                
            }
            
        },
            error: function(data){
                    console.log(data);
                }
            })
        });


    });

     //Edit procurement fin
     function editInc(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/hse/incident/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#inc_add').modal('show');
            $('#id').val(res.id);
            $('#nama').val(res.nama);
            $('#tgl').val(res.tgl);
            $('#jam').val(res.jam);
            $('#department').val(res.id_department);
            $('#kategori_kecelakaan').val(res.kategori_kecelakaan);
            $('#penyebab').val(res.penyebab);
            $('#bagian_terluka').val(res.bagian_terluka);
            $('#alat_penyebab').val(res.alat_penyebab);
            $('#kronologi').val(res.kronologi);
            $('#analisa_kejadian').val(res.analisa_kejadian);
            $('#tindakan_perbaikan').val(res.tindakan_perbaikan);
            $('#tindakan_pencegahan').val(res.tindakan_pencegahan);
            }
        });

    }

    //Edit procurement fin
    function editPk(id){
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/hse/p3k/show/"+id,
        dataType: 'json',
        success: function(res){
            $('#p3k_add').modal('show');
            $('#id_pk').val(res.id);
            $('#nama_pk').val(res.nama);
            $('#tgl_pk').val(res.tgl);
            $('#contact_pk').val(res.contact);
            $('#lokasi_pk').val(res.lokasi);
            $('#no_p3k').val(res.no_p3k);
            }
        });

    }

    //delete procurement
   function deleteInc(id){
            if (confirm("Delete this record?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/hse/incident/delete/"+id,
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

    //delete p3k
   function deletePk(id){
            if (confirm("Delete this record?") == true) {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
                // ajax
                $.ajax({
                    type:"DELETE",
                    url: "{{ URL::to('/') }}/hse/p3k/delete/"+id,
                    data: { id: id},
                    // dataType: 'json',
                    success: function(res){

                        toastMixin.fire({
                            animation: true,
                            title: 'Delete was successfully!'
                        });
                        table_p3k.ajax.reload();
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

        $('#id_pk').val('');
        $('#nama_pk').val('');
        $('#tgl_pk').val('');
        $('#contact_pk').val('');
        $('#lokasi_pk').val('');
        $('#no_p3k').val('');
    }
</script>
@endpush

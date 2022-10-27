@extends('layouts.master')

@push('plugin-styles')
    
    {!! Html::style('assets/css/ui-elements/breadcrumbs.css') !!}
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('assets/css/basic-ui/tabs.css') !!}
    {!! Html::style('assets/css/apps/file-manager.css') !!}
    {!! Html::style('assets/css/elements/tooltip.css') !!}
    {!! Html::style('plugins/bootstrap-select/bootstrap-select.min.css') !!}
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
                                <li class="breadcrumb-item active"><a href="javascript:void(0);">{{__('IT')}}</a></li>
                                <li class="breadcrumb-item " aria-current="page"></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->


    {{-- modal add factory--}}
    <div class="modal fade bd-example-modal-xl" id="gmo_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="gmo_list_add" name="gmo_list_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gmo_title"><i class="fa fa-plus"></i> Form Inventory IT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">JENIS PERANGKAT<span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id" id="id"/>
                            <select class="custom-select rounded-0" placeholder="" id="category" name="category">
                                <option disable>-- Pilih -- </option>
                                @foreach ($list as  $list)
                                    <option value="{{ $list->id }}">{{ $list->name }}</option>                        
                                @endforeach
                            </select>
                            @error('category')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">MERK</label>
                            {!! Form::text('merk', null, array('id'=> 'merk','placeholder' => 'MERK','class' => 'form-control')) !!}
                            {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                            @error('merk')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>
                    
                </div>

                <div class="row">                            
                    
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NO SERI<span class="text-danger"></span></label>
                            <input type="text" class="form-control" placeholder="NO SERI" id="no_seri" name="no_seri">
                                
                            @error('no_seri')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NO LICENSI<span class="text-danger"></span></label>
                            <input type="text" class="form-control" placeholder="NO LICENSI" id="no_licensi" name="no_licensi">
                                
                            @error('no_licensi')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">RAM<span class="text-danger"></span></label>
                            <input type="text" class="form-control" placeholder="RAM" id="ram" name="ram">
                                
                            @error('ram')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">PROCESSOR</label>
                           <input type="text" name="processor" id="processor" class="form-control" max="100" placeholder="Processor"/>
                            @error('processor')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>
                    
                </div>

                

                <div class="row">
                    

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">SSD</label>
                            <input type="text" id="ssd" name="ssd" class="form-control rounded-0"  placeholder="SSD"/>
                            @error('ssd')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">HDD</label>
                            <input type="text" id="hdd" name="hdd" class="form-control rounded-0" placeholder="HDD"/>
                            @error('hdd')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">KETERANGAN<span class="text-danger"></span></label>
                            <input type="text" class="form-control" placeholder="KETERANGAN" id="keterangan" name="keterangan">
                                
                            @error('keterangan')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    
                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" id="btn-save" class="btn btn-success" value="Submit" />
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
            </div>
            </form>
        </div>
    </div>

    {{-- modal add userlist --}}
    <div class="modal fade bd-example-modal-xl" id="userlist_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="javascript:void(0)" id="user_list_add" name="user_list_add" method="POST" >                   
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="user_list_title"><i class="fa fa-plus"></i> Add User List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">NAME <span class="text-danger">(*)</span></label>
                            <input type="hidden" name="id_user_list" id="id_user_list"/>
                            <input type="text" class="form-control rounded-0" placeholder="NAME" id="name" name="name" />
                            @error('block')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">DEPARTMENT</label>
                            <select class="custom-select rounded-0" placeholder="" id="dept" name="dept">
                                <option disable>-- Pilih -- </option>
                                @foreach ($dept as  $list)
                                    <option value="{{ $list->id }}">{{ $list->name }}</option>                        
                                @endforeach
                            </select>
                            {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                        </div>
                    </div>
                    
                </div>

                <div class="row">                            
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">EMAIL </label>
                            <input type="text" class="form-control rounded-0" placeholder="EMAIL" name="email" id="email"  />
                                
                            @error('email')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">IP ADDRESS</label>
                            <input type="text" class="form-control rounded-0" placeholder="IP ADDRESS" name="ip" id="ip"  />
                                
                            @error('ip')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">AKSES INTERNET </label>
                            <select class="custom-select rounded-0" placeholder="" id="internet" name="internet">
                                <option disable>-- Pilih -- </option>
                                <option value="1">YA</option> 
                                <option value="0">TIDAK</option> 
                                
                            </select>
                            @error('internet')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>
                    
                </div>

                

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">JENIS</label>
                            <input type="text" class="form-control rounded-0" placeholder="JENIS" name="jenis" id="jenis"  />
                            @error('jenis')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">LOKASI</label>
                            <input type="text" id="lokasi" name="lokasi" class="form-control rounded-0" placeholder="LOKASI"/>
                            @error('lokasi')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>      
                </div>

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TANGGAL PENYERAHAN</label>
                            <input type="date" class=" date-picker form-control rounded-0" placeholder="JENIS" name="tgl_penyerahan" id="tgl_penyerahan"  />
                            @error('tgl_penyerahan')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">TANGGAL PENGEMBALIAN</label>
                            <input type="date" class=" date-picker form-control rounded-0" placeholder="JENIS" name="tgl_pengembalian" id="tgl_pengembalian"  />
                            @error('tgl_pengembalian')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>      
                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" id="btn-save-dorm" class="btn btn-success" value="Submit" />
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
            </div>
            </form>
        </div>
    </div>

     {{-- modal add media --}}
     <div class="modal fade bd-example-modal-xl" id="env_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ route('gmo.store') }}" method="POST" enctype="multipart/form-data">                   
                @csrf
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="k_bangunan"><i class="fa fa-plus"></i> Add Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Title<span class="text-danger">(*)</span></label>
                            {!! Form::text('name', null, array('id'=> 'title','placeholder' => 'Title','class' => 'form-control')) !!}
                            {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Status<span class="text-danger">(*)</span></label>
                            <select class="custom-select rounded-0" placeholder="" name="status" id="status">
                                <option disable>-- Pilih -- </option>       
                                <option value="1">Public</option>
                                <option value="2">Request</option>                             
                            </select>
                            @error('status')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Status Akses<span class="text-danger">(*)</span></label>
                            <select class="custom-select rounded-0" placeholder="" name="status_akses" id="status_akses">
                                <option disable>-- Pilih -- </option>       
                                <option value="1">All Department</option>
                                <option value="2">Internal</option>                             
                            </select>
                            @error('status')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Category <span class="text-danger">(*)</span></label>
                            <select class="custom-select rounded-0" placeholder="" id="id_category" name="kategori">
                                <option disable>-- Pilih Kategori -- </option>  
                                @foreach ($gmo_kategori as $kat)
                                    <option value="{{ $kat->id }}">{{ $kat->name }}</option>
                                @endforeach 
                            </select>
                            @error('kategori')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                            
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Sub Category<span class="text-danger">(*)</span></label>
                            <select class="custom-select rounded-0" placeholder="" id="sub_category" name="sub_category">
                                <option disable>-- Pilih -- </option>                                    
                            </select>
                            @error('status')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Due Date (Optional)</label>
                            <input type="date" id="edue_date" name="due_date" class="date-picker form-control rounded-0" data-date-format="dd//yyyy" placeholder="Due Date"/>
                            @error('status')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Reminder Day (Optional)</label>
                            <select class="custom-select rounded-0" placeholder="" name="reminder" id="reminder">
                                <option disable>-- Pilih -- </option>       
                                <option value="7">1 Minggu</option>
                                <option value="30">1 bulan</option>
                                <option value="90">3 bulan</option>
                                <option value="180">6 bulan</option>                             
                            </select>
                            @error('status')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-12">
                        <table class="table table-stripped" id="dynamicAddRemove">
                            <tr>
                                <td>
                                    <input type="file" name="addMoreInputFields[0][name]" placeholder="File" class="form-control" />
                                </td>
                                
                                <td>
                                    <input type="text" name="addMoreInputFields[0][keterangan]" placeholder="Name File" class="form-control" />
                                </td> 
                                <td>
                                    <button type="button" name="add" id="dynamic-ar" class="btn btn-primary"><i class="las la-plus"></i></button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Submit" />
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
            </div>
            </form>
        </div>
    </div>

    {{-- modal edit media --}}
    <div class="modal fade bd-example-modal-xl" id="env-edit" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ route('env.store') }}" method="POST" enctype="multipart/form-data">                   
                @csrf
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="k_bangunan"><i class="fa fa-plus"></i> Edit File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">                            
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Title<span class="text-danger">(*)</span></label>
                            {!! Form::text('name', null, array('id'=> 'etitle','placeholder' => 'Title','class' => 'form-control')) !!}
                            {{-- <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Singkat" style=""></textarea> --}}
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Status<span class="text-danger">(*)</span></label>
                            <select class="custom-select rounded-0" placeholder="" name="status" id="estatus">
                                <option disable>-- Pilih -- </option>       
                                <option value="1">Public</option>
                                <option value="2">Request</option>                             
                            </select>
                            @error('status')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Status Akses<span class="text-danger">(*)</span></label>
                            <select class="custom-select rounded-0" placeholder="" name="status_akses" id="estatus_akses">
                                <option disable>-- Pilih -- </option>       
                                <option value="1">All Department</option>
                                <option value="2">Internal</option>                             
                            </select>
                            @error('status')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Category <span class="text-danger">(*)</span></label>
                            <select class="custom-select rounded-0" placeholder="" id="eid_category" name="kategori">
                                <option disable>-- Pilih Kategori -- </option>  
                                @foreach ($gmo_kategori as $kat)
                                    <option value="{{ $kat->id }}">{{ $kat->name }}</option>
                                @endforeach 
                            </select>
                            @error('kategori')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                            
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Sub Category<span class="text-danger">(*)</span></label>
                            <select class="custom-select rounded-0" placeholder="" id="eid_sub_category" name="sub_category">
                                <option disable>-- Pilih -- </option>                                    
                            </select>
                            @error('status')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Due Date (Optional)</label>
                            <input type="date" id="edue_date" name="due_date" class="date-picker form-control rounded-0" data-date-format="dd//yyyy" placeholder="Due Date"/>
                            @error('status')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName" class="form-label">Reminder Day (Optional)</label>
                            <select class="custom-select rounded-0" placeholder="" name="reminder" id="ereminder">
                                <option disable>-- Pilih -- </option>       
                                <option value="7">1 Minggu</option>
                                <option value="30">1 bulan</option>
                                <option value="90">3 bulan</option>
                                <option value="180">6 bulan</option>                             
                            </select>
                            @error('status')
                                    <span class="text-danger text-sm">{{ $message }}</span>                              
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-12">
                        <table id="datatable_edit" class="table table-hover">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">#</th> --}}
                                    <th scope="col">File</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>                                
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Submit" />
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-dismiss="modal">Add New File</button>
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
            </div>
            </form>
        </div>
    </div>

    {{-- Add Document --}}
    <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Add Document</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="{{ route('gmo.update_data') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <table class="table table-stripped" id="dynamicAddRemove-edit">
                            <tr>
                                <td>
                                    <input type="hidden" name="addMoreInputFields[0][kode_gmo]"  id="ekd_est" class="form-control"/>
                                    <input type="file" name="addMoreInputFields[0][file]" placeholder="Nama Barang" class="form-control" />
                                </td>
                                
                                <td>
                                    <input type="text" name="addMoreInputFields[0][name]" placeholder="Name" class="form-control" />
                                </td> 
                                <td>
                                    <button type="button" name="add" id="dynamic-ar-edit" class="btn btn-primary"><i class="las la-plus"></i></button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" value="Submit" class="btn btn-primary"/>  
              <button type="button" class="btn btn-white" data-toggle="modal" data-target="#estate-edit" data-dismiss="modal">Back</button>
            </div>
            </form>
          </div>
        </div>
    </div>

    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="layout-top-spacing mb-5">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing">
                            <div id="tabsNormal" class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                   
                                    <div class="widget-content widget-content-area normal-tab">
                                        <ul class="nav nav-tabs mb-2 mt-2" id="normaltab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{__('Hardware Inventory')}}</a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false">{{__('Software Inventory')}}</a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link" id="userlist-tab" data-toggle="tab" href="#userlist" role="tab" aria-controls="userlist" aria-selected="false">{{__('User List')}}</a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link" id="media-tab" data-toggle="tab" href="#media" role="tab" aria-controls="media" aria-selected="false">{{__('Media')}}</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="normaltabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <a href="{{ route('gmo.list.export') }}" class="btn  btn-danger mb-2">
                                                    <i class="las la-file-export"></i> Export
                                                </a>
                                                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#importExcelFact">
                                                    <i class="las la-file-import"></i> Import
                                                </button>
                                                <button class="btn btn-success btn-md pull-left mb-2" onclick="clearField()" data-toggle="modal" data-target="#gmo_add"><i class="las la-plus"></i> Add List</button>
                                                <table id="tbl_inv" class="table table-hovered table-sm table-striped" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="width: 15px;">No</th>
                                                            <th scope="col">Jenis Perangkat</th>
                                                            <th scope="col">Processer</th>
                                                            <th scope="col">RAM</th>
                                                            <th scope="col" style="width: 150px;">SSD</th>
                                                            <th scope="col" style="width: 150px;">HDD</th>
                                                            <th class="no-content"></th>
                                                            {{-- <th scope="col">END OF LEASE</th>
                                                            <th scope="col">BUILDING STATUS</th>
                                                            <th scope="col">LAND AREA</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                                                <button class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#env_add">
                                                    <i class="las la-plus"></i>  Add File
                                                </button>
                                                <table id="list" class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Kode</th>
                                                            <th scope="col">Title</th>
                                                            <th scope="col">Category</th>
                                                            <th scope="col">Sub</th>
                                                            <th scope="col">action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="userlist" role="tabpanel" aria-labelledby="userlist-tab">
                                                <a href="{{ route('gmo.user_list.export') }}" class="btn  btn-danger mb-2">
                                                    <i class="las la-file-export"></i> Export
                                                </a>
                                                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#importExcelDorm">
                                                    <i class="las la-file-import"></i> Import
                                                </button>
                                                <button class="btn btn-success btn-md pull-left mb-2" onclick="clearField()" data-toggle="modal" data-target="#userlist_add"><i class="las la-plus"></i> Add List</button>
                                                    <table id="tbl_user" class="table table-hovered table-sm table-striped" style="width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" style="width: 15px;">No</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Department</th>
                                                                <th scope="col">Email</th>
                                                                <th scope="col">IP Address</th>
                                                                <th scope="col">Location</th>
                                                                <th scope="col">Status Pakai</th>
                                                                <th class="no-content"></th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        
                                                        </tbody>
                                                    </table> 
                                            </div>
                                            <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
                                                
                                                <div class="file-manager-bottom-default">
                                                    <h3 class="mr-5"><i class="las la-photo-video text-primary "></i> {{__('IT Media Documentations')}}</h3>
                                                    <div class="file-manager-right-bottom">
                                                        <div class="mt-4 d-block">
                                                            <div class="">
                                                                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#importExcelDorm">
                                                                    <i class="las la-plus"></i> Add Document
                                                                </button>
                                                            </div>
                                                            <div class="folder-list">
                                                                <div class="folder">
                                                                    <p class="main-title">{{__('Dokumentasi Menteri Singapore')}}</p>
                                                                    <div class="d-flex">
                                                                        {{-- <img src="{{ url('assets/img/profile-6.jpg') }}" class="shared-user"/>
                                                                        <img src="{{ url('assets/img/profile-2.jpg') }}" class="shared-user"/>
                                                                        <img src="{{ url('assets/img/profile-3.jpg') }}" class="shared-user"/>
                                                                        <img src="{{ url('assets/img/profile-4.jpg') }}" class="shared-user"/> --}}
                                                                    </div>
                                                                    <p></p>
                                                                    <p class="sub-title">{{__('Internal Folder')}}</p>
                                                                    <p class="folder-name">{{__('10 Oct 2022')}}</p>
                                                                </div>
                                                                <div class="folder">
                                                                    <p class="main-title">{{__('Kunjungan staff ke Presidenan')}}</p>
                                                                    
                                                                    <p></p>
                                                                    <p class="sub-title">{{__('Internal Folder')}}</p>
                                                                    <p class="folder-name">{{__('13 Sep 2022')}}</p>
                                                                </div>

                                                                <div class="folder">
                                                                    <p class="main-title">{{__('Dokumentasi Investor')}}</p>
                                                                    <div class="d-flex">
                                                                        {{-- <img src="{{ url('assets/img/profile-6.jpg') }}" class="shared-user"/>
                                                                        <img src="{{ url('assets/img/profile-2.jpg') }}" class="shared-user"/>
                                                                        <img src="{{ url('assets/img/profile-3.jpg') }}" class="shared-user"/>
                                                                        <img src="{{ url('assets/img/profile-4.jpg') }}" class="shared-user"/> --}}
                                                                    </div>
                                                                    <p></p>
                                                                    <p class="sub-title">{{__('Internal Folder')}}</p>
                                                                    <p class="folder-name">{{__('1 Oct 2022')}}</p>
                                                                </div>
                                                                <div class="folder">
                                                                    <p class="main-title">{{__('Kunjungan Pak Frans')}}</p>
                                                                    
                                                                    <p></p>
                                                                    <p class="sub-title">{{__('Internal Folder')}}</p>
                                                                    <p class="folder-name">{{__('13 Sep 2022')}}</p>
                                                                </div>

                                                                <div class="folder">
                                                                    <p class="main-title">{{__('Halal hub')}}</p>
                                                                    <div class="d-flex">
                                                                        {{-- <img src="{{ url('assets/img/profile-6.jpg') }}" class="shared-user"/>
                                                                        <img src="{{ url('assets/img/profile-2.jpg') }}" class="shared-user"/>
                                                                        <img src="{{ url('assets/img/profile-3.jpg') }}" class="shared-user"/>
                                                                        <img src="{{ url('assets/img/profile-4.jpg') }}" class="shared-user"/> --}}
                                                                    </div>
                                                                    <p></p>
                                                                    <p class="sub-title">{{__('Internal Folder')}}</p>
                                                                    <p class="folder-name">{{__('13 Sept 2022')}}</p>
                                                                </div>
                                                               
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                       
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
    
    {!! Html::script('plugins/table/datatable/datatables.js') !!}
@endpush

@push('custom-scripts')
<script>
// header request token
var SITEURL = '{{URL::to('')}}';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var table_inv, table_user, table_edit;


table_user = $('#tbl_user').DataTable({
    "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
        }
    },
    processing: true,
    serverSide: true,
    ajax: {
        
        url: "{{ route('gmo.user_list') }}",
        type: "GET"
        
    },
        columns: [
            // {data: 'rownum', name: 'id', orderable: false},
            // let name = 'ee'
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            {data: 'name', name: 'name', orderable: true, searchable: true},
            {data:'department', name : 'department',orderable: true, searchable: true},
            {data:'email', name : 'email',orderable: true, searchable: false},
            {data:'ip', name : 'ip',orderable: true, searchable: true},
            {data: 'lokasi', name: 'lokasi'},
            {data: 'status_pakai', name: 'status_pakai'},
            {data: 'action', name: 'action'},
        //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
        ]
    }); 

    tbl_town = $('#tbl_town').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
    processing: true,
    serverSide: true,
    ajax: {
        
        url: "{{ route('estate.town.index') }}",
        type: "GET"
        
    },
        columns: [
            // {data: 'rownum', name: 'id', orderable: false},
            // let name = 'ee'
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            {data: 'type', name: 'type', orderable: true, searchable: true},
            {data: 'stall_no', name: 'stall_no', orderable: true, searchable: true},
            {data:'name_stall', name : 'name_stall',orderable: true, searchable: true},
            {data:'hod', name : 'hod',orderable: true, searchable: false},
            {data:'remark', name : 'remark',orderable: true, searchable: true},
            {data: 'action', name: 'action'},
        //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
        ]
    }); 

//factory 
$(document).ready( function () {
    // $('#tbl_est').DataTable();

    table_inv = $('#tbl_inv').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
    processing: true,
    serverSide: true,
    ajax: {
        
        url: "{{ route('gmo.list') }}",
        type: "GET"
        
    },
        columns: [
            // {data: 'rownum', name: 'id', orderable: false},
            // let name = 'ee'
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            {data: 'jenis_perangkat', name: 'jenis_perangkat', orderable: true, searchable: true},
            {data:'processor', name : 'processor',orderable: true, searchable: true},
            {data:'ram', name : 'ram',orderable: true, searchable: true},
            {data:'ssd', name : 'ssd',orderable: true, searchable: true},
            {data: 'hdd', name: 'hdd'},
            {data: 'action', name: 'action'},
        //    ,render: $.fn.dataTable.render.number( ',', '.', 0, '$' )
        ]
    }); 


    $('#list').DataTable({
        "language": {
            "paginate": {
            "previous": "<i class='las la-angle-left'></i>",
            "next": "<i class='las la-angle-right'></i>"
            }
        },
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('gmo.ajax.file') }}",
                type: "GET",
                dataType: 'JSON',
            },
                columns: [
                    // {data: 'rownum', name: 'id', orderable: false},
                    // let name = 'ee'
                    {data: 'kode_gmo', name: 'kode_gmo', orderable: true, searchable: false},
                    {data:'name', name : 'name',orderable: true, searchable: true},
                    {data:'category', name : 'category',orderable: true, searchable: false},
                    {data:'subcategory', name : 'subcategory',orderable: true, searchable: false},
                    {data: 'action', name: 'action'},
                ]
        });
        
    // multiple file upload
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="file" name="addMoreInputFields['+ i +'][name]" placeholder="Nama Barang" class="form-control" /></td>  <td><input type="text" name="addMoreInputFields[' + i + '][name]" placeholder="Name File" class="form-control" /></td> <td><button type="button" class="btn btn-danger remove-input-field"><i class="la la-trash"></i></button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
    

    //dropdown category and sub category
   $('#id_category').change(function(){
    var idDept = $(this).val();    
    if(idDept){
        $.ajax({
           type:"GET",
           url:"gmo_cat/"+idDept,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#sub_category").empty();
                $("#sub_category").append('<option>--Select Sub--</option>');
                $.each(res,function(name,id){
                    $("#sub_category").append('<option value="'+id+'">'+name+'</option>');
                });
            }else{
               $("#sub_category").empty();
            }
           }
        });
    }else{
        $("#sub_category").empty();
    }      
   });

   //dropdown edit category and sub category
   $('#eid_category').change(function(){
    var idDept = $(this).val();    
    if(idDept){
        $.ajax({
           type:"GET",
           url:"gmo_cat/"+idDept,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#eid_sub_category").empty();
                $("#eid_sub_category").append('<option>--Pilih SubCategory--</option>');
                $.each(res,function(name,id){
                    $("#eid_sub_category").append('<option value="'+id+'">'+name+'</option>');
                });
            }else{
               $("#eid_sub_category").empty();
            }
           }
        });
    }else{
        $("#eid_sub_category").empty();
    }      
   });


});


function editEnv(id){
    let kd;
        $.ajax({
        type:"GET",
        url: "{{ URL::to('/') }}/gmo/gmo-edit/"+id,
        dataType: 'json',
        success: function(res){
           
            document.getElementById("k_bangunan").innerHTML = res.kode_env;
            kd = res.kode_bangunan;
            //document.getElementById("etitle").innerHTML = res.title;
            console.log(res.id);
            kd_est_edit = res.kode_gmo;
            $('#eid').val(res.id);
            $('#ekode_env').val(res.kode_gmo);
            $('#etitle').val(res.name);
            $('#estatus').val(res.status_request);
            $('#estatus_akses').val(res.status_akses);
            $('#edue_date').val(res.due_date);
            $('#ereminder').val(res.reminder);
            $('#eid_category').val(res.id_category).change();
                setTimeout(function() { 
                    $('#eid_sub_category').val(res.id_sub_category).change();
                }, 500);
            document.getElementById("ekd_est").value = res.kode_gmo;
            // request
             table_edit =  $('#datatable_edit').DataTable({
                        processing: true,
                        serverSide: true,
                        stateSave: true,
                        "bDestroy": true,
                        ajax: {
                            url: "{{ URL::to('/') }}/gmo/ajax/"+res.kode_gmo+"/gmo",
                            dataType: 'json',
                            type: "GET",                    
                        },
                            columns: [
                                // {data: 'rownum', name: 'id', orderable: false},
                                // let name = 'ee'
                                {data: 'file', name: 'file', orderable: false, searchable: false},
                                {data:'name', name : 'name',orderable: false, searchable: true},
                                {data: 'action', name: 'action'},
                            ]
                }); 
            
        }

        });
   }


$('#gmo_list_add').submit(function(e) {
    document.getElementById("gmo_title").innerHTML = '<i class="fas fa-plus"></i> Add Inventory';
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
    type:'POST',
    url: "{{ route('gmo.list.add')}}",
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
            $("#gmo_add").modal('hide');
            table_inv.ajax.reload();
            
        }
        
    },
        error: function(data){
            console.log(data);
        }
    })
});


//Edit factory estate
function editInv(id){
    $.ajax({
    type:"GET",
    url: "{{ URL::to('/') }}/gmo/list/show/"+id,
    dataType: 'json',
    success: function(res){
        $('#gmo_add').modal('show');
        console.log(res.id);
        $('#id').val(res.id);
        $('#category').val(res.id_jenis_komputer);
        $('#merk').val(res.merk);
        $('#no_seri').val(res.no_seri);
        $('#no_lisensi').val(res.no_lisensi);
        $('#ram').val(res.ram);
        $('#processor').val(res.processor);
        $('#ssd').val(res.ssd);
        $('#hdd').val(res.hdd);
        $('#keterangan').val(res.keterangan);
        // document.getElementById("gmo_title").innerHTML = '<i class="fas fa-edit"></i> Edit Inventory';
        // $('#efile').attr('src', SITEURL +'public/file/'+res.cover);

        }
    });
}

//delete Estate
function deleteInv(id){
        if (confirm("Delete list ini?") == true) {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");
            // ajax
            $.ajax({
                type:"DELETE",
                url: "{{ URL::to('/') }}/gmo/list/delete/"+id,
                data: { id: id},
                // dataType: 'json',
                success: function(res){

                    toastMixin.fire({
                        animation: true,
                        title: 'Delete was successfully!'
                    });
                    table_inv.ajax.reload();
                }
            });
        }
}

function clearField(){
    $('#id').val('');
        $('#category').prop('selectedIndex', 0);
        $('#merk').val('');
        $('#no_seri').val('');
        $('#no_licensi').val('');
        $('#ram').val('');
        $('#processor').val('');
        $('#ssd').val('');
        $('#hdd').val('');
        $('#keterangan').val('');
        $('#id_user_list').val('');
        $('#name').val('');
        $('#dept').val('');
        $('#ip').val('');
        $('#email').val('');
        $('#ram').val('');
        $('#jenis').val('');
        $('#tgl_penyerahan').val('');
        $('#tgl_pengembalian').val('');
        $('#lokasi').val('');

}



$('#user_list_add').submit(function(e) {
    // document.getElementById("gmo_title").innerHTML = '<i class="fas fa-plus"></i> Add Inventory';
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
    type:'POST',
    url: "{{ route('gmo.user_list.add')}}",
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
            $("#userlist_add").modal('hide');
            table_user.ajax.reload();
            
        }
        
    },
        error: function(data){
            console.log(data);
        }
    })
});

//Edit factory estate
function editUserList(id){
    $.ajax({
    type:"GET",
    url: "{{ URL::to('/') }}/gmo/user_list/show/"+id,
    dataType: 'json',
    success: function(res){
        $('#userlist_add').modal('show');
        console.log(res.id);
        $('#id_user_list').val(res.id);
        $('#name').val(res.name);
        $('#dept').val(res.department);
        $('#ip').val(res.ip);
        $('#email').val(res.email);
        $('#ram').val(res.ram);
        $('#jenis').val(res.jenis);
        $('#tgl_penyerahan').val(res.tgl_serahkan);
        $('#tgl_pengembalian').val(res.tgl_kembalikan);
        $('#lokasi').val(res.lokasi);
        document.getElementById("gmo_title").innerHTML = '<i class="fas fa-edit"></i> Edit Inventory';
        $('#efile').attr('src', SITEURL +'public/file/'+res.cover);

        }
    });
}

 //delete user list
function deleteUserList(id){
        if (confirm("Delete User list ini?") == true) {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");
            // ajax
            $.ajax({
                type:"DELETE",
                url: "{{ URL::to('/') }}/gmo/user_list/delete/"+id,
                data: { id: id},
                // dataType: 'json',
                success: function(res){

                    toastMixin.fire({
                        animation: true,
                        title: 'Delete was successfully!'
                    });
                    table_user.ajax.reload();
                }
            });
        }
}
</script>
@endpush

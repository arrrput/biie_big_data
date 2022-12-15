@extends('layouts.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/jquery-ui/jquery-ui.min.css') !!}
    {!! Html::style('plugins/dropzone/dropzone.min.css') !!}
    {!! Html::style('assets/css/apps/ecommerce.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area Starts -->
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
                                <li class="breadcrumb-item" aria-current="page"><a href="{{url('/bdv/index')}}"> {{__('Spec')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span> {{__('Add product')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area Ends -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="row layout-spacing layout-top-spacing" id="cancel-row">
            <div class="col-lg-12">
                <div class="">
                    <div class="widget-content searchable-container grid">
                        <div class="card-box add-product">

                          @if (count($errors) > 0)
                          <div class="alert alert-danger">
                            <strong>Sorry !</strong> There were some problems with your input.<br><br>
                            <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                          </div>
                          @endif
                    

                            <p class="mb-4"> {{__('Fill all information below')}}</p>
                            <form class="form" enctype="multipart/form-data" method="post" action="{{ route('bdv.spec.add') }}">
                              @csrf
                                <div class="row">
                                    <div class="col-sm-6 ">
                                        <div class="form-group">
                                            <label for="productname" class="strong"> {{__('Product Name')}} <span class="text-danger">( * )</span></label>
                                            <input id="name" name="name" type="text" placeholder="Name" class="form-control form-control">
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label"> {{__('Status')}} <span class="text-danger">( * )</span></label>
                                          <select id="status" name="status" class="form-control select2">
                                              <option disabled>{{__('Select')}}</option>
                                              <option value="1"> {{__('Avaible')}}</option>
                                              <option value="2"> {{__('No Availble')}}</option>
                                          </select>
                                        </div>
          
                                        <div class="form-group">
                                            <label for="price" class="control-label"> {{__('SGD Price')}}</label>
                                            <input id="price_sgd" name="price_sgd" type="text" placeholder="Exp : $101 SGD / MONTH" class="form-control form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                          <label for="price" class="control-label"> {{__('Upload image')}}</label>
                                          <div class="input-group control-group increment" >
                                            <input type="file" name="image[]" class="form-control">
                                            <div class="input-group-append"> 
                                              <button class="btn btn-soft-success btn-add-img" type="button"><i class="las la-plus"></i></button>
                                            </div>
                                          </div>
                                          <div class="clone hide">
                                            <div class="control-group input-group" style="margin-top:10px">
                                              <input type="file" name="image[]" class="form-control">
                                              <div class="input-group-append"> 
                                                <button class="btn btn-soft-danger btn-rm-img" type="button"><i class="las la-trash"></i> </button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label for="price" class="control-label"> {{__('Add Amneties')}}</label>
                                          <div class="input-group control-group increment-amneties" >
                                            <input type="text" placeholder="Exp : Towel/ Mineral Water/ Etc" name="amneties[]" class="form-control">
                                            <div class="input-group-append"> 
                                              <button class="btn btn-soft-success btn-add-amneties" type="button"><i class="las la-plus"></i></button>
                                            </div>
                                          </div>
                                          <div class="clone-amneties hide">
                                            <div class="control-group input-group" style="margin-top:10px">
                                              <input type="text" name="amneties[]" placeholder="Exp : Towel/ Mineral Water/ Etc" class="form-control">
                                              <div class="input-group-append"> 
                                                <button class="btn btn-soft-danger btn-rm-amneties" type="button"><i class="las la-trash"></i> </button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                                                                  
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label"> {{__('Category')}}</label>
                                            <select id="category" name="category" class="form-control select2">
                                                <option disabled>{{__('Select')}}</option>
                                                <option value="1"> {{__('Bintan Industrial Estate')}}</option>
                                                <option value="2"> {{__('Bintan Inti Executive Village')}}</option>
                                            </select>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="tag" class="">{{__('Apps')}}Tag</label>
                                            <input id="tag" name="tag" type="text" class="form-control form-control">
                                        </div> --}}
                                        <div class="form-group">
                                          <label for="price" class=""> {{__('SGD Price')}}</label>
                                          <input id="price_idr" name="price_idr" type="text" placeholder="Exp :IDR 250K / NIGHT" class="form-control form-control">
                                      </div>

                                      <div class="form-group">
                                        <label for="price" class="control-label"> {{__('Add Property Features')}}</label>
                                        <div class="input-group control-group increment-property" >
                                          <input type="text" placeholder="Exp : AC Rooms" name="property[]" class="form-control">
                                          <div class="input-group-append"> 
                                            <button class="btn btn-soft-success btn-add-property" type="button"><i class="las la-plus"></i></button>
                                          </div>
                                        </div>
                                        <div class="clone-property hide">
                                          <div class="control-group input-group" style="margin-top:10px">
                                            <input type="text" name="property[]" placeholder="Exp : AC Rooms" class="form-control">
                                            <div class="input-group-append"> 
                                              <button class="btn btn-soft-danger btn-rm-property" type="button"><i class="las la-trash"></i> </button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                        <div class="form-group">
                                            <label for="productdesc" class="">{{__('Description')}}</label>
                                            <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="mr-1 btn btn-sm btn-primary">{{__('Save')}}</button>
                                <button type="submit" class="btn btn-sm btn-dark">{{__('Cancel')}}</button>
                            </form>
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
    {!! Html::script('assets/js/apps/ecommerce.js') !!}
    {!! Html::script('plugins/dropzone/dropzone.min.js') !!}
@endpush

@push('custom-scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $(".btn-add-img").click(function(){ 
        var html = $(".clone").html();
        $(".increment").after(html);
    });
    $("body").on("click",".btn-rm-img",function(){ 
        $(this).parents(".control-group").remove();
    });

    // property
    $(".btn-add-property").click(function(){ 
        var html = $(".clone-property").html();
        $(".increment-property").after(html);
    });
    $("body").on("click",".btn-rm-property",function(){ 
        $(this).parents(".control-group").remove();
    });

    // amneties
    $(".btn-add-amneties").click(function(){ 
        var html = $(".clone-amneties").html();
        $(".increment-amneties").after(html);
    });
    $("body").on("click",".btn-rm-amneties",function(){ 
        $(this).parents(".control-group").remove();
    });

  });
</script>
@endpush

@extends('layouts.master')

@push('plugin-styles')
{!! Html::style('assets/css/loader.css') !!}
{!! Html::style('plugins/dropify/dropify.min.css') !!}
{!! Html::style('assets/css/pages/profile_edit.css') !!}
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
                              <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Dashboard')}}</a></li>
                              <li class="breadcrumb-item active" aria-current="page"><span>{{__('Profile')}}</span></li>
                          </ol>
                      </nav>
                  </div>
              </li>
          </ul>
      </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->

    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
      <div class="account-settings-container layout-top-spacing">
          <div class="account-content">
              <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                  <div class="row">
                      <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                          <div id="general-info" class="section general-info">
                              <div class="info">
                                  <div class="d-flex mt-2">
                                      <div class="profile-edit-left">
                                          <div class="tab-options-list">
                                              <div class="nav flex-column nav-pills mb-sm-0 mb-3   text-center mx-auto" id="v-border-pills-tab" role="tablist" aria-orientation="vertical">
                                                  <a class="nav-link active" id="v-border-pills-general-tab" data-toggle="pill" href="#v-border-pills-general" role="tab" aria-controls="v-border-pills-general" aria-selected="true"><i class="las la-info"></i> {{__('User Information')}}</a>
                                                  <a class="nav-link  text-center" id="v-border-pills-about-tab" data-toggle="pill" href="#v-border-pills-about" role="tab" aria-controls="v-border-pills-about" aria-selected="false"><i class="las la-key"></i> {{__('Update Password')}}</a>
                                                  <a class="nav-link  text-center" id="v-border-pills-domain-tab" data-toggle="pill" href="#v-border-pills-domain" role="tab" aria-controls="v-border-pills-domain" aria-selected="false"><i class="las la-graduation-cap"></i> {{__('Biodata')}}</a>
                                                  <a class="nav-link  text-center" id="v-border-pills-contact-tab" data-toggle="pill" href="#v-border-pills-contact" role="tab" aria-controls="v-border-pills-contact" aria-selected="false"><i class="las la-phone"></i> {{__('Contact')}}</a>

                                              </div>
                                          </div>
                                          {{-- <div class="mt-3">
                                              <button class="btn btn-dark btn-sm">{{__('Reset All')}}</button>
                                              <div class="blockui-growl-message">
                                                  <i class="flaticon-double-check"></i>&nbsp; {{__('Settings Saved Successfully')}}
                                              </div>
                                              <button id="multiple-messages" class="btn btn-primary btn-sm">{{__('Save')}}</button>
                                          </div> --}}
                                      </div>
                                      <div class="profile-edit-right">
                                          <div class="tab-content" id="v-border-pills-tabContent">
                                              <div class="tab-pane fade show active" id="v-border-pills-general" role="tabpanel" aria-labelledby="v-border-pills-general-tab">
                                                  <div class="row">
                                                      <div class="col-xl-3 col-lg-12 col-md-12">
                                                        <form class="form_update_ava" id="form_update_ava">
                                                          <div class="upload text-center img-thumbnail">
                                                              <input type="file" id="input-file-max-fs" class="dropify" data-default-file="{{asset('storage/profile/'.Auth::user()->image)}}" data-max-file-size="2M" />
                                                              <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> {{__('Upload Picture')}}</p>
                                                              <input type="submit" value="Save" class="btn bg-gradient-warning font-10 btn-block text-white"/>
                                                          </div>
                                                        </form>
                                                          
                                                      </div>
                                                      <div class="col-xl-9 col-lg-12 col-md-12 mt-md-0 mt-4">
                                                          <div class="form">
                                                              <div class="row">
                                                                  <div class="col-sm-6">
                                                                      <div class="form-group">
                                                                          <label for="fullName">{{__('Full Name')}}</label>
                                                                          <input type="text" class="form-control mb-4" placeholder="{{__('Full Name')}}" value="{{Auth::user()->name}}">
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-sm-6">
                                                                      <label class="dob-input spl-left">{{__('Date of Birth')}}</label>
                                                                      <div class="d-sm-flex d-block">
                                                                          <div class="form-group mr-1">
                                                                              <select class="form-control" >
                                                                                  <option>{{__('Day')}}</option>
                                                                                  {{-- @for ($i=0; $i<31; $i++)
                                                                                  <option>{{ i++; }}</option>
                                                                                  @endfor --}}
                                                                                  @for ($i = 1; $i < 32; $i++)
                                                                                  <option>{{ $i }}</option>
                                                                                  @endfor
                                                                                  
                                                                                  
                                                                              </select>
                                                                          </div>
                                                                          <div class="form-group mr-1">
                                                                              <select class="form-control">
                                                                                  <option>{{__('Month')}}</option>
                                                                                  <option>{{__('Jan')}}</option>
                                                                                  <option>{{__('Feb')}}</option>
                                                                                  <option>{{__('Mar')}}</option>
                                                                                  <option>{{__('Apr')}}</option>
                                                                                  <option>{{__('May')}}</option>
                                                                                  <option>{{__('Jun')}}</option>
                                                                                  <option>{{__('Jul')}}</option>
                                                                                  <option>{{__('Aug')}}</option>
                                                                                  <option selected>{{__('Sep')}}</option>
                                                                                  <option>{{__('Oct')}}</option>
                                                                                  <option>{{__('Nov')}}</option>
                                                                                  <option>{{__('Dec')}}</option>
                                                                              </select>
                                                                          </div>
                                                                          <div class="form-group mr-1">
                                                                              <select class="form-control">
                                                                                  <option>{{__('Year')}}</option>
                                                                                  @for ($i=1945;$i< now()->year;$i++)
                                                                                    <option>{{ $i }}</option>
                                                                                  @endfor
                                                                                  
                                                                              </select>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <div class="form-group">
                                                                  <label for="profession">{{__('Job Section')}}</label>
                                                                  <input type="text" class="form-control mb-4" placeholder="{{__('Job Section')}}" value="{{Auth::user()->section}}">
                                                              </div>

                                                              <div class="form-group">
                                                                <label for="profession">{{__('Department')}}</label>
                                                                <select class="form-control">
                                                                  <option> --Select here -- </option>
                                                                  @foreach ($dept as $list)
                                                                    <option id="{{ $list->id }}" @if ($list->id == Auth::user()->id_department)
                                                                      {{ __('selected') }}
                                                                    @endif>{{ $list->name }}</option>                                                                    
                                                                  @endforeach
                                                                </select>
                                                              </div>

                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="tab-pane fade" id="v-border-pills-about" role="tabpanel" aria-labelledby="v-border-pills-about-tab">
                                                  <div class="row">
                                                      <div class="col-md-12">
                                                          <div class="form-group">
                                                              <label for="aboutBio">{{__('Password')}}</label>
                                                              <input type="password" name="current_password" class="form-control" id="old_pass" placeholder="Old Password" autocomplete="current-password"/>
                                                          </div>

                                                          <div class="form-group">
                                                            <label for="aboutBio">{{__('New Password')}}</label>
                                                            <input type="password" name="new_password" class="form-control" id="new_pass" placeholder="New Password" autocomplete="current-password"/>
                                                          </div>
                                                          <div class="form-group">
                                                            <label for="aboutBio">{{__('Confimn Password')}}</label>
                                                            <input type="password" name="new_confirm_password" class="form-control" id="old_pass" placeholder="Confirm Password" autocomplete="current-password"/>
                                                          </div>

                                                          <input type="submit" class="btn bg-gradient-success font-15 btn-block text-white" value="Update Password"/>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="tab-pane fade" id="v-border-pills-domain" role="tabpanel" aria-labelledby="v-border-pills-domain-tab">
                                                  <div class="row">
                                                      <div class="col-md-12 text-right mb-2">
                                                          <button class="btn btn-primary btn-sm">{{__('Add +')}}</button>
                                                      </div>
                                                      <div class="col-md-12">
                                                          <div class="platform-div">
                                                              <div class="form-group">
                                                                  <label for="platform-title">{{__('Name')}}</label>
                                                                  <input type="text" class="form-control mb-4" placeholder="{{__('Name')}}" value="{{__('Data Analyst')}}">
                                                              </div>
                                                              <div class="form-group">
                                                                  <label for="platform-description">{{__('Description')}}</label>
                                                                  <textarea class="form-control mb-4" placeholder="{{__('Platforms Description')}}" rows="10">{{__('A Data Analyst interprets data and turns it into information which can offer ways to improve a business, thus affecting business decisions. Data Analysts gather information from various sources and interpret patterns and trends – as such a Data Analyst job description should highlight the analytical nature of the role.')}}</textarea>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="tab-pane fade" id="v-border-pills-contact" role="tabpanel" aria-labelledby="v-border-pills-contact-tab">
                                                  <div class="row">
                                                      <div class="col-md-12">
                                                          <div class="row">
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label for="country">{{__('Country')}}</label>
                                                                      <select class="form-control">
                                                                          <option>{{__('All Countries')}}</option>
                                                                          <option selected>{{__('United States')}}</option>
                                                                          <option>{{__('Uruguay')}}</option>
                                                                          <option>{{__('Argentina')}}</option>
                                                                          <option>{{__('France')}}</option>
                                                                          <option>{{__('Italy')}}</option>
                                                                          <option>{{__('India')}}</option>
                                                                          <option>{{__('Japan')}}</option>
                                                                          <option>{{__('Turkey')}}</option>
                                                                          <option>{{__('Russia')}}</option>
                                                                      </select>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label for="address">{{__('Address')}}</label>
                                                                      <input type="text" class="form-control mb-4" placeholder="{{__('Address')}}" value="" >
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label for="location">{{__('Location')}}</label>
                                                                      <input type="text" class="form-control mb-4" placeholder="{{__('Location')}}">
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label for="phone">{{__('Phone')}}</label>
                                                                      <input type="text" class="form-control mb-4" placeholder="{{__('Write your phone number here')}}" value="{{__('+1 (000) 125-45854')}}">
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label for="email">{{__('Email')}}</label>
                                                                      <input type="text" class="form-control mb-4" placeholder="{{__('Write your email here')}}" value="{{__('sara@gmail.com')}}">
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label for="website1">{{__('Website')}}</label>
                                                                      <input type="text" class="form-control mb-4" placeholder="{{__('Write your website here')}}" value="{{__('www.demowebsite.com')}}">
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
    {!! Html::script('plugins/dropify/dropify.min.js') !!}
    {!! Html::script('assets/js/pages/profile_edit.js') !!}
@endpush

@push('custom-scripts')
<script>
  $('#OpenImgUpload').click(function(){ $('#imgupload').trigger('click'); });
</script>
@endpush

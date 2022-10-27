<header class="header navbar navbar-expand-sm">
    <ul class="navbar-item theme-brand flex-row  text-center">
        <li class="nav-item theme-logo">
            <a href="{{ route('dashboard') }}">
                <img src="{{ URL::asset('frontend/img/logo.png') }}" class="navbar-logo" alt="logo">
            </a>
        </li>
        <li class="nav-item theme-text">
            <a href="{{ route('dashboard') }}" class="nav-link">BIG DATA</a>
        </li>
    </ul>
    <ul class="navbar-item flex-row ml-md-0 ml-auto">
        {{-- search --}}
        <li class="nav-item align-self-center search-animated">
            <i class="las la-search toggle-search"></i>
            <form class="form-inline search-full form-inline search" action="{{ url('/pages/search-result') }}" role="search">
                <div class="search-bar">
                    <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder=" {{__('Search here')}}">
                </div>
            </form>
        </li>


        {{-- Mega menu --}}
        {{-- <li class="nav-item dropdown language-dropdown d-none d-lg-flex">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle d-flex align-center text-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               {{ __('Mega Menu')}} <i class="las la-angle-down font-11 ml-1"></i>
            </a>
            <div class="dropdown-menu megamenu">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="font-17 mt-0"> {{ __('Applications')}}</h5>
                                <ul class="list-unstyled megamenu-list">
                                    <li class="font-15 mb-1"><a href="{{ url('/apps/ecommerce/dashboard') }}"> {{ __('Ecommerce')}} </a></li>
                                    <li class="font-15 mb-1"><a href="{{ url('/apps/chat') }}"> {{ __('Chat')}}</a></li>
                                    <li class="font-15 mb-1"><a href="{{ url('/apps/email/inbox') }}">{{ __('Email')}}</a></li>
                                    <li class="font-15 mb-1"><a href="{{ url('/apps/file-manager') }}">{{ __('File Manager')}}</a></li>
                                    <li class="font-15 mb-1"><a href="{{ url('/apps/calendar') }}">{{ __('Calender')}}</a></li>
                                    <li class="font-15 mb-1"><a href="{{ url('/apps/notes/list') }}"> {{ __('Notes')}}</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5 class="font-17 mt-0">{{ __('Extra Pages')}}</h5>
                                <ul class="list-unstyled megamenu-list">
                                    <li class="font-15 mb-1"><a href="{{ url('/pages/contact-us') }}">{{ __('Contact Us')}}</a></li>
                                    <li class="font-15 mb-1"><a href="{{ url('/pages/faq') }}">{{ __('FAQ')}}</a></li>
                                    <li class="font-15 mb-1"><a href="{{ url('/pages/helpdesk') }}">{{ __('Helpdesk')}}</a></li>
                                    <li class="font-15 mb-1"><a href="{{ url('/pages/pricing2') }}">{{ __('Pricing')}}</a></li>
                                    <li class="font-15 mb-1"><a href="{{ url('/pages/search-result') }}">{{ __('Search Result')}}</a></li>
                                    <li class="font-15 mb-1"><a href="{{ url('/pages/privacy-policy') }}">{{ __('Privacy Policy')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-lg-1">
                            <div class="row no-gutters">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="{{ url('assets/img/company-1.jpg') }}" alt="slack">
                                        <span>Cube</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="{{ url('assets/img/company-2.jpg') }}" alt="Github">
                                        <span>HTech</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="{{ url('assets/img/company-3.jpg') }}" alt="dribbble">
                                        <span>Inovation</span>
                                    </a>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="{{ url('assets/img/company-4.jpg') }}" alt="bitbucket">
                                        <span>Circle</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="{{ url('assets/img/company-5.jpg') }}" alt="dropbox">
                                        <span>Techno</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="{{ url('assets/img/company-6.jpg') }}" alt="G Suite">
                                        <span>T Logy</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li> --}}


    </ul>
    <ul class="navbar-item flex-row ml-md-auto">
        <!-- Using Switch option -->
        <!--<li class="nav-item dropdown fullscreen-dropdown">
            <div class="switch-container mb-0 pl-0">
                <label class="switch">
                    <input id="theme-switch" type="checkbox">
                    <span class="slider round primary-switch"></span>
                </label>
                <p class="ml-3 text-dark">Dark</p>
            </div>
        </li>-->
        <li class="nav-item dropdown  fullscreen-dropdown">
            <a class="nav-link night-light-mode"  href="javascript:void(0);">
                <i class="las la-moon"id="darkModeIcon"></i>
            </a>
        </li>
        <li class="nav-item dropdown fullscreen-dropdown d-none d-lg-flex">
            <a class="nav-link full-screen-mode" href="javascript:void(0);">
                <i class="las la-compress" id="fullScreenIcon"></i>
            </a>
        </li>
        
        
        {{-- <li class="nav-item dropdown notification-dropdown">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle position-relative" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="las la-bell"></i>
                <div class="blink">
                    <div class="circle"></div>
                </div>
            </a>
            <div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
                <div class="nav-drop is-notification-dropdown" >
                    <div class="inner">
                        <div class="nav-drop-header">
                            <span class="text-black font-12 strong">{{ __('5 Notifications') }}</span>
                            <a class="text-muted font-12" href="#">
                                {{ __('Clear All') }}
                            </a>
                        </div>
                        <div class="nav-drop-body account-items pb-0">
                            <a class="account-item" href="{{ url('/apps/ecommerce/orders') }}">
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-box font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong">{{ __('2 New orders placed') }}</h6>
                                        <p class="m-0 mt-1 font-10 text-muted"> {{__('10 sec ago')}}</p>
                                    </div>
                                </div>
                            </a>
                            <a class="account-item" href="javascript:void(0)">
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-user-plus font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong"> {{ __('New User registered') }}</h6>
                                        <p class="m-0 mt-1 font-10 text-muted"> {{ __('5 minute ago') }}</p>
                                    </div>
                                </div>
                            </a>
                            <a class="account-item" href="{{ url('/apps/tickets/list') }}">
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-grin-beam font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong">{{ __('21 Queries solved') }}</h6>
                                        <p class="m-0 mt-1 font-10 text-muted"> {{ __('1 hour ago') }}</p>
                                    </div>
                                </div>
                            </a>
                            <a class="account-item" href="javascript:void(0)">
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-cloud-download-alt font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong"> {{ __('New update available') }}</h6>
                                        <p class="m-0 mt-1 font-10 text-muted"> {{ __('1 day ago') }}</p>
                                    </div>
                                </div>
                            </a>
                            <hr class="account-divider">
                            <div class="text-center">
                                <a class="text-primary strong font-13" href="{{ url('/pages/notifications') }}"> {{__('View All')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li> --}}
        <li class="nav-item dropdown user-profile-dropdown">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <img src="{{asset('storage/profile/'.Auth::user()->image)}}" alt="avatar">
            </a>
            <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                <div class="nav-drop is-account-dropdown" >
                    <div class="inner">
                        <div class="nav-drop-header">
                            <span class="text-primary font-15">{{ __('Welcome') }} {{ auth()->user()->name }} !</span>
                        </div>
                        <div class="nav-drop-body account-items pb-0">
                            <a id="profile-link"  class="account-item" href="{{ url('/pages/profile') }}">
                                <div class="media align-center">
                                    <div class="media-left">
                                        <div class="image">
                                            <img class="rounded-circle avatar-xs" src="{{asset('storage/profile/'.Auth::user()->image)}}" alt="">
                                        </div>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong">{{ Auth()->user()->name }}</h6>
                                        <small>{{ Auth()->user()->email }}</small>
                                    </div>
                                    <div class="media-right">
                                        <i data-feather="check"></i>
                                    </div>
                                </div>
                            </a>
                            <a class="account-item" href="{{ url('/pages/profile') }}">
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-user font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong"> {{ __('My Account') }}</h6>
                                    </div>
                                </div>
                            </a>
                            {{-- <a class="account-item" href="{{ url('/pages/timeline') }}">
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-briefcase font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong">{{ __('My Activity') }}</h6>
                                    </div>
                                </div>
                            </a> --}}
                            <a class="account-item settings">
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-cog font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong">{{ __('Settings') }}</h6>
                                    </div>
                                </div>
                            </a>
                           
                            <hr class="account-divider">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                            <a class="account-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            this.closest('form').submit();">
                                <div class="media align-center">
                                    
                                    <div class="icon-wrap">
                                        <i class="las la-sign-out-alt font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                            <h6 class="font-13 mb-0 strong ">{{ __('Logout') }}</h6>    
                                    </div>
                                </div>
                            </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <ul class="navbar-item flex-row">
        {{-- <li class="nav-item dropdown header-setting">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle rightbarCollapse" data-placement="bottom">
                <i class="las la-sliders-h"></i>
            </a>
        </li> --}}
    </ul>
</header>

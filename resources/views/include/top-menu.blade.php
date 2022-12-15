<nav id="sidebar">
    <ul class="list-unstyled menu-categories" id="accordionExample">
        <li class="menu {{ active_class(['/']) }} main-single-menu">
            <a href="{{ route('dashboard') }}" class="dropdown-toggle"  aria-expanded="true">
                <div href="#dashboard" class="dropdown-toggle">
                    <i class="las la-home"></i>
                    <span>{{__('Dashboards')}}</span>
                </div>
                
            </a>
            
        </li>
        <li class="menu {{ active_class(['gmo/*']) }} main-single-menu">
            <a href="#" class="dropdown-toggle collapsed" data-toggle="collapse" aria-expanded="false">
                <div class="">
                    <i class="las la-file-code"></i>
                    <span>{{__('IT & MEDIA')}}</span>
                </div>
                @can('approve - request')
                    @if ($it_request_notif >0)
                        <div class="menu-badge-container">
                            <span class="menu-badge badge-danger">{{$it_request_notif}}</span>
                        </div>                    
                    @endif
                @endcan
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>
            
            <ul class="collapse submenu list-unstyled" id="apps" data-parent="#accordionExample">
                <li class=" {{ active_class(['gmo/it_request']) }}">
                    <a data-active="{{ is_active_route(['gmo/it_request']) }}" href="{{ url('/gmo/it_request') }}"> {{__('Form IT Request')}} </a>
                </li>
                @can('approve - request')
                    <li class=" {{ active_class(['gmo/it_request/approve_list']) }}">
                        <a data-active="{{ is_active_route(['gmo/it_request/approve_list']) }}" href="{{ route('gmo.it_request.approve_list') }}"> 
                            {{__('Approve Request')}} 
                            @if ($it_request_notif >0)
                                <div class="menu-badge-container">
                                    <span class="menu-badge badge-danger">{{$it_request_notif}}</span>
                                </div>
                            @endif
                        </a>
                        
                    </li>
                @endcan
                
                @can('itlist-manage')
                    <li class=" {{ active_class(['gmo/list_request']) }}">
                        <a data-active="{{ is_active_route(['gmo/list_request']) }}" href="{{ url('/gmo/list_request') }}"> {{__('List Request User')}} </a>
                    </li>

                    <li class=" {{ active_class(['gmo/it_request/chart']) }}">
                        <a data-active="{{ is_active_route(['gmo/it_request/chart']) }}" href="{{ url('/gmo/it_request/chart') }}"> {{__('Report Monthly Request')}} </a>
                    </li>

                    <li class=" {{ active_class(['gmo/list']) }}">
                        <a data-active="{{ is_active_route(['gmo/list']) }}" href="{{ route('gmo.list') }}"> {{__('Add List')}} </a>
                    </li>
                    {{-- <li class=" {{ active_class(['gmo']) }}">
                        <a data-active="{{ is_active_route(['gmo']) }}" href="{{ url('/gmo') }}"> {{__('Add document')}} </a>
                    </li>
                   
                    <li class=" {{ active_class(['apps/contacts']) }}">
                        <a data-active="{{ is_active_route(['apps/contacts']) }}" href="#"> {{__('IT File')}} </a>
                    </li>
    
                    <li class=" {{ active_class(['apps/contacts']) }}">
                        <a data-active="{{ is_active_route(['apps/contacts']) }}" href="#"> {{__('IT Request Download')}} </a>
                    </li>   --}}
                @endcan              
            </ul>
            
        </li>
        <li class="menu {{ active_class(['estate/*']) }} main-single-menu">
            <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                <div class="">
                    <i class="las la-pencil-ruler"></i>
                    <span>{{__('EST')}}</span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>

            <ul class="collapse submenu list-unstyled" id="pages" data-parent="#accordionExample">
                @if ( Auth::user()->hasRole('est building') || Auth::user()->hasRole('admin'))

                <li class="menu {{ active_class(['estate/list/*'])  }}">
                    <a href="#other_pages_one" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                        <div class="">
                            <span>{{__('Building')}}</span>
                        </div>
                        <div>
                            <i class="las la-angle-right sidemenu-right-icon"></i>
                        </div>
                    </a>
                    <ul class="collapse list-unstyled sub-submenu" id="other_pages_one" data-parent="#pages">
                        <li class=" {{ active_class(['estate/list/factory']) }}">
                            <a data-active="{{ is_active_route(['estate/list/factory']) }}" href="{{ url('/estate/list/factory') }}"> {{__('Building Status')}} </a>
                        </li>
                        <li class=" {{ active_class(['estate']) }}">
                            <a data-active="{{ is_active_route(['estate']) }}" href="{{ url('/estate') }}"> {{__('Add Drawing Building')}} </a>
                        </li>
                        <li class=" {{ active_class(['estate/file/folder']) }}">
                            <a data-active="{{ is_active_route(['estate/file/folder']) }}" href="{{ url('/estate/file/folder') }}"> {{__('Drawing Folder')}} </a>
                        </li>
                        
                    </ul>
                </li>

                
                @endif
                <li class="menu {{ active_class(['estate/utilities/*'])  }}">
                    <a href="#other_pages_one" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                        <div class="">
                            <span>{{__('Power House')}}</span>
                        </div>
                        <div>
                            <i class="las la-angle-right sidemenu-right-icon"></i>
                        </div>
                    </a>
                    <ul class="collapse list-unstyled sub-submenu" id="other_pages_one" data-parent="#pages">
                        <li>
                            <a href="{{ url('/estate/power/status') }}"> {{__('Utilities list')}} </a>
                        </li>
                        <li class="{{ active_class('estate/utilities/status') }}">
                            <a data-active="{{ is_active_route(['estate/utilities/status']) }}" href="{{ url('/estate/utilities/status') }}"> {{__('Drawing File')}}</a>
                        </li>
                        <li class="{{ active_class('estate/utilities/status') }}">
                            <a data-active="{{ is_active_route(['estate/utilities/status']) }}" href="{{ url('/estate/utilities/status') }}"> {{__('Water')}}</a>
                        </li>
                        
                    </ul>
                </li>

                <li class="menu {{ active_class(['estate/water/*'])  }}">
                    <a href="#other_pages_one" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                        <div class="">
                            <span>{{__('Water Section')}}</span>
                        </div>
                        <div>
                            <i class="las la-angle-right sidemenu-right-icon"></i>
                        </div>
                    </a>
                    <ul class="collapse list-unstyled sub-submenu" id="other_pages_one" data-parent="#pages">
                        
                        <li class="{{ active_class('estate/water/water_list') }}">
                            <a data-active="{{ is_active_route(['estate/water/water_list']) }}" href="{{ url('/estate/water/water_list') }}"> {{__('Water List')}}</a>
                        </li>
                        <li class="{{ active_class('estate/utilities/status') }}">
                            <a data-active="{{ is_active_route(['estate/utilities/status']) }}" href="{{ url('/estate/utilities/status') }}"> {{__('Drawing File')}}</a>
                        </li>
                        
                    </ul>
                </li>
                
                
            </ul>
        </li>

       
        <li class="menu {{ active_class(['crs/*']) }} main-single-menu">
            <a href="#mapscharts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="las la-file-alt"></i>
                    <span>CRS</span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>

            <ul class="collapse submenu list-unstyled" id="starter-kit" data-parent="#accordionExample">
                @if ( Auth::user()->hasRole('crs') || Auth::user()->hasRole('admin'))
                <li class=" {{ active_class(route('crs')) }}">
                    <a data-active="{{ is_active_route(['crs/index']) }}" href="{{ route('crs') }}"> {{__('CRS Database')}} </a>
                </li>
                @endif
                <li class=" {{ active_class(route('crs.alltenant')) }}">
                    <a data-active="{{ is_active_route(['crs/alltenant']) }}" href="{{ route('crs.alltenant') }}"> {{__('All Tenant')}} </a>
                </li>

            </ul>
        </li>
       
        
        <li class="menu {{ active_class(['hrga/*']) }} main-single-menu">
            <a href="#mapscharts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="las la-globe-americas"></i>
                    <span> {{__('HR & GA')}}</span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled" id="mapscharts" data-parent="#accordionExample">
                <li class="menu {{ active_class(['hrga/*']) }}">
                    <a href="{{ url('/hrga/employee') }}"  aria-expanded="false" >
                        <div class="">
                            <span> {{__('General Affair')}}</span>
                        </div>
                        
                    </a>
                    
                </li>
                
            </ul>
        </li>
        <li class="menu {{ active_class(['aml/*']) }} main-single-menu">
            <a href="#starter-kit" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="la la-balance-scale"></i>
                    <span> {{__('AML')}}</span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled" id="starter-kit" data-parent="#accordionExample">
                <li class=" {{ active_class(route('aml.perizinan')) }}">
                    <a data-active="{{ is_active_route(['aml/prizinan']) }}" href="{{ route('aml.perizinan') }}"> {{__('Contract & Permit')}} </a>
                </li>
                
            </ul>
        </li>
        <li class="menu {{ active_class(['ims/*']) }} main-single-menu">
            <a href="#" aria-expanded="false" data-toggle="collapse" class="dropdown-toggle">
                <div class="">
                    <i class="lab la-medapps"></i>
                    <span>
                        IMS 
                    </span> 
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>

            <ul class="collapse submenu list-unstyled" id="mapscharts" data-parent="#accordionExample">
                <li class="menu {{ active_class(['ims/master-doc/*']) }}">
                    <a href="#maps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <span> {{__('Master Document')}}</span>
                        </div>
                        <div>
                            <i class="las la-angle-right sidemenu-right-icon"></i>
                        </div>
                    </a>
                    <ul class="collapse list-unstyled sub-submenu" id="maps" data-parent="#mapscharts">
                        <li class="menu {{ active_class(['ims/master-doc/file_doc']) }}">
                            <a data-active="{{ is_active_route(['ims/master-doc/file_doc']) }}" href="{{ url('/ims/master-doc/file_doc') }}"> {{__('Master Document File')}} </a>
                        </li>
                        <li class="menu {{ active_class(['ims/external-doc']) }}">
                            <a data-active="{{ is_active_route(['ims/external-doc']) }}" href="{{ url('/ims/external-doc') }}"> {{__('External Document')}} </a>
                        </li>
                        @if ( Auth::user()->hasRole('ims') || Auth::user()->hasRole('admin'))

                            <li class="menu {{ active_class(['ims/master-doc/add_doc']) }}">
                                <a data-active="{{ is_active_route(['ims/master-doc/add_doc']) }}" href="{{ url('/ims/master-doc/add_doc') }}"> {{__('Add Internal Document')}} </a>
                            </li>
                            <li class="menu {{ active_class(['ims/master-doc/request-access']) }}">
                                <a data-active="{{ is_active_route(['ims/master-doc/request-access']) }}" href="{{ url('/ims/master-doc/request-access') }}"> {{__('Request')}}
                                    @if ($ims_req > 0)
                                        <span class="badge badge-sm badge-danger">{{ $ims_req }}</span>
                                    @endif 
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                <li class="menu {{ active_class(['maps-charts/charts/*']) }}">
                    <a href="#charts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <span> {{__('Car Logs')}}</span>
                        </div>
                        <div>
                            <i class="las la-angle-right sidemenu-right-icon"></i>
                        </div>
                    </a>
                    <ul class="collapse list-unstyled sub-submenu" id="charts" data-parent="#mapscharts">
                        <li class=" {{ active_class(['maps-charts/charts/apex-chart']) }}">
                            <a data-active="{{ is_active_route(['maps-charts/charts/apex-chart']) }}" href="#"> {{__('Comming Soon')}} </a>
                        </li>
                        <li class=" {{ active_class(['maps-charts/charts/chartlist-chart']) }}">
                            <a data-active="{{ is_active_route(['maps-charts/charts/chartlist-chart']) }}" href="#"> {{__('Comming Soon')}} </a>
                        </li>
                        
                    </ul>
                </li>
                <li class=" {{ active_class(['ims/calibration_record']) }}">
                    <a data-active="{{ is_active_route(['ims/calibration_record']) }}" href="{{ url('/ims/calibration_record') }}"> {{__('Calibration Record')}} </a>
                </li>
            </ul>

        </li>

        <li class="menu {{ active_class(['pod/*']) }} main-single-menu">
            <a href="{{ route('pod') }}" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="las la-torii-gate"></i>
                    <span>POD</span>
                </div>
            </a>
        </li>

        <li class="menu {{ active_class(['bdv/*']) }} main-single-menu">
            <a href="{{ route('bdv.spec') }}" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="las la-hotel"></i>
                    <span>BDV</span>
                </div>
            </a>
        </li>

        <li class="menu {{ active_class(['fin/*']) }} main-single-menu">
            <a href="{{ route('fin.procurement') }}" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="la la-dollar"></i>
                    <span>FIN</span>
                </div>
            </a>
        </li>

        <li class="menu {{ active_class(['cdd']) }} main-single-menu">
            <a href="{{ route('cdd') }}" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="la la-users"></i>
                    <span>CDD</span>
                </div>
            </a>
        </li>

        @if ( Auth::user()->hasRole('Env') || Auth::user()->hasRole('admin'))

        <li class="menu {{ active_class(['env/*','env']) }} main-single-menu">
            <a href="#starter-kit" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="la la-leaf"></i>
                    <span> {{__('ENV')}}</span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled" id="starter-kit" data-parent="#accordionExample">
                <li class=" {{ active_class(route('env')) }}">
                    <a data-active="{{ is_active_route(['env']) }}" href="{{ route('env') }}"> {{__('Environment Document')}} </a>
                </li>
                <li class=" {{ active_class(route('env.folder')) }}">
                    <a data-active="{{ is_active_route(['/env/folder']) }}" href="{{ route('env.folder') }}"> {{__('Environment Folder')}} </a>
                </li>
            </ul>
        </li>

        @endif

        @if ( Auth::user()->hasRole('hse') || Auth::user()->hasRole('admin'))
        <li class="menu {{ active_class(['hse/*']) }} main-single-menu">
            <a href="{{ route('hse') }}" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="las la-atom"></i>
                    <span>HSE</span>
                </div>
            </a>
        </li>
        @endif

        @if ( Auth::user()->hasRole('ssd') || Auth::user()->hasRole('admin') || Auth::user()->hasRole('ssd firesafty'))
        <li class="menu {{ active_class(['ssd/*']) }} main-single-menu">
            <a href="#" aria-expanded="false" data-toggle="collapse" class="dropdown-toggle">
                <div class="">
                    <i class="las la-user-shield"></i>
                    <span>SSD 
                    </span> 
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>

            <ul class="collapse submenu list-unstyled" id="mapscharts" data-parent="#accordionExample">
                
                <li class=" {{ active_class(['ssd/firesafety']) }}">
                    <a data-active="{{ is_active_route(['ssd/firesafety']) }}" href="{{ url('/ssd/firesafety') }}"> {{__('Fire Safety')}} </a>
                </li>

                <li class=" {{ active_class(['ssd/security']) }}">
                    <a data-active="{{ is_active_route(['ssd/security']) }}" href="{{ url('/ssd/security') }}"> {{__('Security')}} </a>
                </li>

            </ul>
        </li>
        @endif
       
    </ul>
</nav>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand  navbar-light">
  <a href="index3.html" class="navbar-brand">
    <img src="{{ URL::asset('frontend/img/logo.png') }}" alt="Bintan Inti Industrial Estate" class="brand-image  "
         style="opacity: .8">
    
  </a>
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
      </li>

      <li class="nav-item dropdown  <?php  if (request()->routeIs('gmo.*') || request()->routeIs('gmo')) {echo 'active';}?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           IT
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('gmo.list') }}"><i class="text-success fa fa-list nav-icon"></i> Add List</a>
          <a class="dropdown-item" href="{{ route('gmo') }}"><i class="text-success fa fa-check nav-icon"></i> Add Document</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-folder nav-icon"></i> GMO File</a>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-download nav-icon"></i> GMO Request</a>
        </div>
      </li>

      <li class="nav-item dropdown <?php  if (request()->routeIs('estate.*') || request()->routeIs('show')) {echo 'active';}?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           EST
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('estate.list') }}"><i class="text-success fa fa-list nav-icon"></i> Building Status</a>
          <a class="dropdown-item" data-toggle="dropdown" href="#"><i class="text-success fa fa-check nav-icon"></i> Utilities Status &raquo</a>
            <ul class="submenu dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('estate.power') }}">Power</a></li>
              <li><a class="dropdown-item" href="{{ route('estate.utilities') }}">Water</a></li>
            </ul>
            
          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('estate.file') }}"><i class="text-success fa fa-folder nav-icon"></i> EST File</a>
          <a class="dropdown-item" href="{{ route('estate.est-download') }}"><i class="text-success fa fa-download nav-icon"></i> EST Request</a>
        </div>
      </li>

      <li class="nav-item dropdown  <?php  if (request()->routeIs('env.*') || request()->routeIs('env')) {echo 'active';}?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           ENV
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="text-success fa fa-list nav-icon"></i> Add List</a>
          <a class="dropdown-item" href="{{ route('env') }}"><i class="text-success fa fa-check nav-icon"></i> Add Document</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('env.folder') }}"><i class="text-success fa fa-folder nav-icon"></i> ENV File</a>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-download nav-icon"></i> ENV Request</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           IMS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="text-success fa fa-list nav-icon"></i> Add List</a>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-check nav-icon"></i> Add Document</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-folder nav-icon"></i> IMS File</a>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-download nav-icon"></i> IMS Request</a>
        </div>
      </li>

      <li class="nav-item dropdown <?php  if (request()->routeIs('aml.*')) {echo 'active';}?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           AML
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('aml.perizinan') }}"><i class="text-success fa fa-list nav-icon"></i> Add List</a>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-check nav-icon"></i> Add Document</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-folder nav-icon"></i> AML File</a>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-download nav-icon"></i> AML Request</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           CDD
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="text-success fa fa-list nav-icon"></i> Add List</a>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-check nav-icon"></i> Add Document</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-folder nav-icon"></i> CDD File</a>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-download nav-icon"></i> CDD Request</a>
        </div>
      </li>

      <li class="nav-item dropdown <?php  if (request()->routeIs('hrga.*') || request()->routeIs('hrga')) {echo 'active';}?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           HRGA
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('hrga.employee') }}"><i class="text-success fa fa-list nav-icon"></i> Add List</a>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-check nav-icon"></i> Add Document</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-folder nav-icon"></i> HRGA File</a>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-download nav-icon"></i> HRGA Request</a>
        </div>
      </li>

      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           CRS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('crs') }}"><i class="text-success fa fa-list nav-icon"></i> Tenant</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-folder nav-icon"></i> CRS File</a>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-download nav-icon"></i> CRS Request</a>
        </div>
      </li>

      <li class="nav-item dropdown <?php  if (request()->routeIs('fin.*')) {echo 'active';}?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           FIN
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('fin.halal') }}"><i class="text-success fa fa-list nav-icon"></i> Add List</a>
          <a class="dropdown-item" href="#"><i class="fa fa-check nav-icon"></i> Add Document</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-folder nav-icon"></i> FIN File</a>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-download nav-icon"></i> FIN Request</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           POD
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="text-success fa fa-list nav-icon"></i> Add List</a>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-check nav-icon"></i> Add Document</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-folder nav-icon"></i> POD File</a>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-download nav-icon"></i> POD Request</a>
        </div>
      </li>

      <li class="nav-item dropdown <?php  if (request()->routeIs('ssd.*') || request()->routeIs('ssd')) {echo 'active';}?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           SSD
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="text-success fa fa-list nav-icon"></i> Add List</a>
          <a class="dropdown-item" href="{{ route('ssd') }}"><i class="text-success fa fa-check nav-icon"></i> Add Document</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-folder nav-icon"></i> SSD File</a>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-download nav-icon"></i> SSD Request</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           BDV
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="text-success fa fa-list nav-icon"></i> Add List</a>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-check nav-icon"></i> Add Document</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-folder nav-icon"></i> BDV File</a>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-download nav-icon"></i> BDV Request</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           HSE
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="text-success fa fa-list nav-icon"></i> Add List</a>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-check nav-icon"></i> Add Document</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-folder nav-icon"></i> HSE File</a>
          <a class="dropdown-item" href="#"><i class="text-success fa fa-download nav-icon"></i> HSE Request</a>
        </div>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      @role('admin')
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          @if ($allnotif > 0)
          <span class="badge badge-danger navbar-badge">{{ $allnotif }}</span>              
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{ $allnotif }} Notifications</span>
          
          <div class="dropdown-divider"></div>
            @if ($new_notif > 0)
              <a href="{{ route('department.index') }}" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> {{ $new_notif }} new Request
              </a>
              <div class="dropdown-divider"></div>
            @endif

            @if ($pending_notif > 0)
              <a href="{{ route('department.index') }}" class="dropdown-item">
                <i class="fas fa-users mr-2"></i>{{  $pending_notif}} Request Pending
                {{-- <span class="float-right text-muted text-sm">12 hours</span> 
              </a>
              <div class="dropdown-divider"></div>
              @endif

              @if ($req_notif > 0)
                <a href="{{ route('department.index') }}" class="dropdown-item">
                  <i class="fas fa-file mr-2"></i> {{ $req_notif }} Request On Progress
                </a>
                <div class="dropdown-divider"></div>
              @endif
          @if ($allnotif > 0)
          <a href="{{ route('department.index') }}" class="dropdown-item dropdown-footer">See All Notifications</a>
          @endif      
        </div>
      </li> --}}
      @endrole
      <li class="nav-item">
        <a class="nav-link <?php  if (request()->routeIs('profile') ) {echo 'active';} ?>" href="{{ route('profile') }}" role="button">
          <i class="fas fa-user"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
        <a class="nav-link" data-widget="fullscreen" href="<?php route('logout') ?>" onclick="event.preventDefault();
          this.closest('form').submit();" role="button">
          <i class="fas fa-power-off"></i>
        </a>
        </form> 
      </li>
      <li class="nav-item">
        <div class="theme-switch-wrapper nav-link">
           
            <label class="theme-switch custom-control custom-switch custom-switch-on-success" for="checkbox">
                <input type="checkbox" class="custom-control-input" id="checkbox" />
                <label class="custom-control-label" for="checkbox">Dark Mode</label>
            </label>
        </div>      
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
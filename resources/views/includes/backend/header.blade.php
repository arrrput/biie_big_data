<!-- Navbar -->
<nav class="main-header navbar navbar-expand  navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
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
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
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
<aside class="main-sidebar sidebar-light-success  elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link logo-switch">
      <img src="{{ URL::asset('frontend/img/logo.png') }}" alt="AdminLTE Docs Logo Large" class="brand-image-xl logo-xs">
      <img src="{{ URL::asset('frontend/img/logo.png') }}" alt="AdminLTE Docs Logo Large" class="brand-image-xs logo-xl" style="left: 12px">
      
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      {{-- <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ URL::asset('backend/img/ava.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link <?php  if (request()->routeIs('admin.index') || request()->routeIs('dashboard')) {echo 'active';}?> ">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          

          <li class="nav-item">
            <a href="{{ route('estate.index') }}" class="nav-link <?php  if (request()->routeIs('estate.*') || request()->routeIs('show')) {echo 'active';}?>">
              <i class="nav-icon fa fa-database"></i>
              <p>
                Estate    
              </p>
            </a>
          </li>
          @can('estate-request-download')
            <li class="nav-item">
              <a href="{{ route('request.download') }}" class="nav-link <?php  if (request()->routeIs('request.download') ) {echo 'active';}?>">
                <i class="nav-icon fas fa-download"></i>
                <p>
                  Request Download
                  <span class="right badge badge-danger">@if ($req_download > 0)
                    {{ $req_download }}
                  @endif</span>
                </p>
              </a>
            </li>
          @endcan
          @can('list-download')
          <li class="nav-item">
            <a href="{{ route('mylist.download') }}" class="nav-link <?php  if (request()->routeIs('mylist.download') ) {echo 'active';}?>">
              <i class="nav-icon fas fa-download"></i>
              <p>
                List Download
                
              </p>
            </a>
          </li>
            
          @endcan

          @role('admin')

          <li class="nav-header">Manage User</li>
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link <?php  if (request()->routeIs('users.*') ) {echo 'active';}?>">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                User Management
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link <?php  if (request()->routeIs('role.*') || request()->routeIs('roles.index') ) {echo 'active';}?>">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Roles
              </p>
            </a>
          </li>
          
          @endrole

          
          
          {{-- <li class="nav-item">
            <a href="{{ route('profile') }}" class="nav-link  @php  if (request()->routeIs('profile') ) {echo 'active';} @php">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User Profile
              </p>
            </a>
          </li> --}}
          
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
            <a href="<?php route('logout') ?>" class="nav-link" onclick="event.preventDefault();
              this.closest('form').submit();">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Sign Out
              </p>
              
            </a>
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
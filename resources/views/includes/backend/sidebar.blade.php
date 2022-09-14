<aside class="main-sidebar sidebar-light-success  elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link ">
      <img src="{{ URL::asset('frontend/img/logo.png') }}" alt="Bintan Inti Industrial Estate" class="brand-image elevation-0" style="opacity: .8">
      <span class="brand-text font-weight-light"><b> BIG DATA </b></span>
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
            <a href="{{ route('dashboard') }}" class="nav-link <?php  if (request()->routeIs('admin.index') || request()->routeIs('dashboard')) {echo 'active';}?> ">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          
          {{-- EST --}}
          <li class="nav-item has-treeview <?php  if (request()->routeIs('estate.*') || request()->routeIs('show')) {echo 'menu-open';}?>">
            <a href="#" class="nav-link <?php  if (request()->routeIs('estate.*') || request()->routeIs('show')) {echo 'active';}?>">
              <i class="nav-icon fa fa-database"></i>
              <p>
                  EST
                  @if (Auth::user()->id_department == '3' || Auth::user()->hasRole('admin'))
                    @if ($req_download > 0)
                      <span class="right badge bg-danger mr-5">News</span>
                    @endif 
                    
                  @endif
                  <i class="right fas fa-angle-left"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">

              
              @if (Auth::user()->id_department == 3 || Auth::user()->hasRole('admin'))
              <li class="nav-item">
                <a href="{{ route('estate.index') }}" class="nav-link <?php  if (request()->routeIs('estate.index')) {echo 'active';}?>">
                  <i class="fa fa-check nav-icon"></i>
                  <p>Add File</p>
                </a>
              </li>
              @endif
              

              <li class="nav-item">
                <a href="{{ route('estate.file') }}" class="nav-link <?php  if (request()->routeIs('estate.file')) {echo 'active';}?> ">
                  <i class="fa fa-folder nav-icon"></i>
                  <p>EST File</p>
                </a>
              </li>

              @can('estate-request-download')
              <li class="nav-item">
                <a href="{{ route('estate.est-download') }}" class="nav-link <?php  if (request()->routeIs('estate.est-download')) {echo 'active';}?>">
                  <i class="fa fa-download nav-icon "></i>
                  <p>EST Request </p>
                  @if ($req_download > 0)
                    <span class="right badge bg-danger">{{ $req_download }}</span>
                  @endif 
                </a>
              </li>
              @endcan
            </ul>
          </li>

          {{-- ENV --}}
          <li class="nav-item has-treeview <?php  if (request()->routeIs('env.*') || request()->routeIs('env')) {echo 'menu-open';}?>">
            <a href="#" class="nav-link <?php  if (request()->routeIs('env.*') || request()->routeIs('env')) {echo 'active';}?>">
              <i class="nav-icon fas fa-leaf"></i>
              <p>
                  ENV
                  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->id_department == 4 || Auth::user()->hasRole('admin'))
              <li class="nav-item">
                <a href="{{ route('env') }}" class="nav-link <?php  if (request()->routeIs('env') ) {echo 'active';}?>">
                  <i class="fa fa-check nav-icon"></i>
                  <p>Add File</p>
                </a>
              </li>
              @endif

              <li class="nav-item">
                <a href="{{ route('env.folder') }}" class="nav-link <?php  if (request()->routeIs('env.folder')) {echo 'active';}?>">
                  <i class="fa fa-folder nav-icon"></i>
                  <p>ENV File</p>
                </a>
              </li>
              @if (Auth::user()->id_department == 4 || Auth::user()->hasRole('admin'))
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-download nav-icon"></i>
                  <p>ENV Request</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          
          {{-- GMO --}}
          <li class="nav-item has-treeview <?php  if (request()->routeIs('gmo.*') || request()->routeIs('gmo')) {echo 'menu-open';}?>">
            <a href="#" class="nav-link <?php  if (request()->routeIs('gmo.*') || request()->routeIs('gmo')) {echo 'active';}?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                  GMO
                  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->id_department == 2  || Auth::user()->hasRole('admin'))
              <li class="nav-item">
                <a href="{{ route('gmo') }}" class="nav-link <?php  if (request()->routeIs('gmo')) {echo 'active';}?>">
                  <i class="fa fa-check nav-icon"></i>
                  <p>Add File</p>
                </a>
              </li>
              @endif

              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-folder nav-icon"></i>
                  <p>GMO File</p>
                </a>
              </li>

              @if (Auth::user()->id_department == 2 || Auth::user()->hasRole('admin'))
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-download nav-icon"></i>
                  <p>GMO Request</p>
                </a>
              </li>
              @endif

            </ul>
          </li>

          {{-- IMS --}}
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
              <p>
                  IMS
                  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-check nav-icon"></i>
                  <p>Add File</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-folder nav-icon"></i>
                  <p>GMO File</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-download nav-icon"></i>
                  <p>GMO Request</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- AML --}}
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-mail-bulk"></i>
              <p>
                  AML
                  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-check nav-icon"></i>
                  <p>Add File</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-folder nav-icon"></i>
                  <p>GMO File</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-download nav-icon"></i>
                  <p>GMO Request</p>
                </a>
              </li>
            </ul>
          </li>


           {{-- CDD --}}
           <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-fax"></i>
              <p>
                  CDD
                  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-check nav-icon"></i>
                  <p>Add File</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-folder nav-icon"></i>
                  <p>GMO File</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-download nav-icon"></i>
                  <p>GMO Request</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- HRD --}}
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>
                  HRD
                  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-check nav-icon"></i>
                  <p>Add File</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-folder nav-icon"></i>
                  <p>GMO File</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-download nav-icon"></i>
                  <p>GMO Request</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- POD --}}
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-ship"></i>
              <p>
                  POD
                  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-check nav-icon"></i>
                  <p>Add File</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-folder nav-icon"></i>
                  <p>GMO File</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-download nav-icon"></i>
                  <p>GMO Request</p>
                </a>
              </li>
            </ul>
          </li>


          {{-- SDD --}}
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link <?php  if (request()->routeIs('ssd.*') || request()->routeIs('ssd')) {echo 'active';}?>">
              <i class="nav-icon fas fa-shield-alt"></i>
              <p>
                  SSD
                  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->id_department == 5 || Auth::user()->hasRole('admin'))
              <li class="nav-item">
                <a href="{{ route('ssd') }}" class="nav-link ">
                  <i class="fa fa-check nav-icon"></i>
                  <p>Add File</p>
                </a>
              </li>
              @endif

              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-folder nav-icon"></i>
                  <p>SSD File</p>
                </a>
              </li>
              @if (Auth::user()->id_department == 5 || Auth::user()->hasRole('admin'))
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-download nav-icon"></i>
                  <p>SSD Request</p>
                </a>
              </li>
              @endif
            </ul>
          </li>

          {{-- BDV --}}
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                  BDV
                  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-check nav-icon"></i>
                  <p>Add File</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-folder nav-icon"></i>
                  <p>GMO File</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-download nav-icon"></i>
                  <p>GMO Request</p>
                </a>
              </li>
            </ul>
          </li>

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

          
          
          <li class="nav-item">
            <a href="{{ route('profile') }}" class="nav-link  <?php  if (request()->routeIs('profile') ) {echo 'active';} ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User Profile
              </p>
            </a>
          </li>
          
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
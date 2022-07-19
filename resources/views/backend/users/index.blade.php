@extends('layouts.backend')

@section('title')
  User Management
@endsection

@section('content')

<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif
        @if (session('status'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('status') }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
          @endif
          @if (session('message'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
             {{ session('message') }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

         
        <div class="col-12">
          <div class="card card-success">
            {{-- card header --}}
            <div class="card-header">
              <h3 class="card-title">Users Management</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            {{-- end card header --}}

            <div class="card-body">
              
              <div class="row mb-2">
                  <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Manage User</li>
                    </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->

              <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Users Management</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success mb-3" href="{{ route('users.create') }}"> Create New User</a>
                    </div>

                    <table class="table table-hover">
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th width="280px">Action</th>
                      </tr>
                      @php
                        $no =1;
                      @endphp
                      @foreach ($data as $key => $user)
                       <tr>
                         <td>{{ $no }}</td>
                         <td>{{ $user->name }}</td>
                         <td>{{ $user->email }}</td>
                         <td>
                           @if(!empty($user->getRoleNames()))
                             @foreach($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                             @endforeach
                           @endif
                         </td>
                         <td>
                            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                             <a class="btn btn-danger" href="{{ route('users.destroy',$user->id) }}"> Delete</a>
                         </td>
                       </tr> @php $no++ @endphp
                      @endforeach
                     </table>
                </div>
            </div>
          </div>
        </div>
          
          
      </div><!-- /.container-fluid -->
  </div>
  </div>
</div>

 

@endsection 
@section('title')
    Roles Management
@endsection

@extends('layouts.backend')

@section('content')

<div class="content-wrapper mt-3">
    <section class="content">
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
                    <form method="POST">
                        
                    </form>

                     {{-- card header --}}
                <div class="card-header">
                    <h3 class="card-title">Role Management</h3>

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
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Role Management</h2>
                            </div>
                            <div class="pull-right">
                            @can('role-create')
                                <a class="btn btn-success mb-2" href="{{ route('role.create') }}"> Create New Role</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    
                    <table class="table table-hover">
                      <tr>
                         <th>No</th>
                         <th>Name</th>
                         <th width="280px">Action</th>
                      </tr>
                      @php
                          $no=1;
                      @endphp
                        @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('role.show',$role->id) }}">Show</a>
                                @can('role-edit')
                                    <a class="btn btn-primary" href="{{ route('role.edit',$role->id) }}">Edit</a>
                                @endcan
                                @can('role-delete')
                                    {!! Form::open(['method' => 'DELETE','route' => ['role.destroy', $role->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                        @php $no++;            @endphp
                        @endforeach
                    </table>
                    
                    {!! $roles->render() !!}
        
        
                </div>
                </div>
                </div>
              </div>
            
    </section>
</div>


@endsection 
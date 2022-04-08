@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div>
                <h2 class="pull-left">Roles Management</h2>
                <div class="float-right">
                @can('role-create')
                    <a class="btn btn-success text-right" href="{{ route('roles.create') }}"> Create New Role</a>
                @endcan
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-bordered">
             <tr>
               <th></th>
               <th>Name</th>
               <th>Action</th>
             </tr>
             @foreach ($roles as $key => $role)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $role->name }}</td>
                <td>
                   <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                   {{-- @can('role-edit') --}}
                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                   {{-- @endcan --}}
                    {{-- @can('role-delete') --}}
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    {{-- @endcan --}}
                </td>
              </tr>
             @endforeach
            </table>
        </div>
    </div>
</div>
@endsection

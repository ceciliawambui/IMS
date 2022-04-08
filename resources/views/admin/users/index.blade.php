@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-11">
            <div>
                <h2 class="pull-left">Users Management</h2>
                <div class="float-right">
                    <a class="btn btn-success text-right" href="{{ route('users.create') }}"> Create New User</a>

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
               <th>No</th>
               <th>Name</th>
               <th>Email</th>
               <th>Roles</th>
               <th width="280px">Action</th>
             </tr>
             @foreach ($users as $key => $user)
              <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $role)
                       <label class="badge badge-success">{{ $role }}</label>
                    @endforeach
                  @endif
                </td>
                <td>
                   <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                   <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
              </tr>
             @endforeach
            </table>
        </div>
    </div>
</div>
@endsection

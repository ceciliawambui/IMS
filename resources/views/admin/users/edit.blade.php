@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left text-center">
                        <h2>Update User</h2>
                    </div>
                    <div class="pull-right">

                    </div>
                </div>
            </div>

            <form method="post" action="{{ route('users.update', $user->id) }}" >
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $user->name }}">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="email" name="email" placeholder="Email" class="form-control" readonly value="{{ $user->email }}">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Role:</strong>
                            <select class="form-select" name="roles[]" multiple>
                              <option selected>Select Role</option>
                              @foreach($roles as $role)
                                <option value="{{ $role->id }}" @if(in_array($role->id, $userRoles) ) selected @endif> {{ $role->name }} </option>
                              @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="col-md-4"></div>
    </div>

</div>
@endsection

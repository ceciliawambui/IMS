@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <h2 class="pull-left">Update Role</h2>
                    <a class="btn btn-primary pull-right" href="{{ route('roles.index') }}"> Back</a>
                </div>
            </div>

            <form method="post" action="{{ route('roles.update', $role->id) }}" >
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $role->name }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <select class="form-select" name="permissions[]" multiple>
                              <option selected>Select Permission</option>
                              @foreach($permissions as $permission)
                                <option value="{{ $permission->id }}" @if(in_array($permission->id, $rolePermissions) ) selected @endif> {{ $permission->name }} </option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>

    </div>

</div>

@endsection

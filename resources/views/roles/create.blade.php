@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pull-left">Create New Role</h2>

            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('roles.store') }}" >
            @csrf
            <div class="row justify-center">
                <div class="col-xs-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" placeholder="Name" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Permission:</strong>
                        <select class="form-select" name="permissions[]" multiple>
                          <option selected>Select Permission</option>
                          @foreach($permissions as $permission)
                            <option value="{{ $permission->id }}"> {{ $permission->name }} </option>
                          @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <br>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                    <a class="btn btn-primary pull-right" href="{{ route('roles.index') }}"> Back</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>

    </div>
    <div class="col-md-4"></div>
</div>

</div>

@endsection

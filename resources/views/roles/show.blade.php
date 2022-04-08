@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <h2> Show Role</h2>

                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $role->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Permissions:</strong>
                        @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $permission)
                                <label style="color:black">{{ $permission->name }},</label>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <a class="btn btn-primary pull-right" href="{{ route('roles.index') }}"> Back</a>

            </div>


        </div>
        <div class="col-md-4"></div>
    </div>

</div>
@endsection

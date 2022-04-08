@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <h2> Show User</h2>
                    {{-- <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a> --}}
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $user->name }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $user->email }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Roles:</strong>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $role)
                                <label>{{ $role }},</label>
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

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @can('isAdmin')
                        <div class="btn btn-success btn-lg">
                          You have Admin Access
                        </div>
                    {{-- @elsecan('isCashier')
                        <div class="btn btn-primary btn-lg">
                          You have Cashier Access
                        </div> --}}
                    @else
                        <div class="btn btn-info btn-lg">
                          You have User Access
                        </div>
                    @endcan

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

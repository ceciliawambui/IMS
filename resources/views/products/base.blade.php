@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Products Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Products Management</a></li>
        <li class="active">Product</li>
      </ol>
    </section>
    @yield('action-content')
  </div>
@endsection

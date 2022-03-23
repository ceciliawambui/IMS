@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Suppliers Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Suppliers Management</a></li>
        <li class="active">Supplier</li>
      </ol>
    </section>
    @yield('action-content')
  </div>
@endsection

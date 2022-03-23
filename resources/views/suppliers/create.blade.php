{{-- @extends('layouts.base') --}}
@extends('suppliers.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add Supplier</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body {
                font-family: 'Times New Roman', serif;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h4 style="text-align: center">Add Supplier</h4>
                    {{-- <a class="btn btn-success btn-sm" href="{{ route('department.index') }}"> Back</a> --}}
                    @if (session('status'))
                        <div class="alert alert-success mb-1 mt-1">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <strong>Name</strong>
                            <input type="text" name="name" class="form-control" placeholder="Name" required >
                            @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <strong>Address</strong>
                            <input type="text" name="address" class="form-control" placeholder="Address " required >
                            @error('address')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Location</strong>
                            <input type="text" name="location" class="form-control" placeholder="Location " required >
                            @error('location')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Contact Person</strong>
                            <input type="text" name="contact_person" class="form-control" placeholder="Contact Person " required >
                            @error('contact_person')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Phone</strong>
                            <input type="text" name="phone" class="form-control" placeholder="Phone" required >
                            @error('phone')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Product Category</strong>
                            <input type="text" name="product_category" class="form-control" placeholder="Product Category" required >
                            @error('product_category')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-md-4"></div>

                        <button type="submit" class="btn btn-success btn-sm">Create</button>
                    </form>
                </div>
            </div>

    </body>

    </html>
@endsection

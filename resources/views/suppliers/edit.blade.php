{{-- @extends('layouts.base') --}}
@extends('suppliers.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Edit Supplier</title>
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
                    <h4 style="text-align: center">Edit Supplier</h4>
                    {{-- <a class="btn btn-success btn-sm" href="{{ route('department.index') }}"> Back</a> --}}
                    @if (session('status'))
                        <div class="alert alert-success mb-1 mt-1">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <strong>Name</strong>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$supplier->name}}">
                            @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <strong>Address</strong>
                            <input type="text" name="address" class="form-control" placeholder="Address" value="{{$supplier->address}}">
                            @error('address')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Location</strong>
                            <input type="text" name="location" class="form-control" placeholder="Location" value="{{$supplier->location}}">
                            @error('location')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Contact Person</strong>
                            <input type="text" name="contact_person" class="form-control" placeholder="Contact Person" value="{{$supplier->contact_person}}">
                            @error('contact_person')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Phone</strong>
                            <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{$supplier->phone}}">
                            @error('phone')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Product Category</strong>
                            <input type="text" name="product_category" class="form-control" placeholder="Product Category" value="{{$supplier->product_category}}">
                            @error('product_category')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-md-4"></div>

                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </form>
                </div>
            </div>

    </body>

    </html>
@endsection

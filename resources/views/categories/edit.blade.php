{{-- @extends('layouts.base') --}}
@extends('suppliers.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Edit Category</title>
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
                    <h4 style="text-align: center">Edit Category</h4>
                    {{-- <a class="btn btn-success btn-sm" href="{{ route('department.index') }}"> Back</a> --}}
                    @if (session('status'))
                        <div class="alert alert-success mb-1 mt-1">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="file" accept="image/*" id="image" class="form-control"
                                name="image" value="" autofocus>
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif

                        </div>
                        <div class="form-group">
                            <strong>Name</strong>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$category->name}}">
                            @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <select class="form-control" name="supplier_id">
                                <option  value="">Please select your supplier</option>
                                @foreach ($suppliers as $supplier)
                                <option value="{{$supplier->id}}" {{$supplier->id == $category->supplier_id ? "selected": ""}}>{{$supplier->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('supplier_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('supplier_id') }}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="col-md-4"></div>

                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </form>
                </div>
            </div>

    </body>

    </html>
@endsection

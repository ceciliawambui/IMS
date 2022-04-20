{{-- @extends('layouts.base') --}}
@extends('suppliers.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Edit Points</title>
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
                    <h4 style="text-align: center">Edit Points</h4>
                    {{-- <a class="btn btn-success btn-sm" href="{{ route('department.index') }}"> Back</a> --}}
                    @if (session('status'))
                        <div class="alert alert-success mb-1 mt-1">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('points.update', $point->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <strong>Customer</strong>
                            <select class="form-control" name="customer_id">
                                <option  value="">Please select the category</option>
                                @foreach ($customers as $customer)
                                <option value="{{$customer->id}}" {{$customer->id == $point->customer_id ? "selected": ""}}>{{$customer->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('customer_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('customer_id') }}</strong>
                        </span>
                        @endif
                        </div>
                        <div class="form-group">
                            <strong>Points</strong>
                            <input type="number" name="points" class="form-control" placeholder="Points" value="{{$point->points}}">
                            @error('points')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <strong>Date</strong>
                            <input type="date" name="date" class="form-control" placeholder="Date" value="{{$point->date}}">
                            @error('date')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4"></div>
                    <a class="btn btn-info btn-sm" href="{{ route('customers.index') }}"> Back</a>
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </form>
                </div>
            </div>

    </body>

    </html>
@endsection

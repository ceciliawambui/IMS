<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Sale</title>
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
                <h4 style="text-align: center">Add Sale</h4>
                {{-- <a class="btn btn-success btn-sm" href="{{ route('department.index') }}"> Back</a> --}}
                @if (session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <strong>Date</strong>
                        <input type="date" name="date" class="form-control" placeholder="Date" required>
                        @error('date')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <strong>Customer</strong>
                        <input type="text" name="customer" class="form-control" placeholder="Customer" required>
                        @error('customer')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <strong>Product Image</strong>
                            <select class="form-control" name="product_id">
                                <option value="">Please select the product image</option>
                                @foreach ($products as $product)
                                <option value="{{$product->id}}">{{$product->image}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('product_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('product_id') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <strong>Product Name</strong>
                            <select class="form-control" name="product_id">
                                <option value="">Please select the product name</option>
                                @foreach ($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('product_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('product_id') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <strong>Price</strong>
                        <input type="number" name="price" class="form-control" placeholder="Price " required>
                        @error('price')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong>Quantity</strong>
                        <input type="number" name="quantity" class="form-control" placeholder="Quantity " required>
                        @error('quantity')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <strong>Total Amount</strong>
                        <input type="number" name="amount" class="form-control" placeholder="Total Amount"
                            required>
                        @error('amount')
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

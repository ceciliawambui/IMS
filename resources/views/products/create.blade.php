<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
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
                <h4 style="text-align: center">Add Product</h4>
                {{-- <a class="btn btn-success btn-sm" href="{{ route('department.index') }}"> Back</a> --}}
                @if (session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <strong>Image</strong>
                        <input type="file" name="image" class="form-control" placeholder="Image" required >
                        @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <strong>Name</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <strong>Category</strong>
                            <select class="form-control" name="category_id">
                                <option value="">Please select the category</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <strong>Quantity</strong>
                        <input type="text" name="quantity" class="form-control" placeholder="Quantity " required>
                        @error('quantity')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong>Buying Price</strong>
                        <input type="number" name="buying_price" class="form-control" placeholder="Buying Price"
                            required>
                        @error('buying_price')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong>Selling Price</strong>
                        <input type="number" name="selling_price" class="form-control" placeholder="Selling Price"
                            required>
                        @error('selling_price')
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

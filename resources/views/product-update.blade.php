<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">EditProduct</div>
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
            @endif
            <div class="card-body">
                <form action="{{ route('EditProduct')}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Product Name</label>
                        <input type="text" name="name" value="{{$product->name}}" class="form-control" id="formGroupExampleInput" placeholder="Enter Product Name">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Price</label>
                        <input type="text" name="price" value="{{$product->price}}" class="form-control" id="formGroupExampleInput" placeholder="Enter price">
                        @error('price')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="formGroupExampleInput" placeholder="Description">{{$product->description}}</textarea>
                        @error('description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>

                </form>
            </div>
        </div>
    </div>
</body>
</html>

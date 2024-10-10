<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .card {
            margin-bottom: 30px;
            background-color: #fff;
            width: 100%;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
        }

        .card-header{
            height: 220px;
        }

        .img{
            height: 100%;
        }

        .rc{
            float: right;
        }

        .alert {
            width: 98%;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-between align-items-center m-3">
        <h4>List of Product</h4>
        <div>
            <form action="{{ route('searchProduct') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="Search products..." >
                    <button type="submit" class="btn btn-primary me-2">Search</button>
                    <a href="/product/add" class="btn btn-primary ml-2">Add New Product</a>
                </div>
            </form>
        </div>
    </div>

    @if (Session::has('success'))
        <div class="alert alert-success mx-3">{{Session::get('success')}}</div>
    @endif
    @if (Session::has('fail'))
        <div class="alert alert-danger mx-4">{{Session::get('fail')}}</div>
    @endif

    <div class="container-fluid">
        <div class="row">
            @foreach ($all_product as $item)
            <div class="col-md-3 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="img"></div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$item->name}}</h5>
                        <tr class="card-text">{{$item->description}}</tr>
                        <p>₱{{$item->price}}</p>
                        <div class="rc">
                            <a href="{{ url('product/update/' . $item->id) }}" class="btn btn-primary btn-sm">Update</a>
                            <a href="{{ url('product/delete/' . $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>

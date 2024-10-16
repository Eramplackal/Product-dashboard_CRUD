<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Create new Prod</title>
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css" rel="stylesheet')}}" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid mt-5">
        <h1 class="h3 mb-4 text-gray-800" >Add New Product</h1>

        <!-- Form for adding a new product -->
        <form action="{{ route('products.store') }}" method="POST" class="card shadow mb-4">
            @csrf <!-- CSRF token for security -->
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Product Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number" class="form-control" id="stock" name="stock" required>
                </div>
                <div class="form-group">
            <label for="image">Upload Image</label>
            <input type="file" name="image" class="form-control-file" id="image">
        </div>

                <button type="submit" class="btn btn-primary">Add Product</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Product List</a>
            </div>
        </form>
    </div>

    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
</body>
</html>

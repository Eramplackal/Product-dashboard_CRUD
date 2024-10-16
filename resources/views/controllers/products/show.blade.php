<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Product Details</h1>
@csrf
        <!-- Check if product exists -->
        @if ($product->isEmpty())
            <div class="alert alert-warning">No products available.</div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->description }}</td>
                                <td>${{ number_format($p->price, 2) }}</td>
                                <td>{{ $p->stock }}</td>
                                <td>{{ $p->created_at->format('d/m/Y') }}</td>
                                <td>{{ $p->updated_at->format('d/m/Y') }}</td>
                                <td>
                                    <!-- Edit Button -->
                                    <div class="d-inline-flex">
    <!-- Edit Button -->
    <a href="{{ route('products.edit', $p->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
    
    <!-- Delete Button Form -->
    <form action="{{ route('products.destroy', $p->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
    </form>
</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <!-- Back Button -->
        <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Back to Product List</a>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

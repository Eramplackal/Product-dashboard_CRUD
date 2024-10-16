<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Product</h1>

        <!-- Form for editing a product -->
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf <!-- CSRF token for security -->
            @method('PUT') <!-- Specify PUT method for updating -->

            <div class="mb-3">
                <label for="name" class="form-label">Product Name:</label>
                <!-- Display the current product name in the input field -->
                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <!-- Display the current product description in the textarea -->
                <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <!-- Display the current product price in the input field -->
                <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" step="0.01" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock:</label>
                <!-- Display the current stock value in the input field -->
                <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary ms-3">Back to Product List</a>
        </form>
        
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

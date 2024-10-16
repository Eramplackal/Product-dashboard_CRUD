<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all(); // Retrieve all products from the database
        return view('controllers.products.tables', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('controllers.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Store the new product in the database
        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
        ]);

        // Retrieve all products after insertion
        $products = Product::all();

        // Redirect to the products index with the updated list
        return view('controllers.products.tables', compact('products'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $id) // Use $id directly from request
    {
        $product = Product::find($id); // Find product by ID

        if (!$product) {
            return redirect()->route('controllers.products.show')->with('error', 'Product not found.');
        }
return view('controllers.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $id) // Use 'Product $product' instead of 'Product $id'
    {
        $product = Product::find($id->id);
        // if (!$product) {
        //     return redirect()->route('controllers.products.index')->with('error', 'Product not found.');
        // }
        return view('controllers.products.editform', compact('product'));
    }

    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);
    
        
        $product = Product::findOrFail($id);
    
        // Update the product with the validated data
        $product->update($validatedData);
    
        // Redirect to the product show page with a success message
        $products = Product::all();
        return view('controllers.products.tables', compact('products'));
    }

    public function destroy(string $id)
{
    // Logic to find and delete the product
    $product = Product::findOrFail($id);
    $product->delete();
    $products = Product::all();
    return view('controllers.products.tables', compact('products'));
}
}

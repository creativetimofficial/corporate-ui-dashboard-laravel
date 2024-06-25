<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Log;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $supplier = Supplier::all(); //to populate dropdown
        return view('products.create', compact('supplier'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric|regex:/^\d+(\.\d+)?$/',
            'supplier_id' => 'nullable|exists:suppliers,id', // Ensure the supplier_id exists in the suppliers table
            'low_limit' => 'required|integer', // Ensure the supplier_id exists in the suppliers table
            'description' => 'nullable|string',
        ]);

        // Create the product
        $product = Product::create($validatedData);

        // Redirect or do something after creating the product
        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $supplier = Supplier::all(); // assuming you have a Supplier model
        return view('products.edit', compact('product','supplier'));
    }


    public function update(Request $request, Product $product)
{
    Log::info('Request data:', $request->all());
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|regex:/^\d+(\.\d+)?$/',
        'supplier_id' => 'nullable|exists:suppliers,id', // Ensure the supplier_id exists in the suppliers table
        'low_limit' => 'required|integer', // Ensure the low_limit is an integer
        'description' => 'nullable|string',
    ]);

    // Update the product
    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'supplier_id' => $request->supplier_id,
        'low_limit' => $request->low_limit,
        'description' => $request->description,
    ]);

    return redirect()->route('products.edit', $product->id)->with('success', 'Product updated successfully');
}

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}

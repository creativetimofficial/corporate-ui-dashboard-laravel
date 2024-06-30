<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Log;
use App\Models\InventoryRecord;
use App\Models\ProductUsageHistory;

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
        $supplier = Supplier::all(); 
        return view('products.show', compact('product', 'supplier'));
        
    }

    public function edit(Product $product)
    {
        $supplier = Supplier::all(); // assuming you have a Supplier model
        return view('products.edit', compact('product', 'supplier'));
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

    public function editQuantities()
    {
        $products = Product::all();
        return view('stocks.index', compact('products'));
    }

    public function updateStock(Request $request)
    {
        $data = $request->validate([
            'quantities' => 'required|array',
            'quantities.*' => 'required|integer|min:0',
        ]);

        foreach ($data['quantities'] as $id => $quantity) {
            $product = Product::findOrFail($id);
            $product->update(['quantity' => $quantity]);
        }

        return redirect()->route('stocks.index')->with('success', 'Quantities updated successfully!');
    }

    // public function saveInventoryRecord()
    // {
    //     $products = Product::all();

    //     foreach ($products as $product) {
    //         InventoryRecord::create([
    //             'product_id' => $product->id,
    //             'quantity' => $product->quantity,
    //         ]);
    //     }

    //     return redirect()->back()->with('success', 'Inventory records saved.');
    // }

    // app/Http/Controllers/ProductController.php



    // public function logUsage(Request $request)
    // {
    //     // Validate the request
    //     $request->validate([
    //         'product_id' => 'required|exists:products,id',
    //         'quantity_used' => 'required|integer|min:1',
    //     ]);

    //     // Log the usage
    //     ProductUsageHistory::create([
    //         'product_id' => $request->product_id,
    //         'quantity_used' => $request->quantity_used,
    //         'used_at' => now(),
    //     ]);

    //     return redirect()->back()->with('success', 'Product usage logged successfully.');
    // }

    public function getProductUsage(Product $product)
    {
    try {
        \Log::info('Fetching usage data for product: ' . $product->id);

        $usageData = $product->inventoryRecords()
            ->selectRaw('DATE(created_at) as date, SUM(usage) as total_usage')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        \Log::info('Usage data fetched successfully');

        return response()->json($usageData);
    } catch (\Exception $e) {
        \Log::error('Error fetching product usage data: ' . $e->getMessage());
        return response()->json(['error' => 'Error fetching product usage data'], 500);
    }
}

}

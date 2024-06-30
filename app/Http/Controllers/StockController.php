<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use Log;

class StockController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('stocks.index', compact('products'));
    }

    public function show()
{
    // Get all products
    $products = Product::all();

    // Return a view to show the products
    return view('stocks.stock-update', compact('products'));
}

    public function edit()
    {
        $products = Product::all();
        return view('stocks.edit', compact('products'));
    }

    // public function updateStock(Request $request)
    // {
    //     $quantities = $request->input('quantities');
    //     dump($quantities);
    //     if (!$quantities) {
    //         return redirect()->route('stocks.index')->with('error', 'Invalid input data');
    //     }
    
    //     DB::transaction(function () use ($quantities) {
    //         foreach ($quantities as $id => $newQuantity) {
    //             $product = Product::find($id);
    //             if (!$product) {
    //                 Log::error("Product with ID $id not found");
    //                 continue;
    //             }
    
    //             if (!auth()->user()->can('update', $product)) {
    //                 Log::error("Unauthorized attempt to update product $id");
    //                 continue;
    //             }
    
    //             $product->quantity = $newQuantity;
    //             $product->save();
    //         }
    //     });
    
    //     return redirect()->back()->with('success', 'Stock quantities updated successfully.');
    // }

    public function updateStock(Request $request)
    {
        dd($request->all());
        // Validate the request
        $request->validate([
            'quantities' => 'required|array',
            'quantities.*' => 'required|integer|min:0',
        ]);

        // Update the stock for each product
        foreach ($request->quantities as $id => $quantity) {
            Log::info("Updating product ID $id to quantity $quantity");

            $product = Product::find($id);
            if ($product) {
                Log::info("Product found: " . $product->name);

                $product->quantity = $quantity;
                $product->save();
            }
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Stock quantities updated successfully.');
    


    
}
}
